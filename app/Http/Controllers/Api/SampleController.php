<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Sample;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\SimpleResource;
use Symfony\Component\HttpFoundation\Response;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samples = Sample::latest()->get();
        return SimpleResource::collection($samples);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'service_id' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $filename = uniqid('samples') . '.' . $extension;
            $file->move(public_path('assets/img/samples/img/'), $filename);

            $sample = Sample::create([
                'name' => $request->name,
                'service_id' => $request->service_id,
                'photo' => $filename,
            ]);
        } elseif (in_array($extension, ['mp4', 'mov', 'avi'])) {
            $videoName = time() . '.' . $extension;
            $file->move(public_path('assets/img/samples/video/'), $videoName);

            $sample = Sample::create([
                'name' => $request->name,
                'service_id' => $request->service_id,
                'video' => $videoName,
            ]);
        }

        return new SimpleResource($sample);
    }

    public function show($id)
    {
        $sample = Sample::findOrFail($id);
        return new SimpleResource($sample);
    }

    public function update(Request $request, $id)
    {
        $sample = Sample::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'service_id' => 'required',
        ]);

        // Your existing file handling logic here, similar to the `store` method

        $sample->update($request->all());

        return new SimpleResource($sample);
    }

    public function destroy($id)
    {
        $sample = Sample::findOrFail($id);

        if ($sample->photo) {
            File::delete(public_path('assets/img/samples/img/' . $sample->photo));
        }

        if ($sample->video) {
            File::delete(public_path('assets/img/samples/video/' . $sample->video));
        }

        $sample->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }




public function detail($name)
{
    $service = null;
    $samples = null;

    if($name === "motion_video"){
        $samples = Sample::whereHas('service', function($query) {
            $query->where('service_name', 'Motion Video');
        })->get();
        $service = Service::where('service_name', 'Motion Video')->first();
    }

    if($name === "art_photo"){
        $samples = Sample::whereHas('service', function($query) {
            $query->where('service_name', 'Art Photo')->orWhere('service_name', 'Art Comic');
        })->get();
        $service = Service::where('service_name', 'Art Photo')->first();
    }

    if($name === "graphic_photo"){
        $samples = Sample::whereHas('service', function($query) {
            $query->where('service_name', 'Graphic Photo');
        })->get();
        $service = Service::where('service_name', 'Graphic Photo')->first();
    }

    if($name === "content"){
        $samples = Sample::whereHas('service', function($query) {
            $query->where('service_name', 'Content');
        })->get();
        $service = Service::where('service_name', 'Content')->first();
    }

    if(!$service || !$samples) {
        return response()->json(['message' => 'Resource not found'], 404);
    }

    return response()->json([
        'service' => $service,
        'samples' => SimpleResource::collection($samples)
    ]);
}


}