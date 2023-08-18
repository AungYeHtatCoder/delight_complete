<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sample;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SampleController extends Controller
{
    public function index()
    {
        $samples = Sample::latest()->get();
        return view('admin.samples.index', compact('samples'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.samples.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'service_id' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {
                $file = $request->file('file');

                // Get the file extension
                $extension = $file->getClientOriginalExtension();

                // Check if it's an image
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $image = $request->file('file');
                    $ext = $image->getClientOriginalExtension();
                    $filename = uniqid('samples') . '.' . $ext; // Generate a unique filename
                    $image->move(public_path('assets/img/samples/img/'), $filename); // Save the file to the pub

                    Sample::create([
                        'name' => $request->name,
                        'service_id' => $request->service_id,
                        'photo' => $filename,
                    ]);
                    return redirect('/samples')->with('success', 'New Sample Created Successfully.');
                }

                // Check if it's a video
                if (in_array($extension, ['mp4', 'mov', 'avi'])) {
                    $video = $request->file('file');
                    $videoName = time() . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('assets/img/samples/video/'), $videoName);

                    Sample::create([
                        'name' => $request->name,
                        'service_id' => $request->service_id,
                        'video' => $videoName,
                    ]);
                    return redirect('/samples')->with('success', 'New Sample Created Successfully.');
                }

        }
    }

    public function edit($id)
    {
        $sample = Sample::find($id);
        $services = Service::all();
        return view('admin.samples.edit', compact('sample', 'services'));
    }

    public function update(Request $request, $id)
    {

        $sample = Sample::find($id);
        $request->validate([
            'name' => 'required',
            'service_id' => 'required',
        ]);
        if(!$request->file('file')){
            if($sample->photo){
                $filename = $sample->photo;
                $sample->update([
                    'name' => $request->name,
                    'service_id' => $request->service_id,
                    'photo' => $filename,
                ]);
                return redirect('/samples/')->with('success', 'Sample Updated Successfully.');
            }
            if($sample->video){
                $videoName = $sample->video;
                $sample->update([
                    'name' => $request->name,
                    'service_id' => $request->service_id,
                    'video' => $videoName,
                ]);
                return redirect('/samples/')->with('success', 'Sample Updated Successfully.');
            }
        }else{
            $file = $request->file('file');
            // Get the file extension
            $extension = $file->getClientOriginalExtension();

            // Check if it's an image
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                if($sample->photo){
                    File::delete(public_path('assets/img/samples/img/'.$sample->photo));
                }
                if($sample->video){
                    File::delete(public_path('assets/img/samples/video/'.$sample->video));
                    $sample->video = null;
                    $sample->save();
                }

                $image = $request->file('file');
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid('sample') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/samples/img/'), $filename); // Save the file to the pub

                $sample->update([
                    'name' => $request->name,
                    'service_id' => $request->service_id,
                    'photo' => $filename,
                ]);
                return redirect('/samples/')->with('success', 'Sample Updated Successfully.');
            }

            // Check if it's a video
            if (in_array($extension, ['mp4', 'mov', 'avi'])) {
                if($sample->photo){
                    File::delete(public_path('assets/img/samples/img/'.$sample->photo));
                    $sample->photo = null;
                    $sample->save();
                }
                if($sample->video){
                    File::delete(public_path('assets/img/samples/video/'.$sample->video));
                }

                $video = $request->file('file');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('assets/img/samples/video/'), $videoName);

                $sample->update([
                    'name' => $request->name,
                    'service_id' => $request->service_id,
                    'video' => $videoName,
                ]);
                return redirect('/samples/')->with('success', 'Sample Updated Successfully.');
            }
        }
    }


    public function delete($id)
    {
        $sample = Sample::find($id);
        if(!$sample){
            return redirect()->back()->with('error', "Sample not found.");
        }
        if($sample->photo){
            File::delete(public_path('assets/img/samples/img/' . $sample->photo));
        }
        if ($sample->video) {
            File::delete(public_path('assets/img/samples/video/' . $sample->video));
        }
        Sample::destroy($id);
        return redirect()->back()->with('success', "Sample Removed.");

        // if ($sample) {
        //     if ($sample->photo) {
        //         File::delete(public_path('assets/img/samples/img/' . $sample->photo));
        //     } elseif ($sample->video) {
        //         File::delete(public_path('assets/img/samples/video/' . $sample->video));
        //     }

        //     $sample->delete();

        //     return redirect()->back()->with('success', "Sample Removed.");
        // }


    }

    public function detail($name){
        if($name === "motion_video"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Motion Video');
            })->get();
            $service = Service::where('service_name', 'Motion Video')->first();
            return view('admin.samples.detail', compact('samples', 'service'));
        }
        if($name === "art_photo"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Art Photo')->orWhere('service_name', 'Art Comic');
            })->get();
            $service = Service::where('service_name', 'Art Photo')->first();
            return view('admin.samples.detail', compact('samples', 'service'));
        }
        if($name === "graphic_photo"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Graphic Photo');
            })->get();
            $service = Service::where('service_name', 'Graphic Photo')->first();
            return view('admin.samples.detail', compact('samples', 'service'));
        }
        if($name === "boosting"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Boosting');
            })->get();
            $service = Service::where('service_name', 'Boosting')->first();
            return view('admin.samples.detail', compact('samples', 'service'));
        }

    }


}
