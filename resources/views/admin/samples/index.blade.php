@extends('layouts.admin_app')
@section('styles')

<link rel="stylesheet" type="text/css"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css') }}"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
 href="{{ asset('admin_app/app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') }}">
@endsection
@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Service Sample Datatable</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
       </li>
       <li class="breadcrumb-item"><a href="{{ url('/samples/create') }}">Create Sample</a>
       </li>
       <li class="breadcrumb-item active">Service Sample
       </li>
      </ol>
     </div>
    </div>
   </div>
   <div class="content-header-right col-md-3 col-12">
    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
     <button class="btn btn-primary round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1"
      type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
     <div class="dropdown-menu"><a class="dropdown-item" href="component-alerts.html"> Alerts</a><a
       class="dropdown-item" href="material-component-cards.html"> Cards</a><a class="dropdown-item"
       href="component-progress.html"> Progress</a>
      <div class="dropdown-divider"></div><a class="dropdown-item" href="register-with-bg-image.html"> Register</a>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="content-overlay"></div>

<!-- Configuration option table -->
<section id="configuration">
 <div class="row">
  <div class="col-12">
   <div class="card">
    <div class="card-header">
     <h4 class="card-title">
      <a href="{{ url('/samples/create') }}" class="btn btn-success btn-round">New Sample Create</a>
     </h4>
     <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
     <div class="heading-elements">
      <ul class="list-inline mb-0">
       <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
       <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
       <li><a data-action="close"><i class="ft-x"></i></a></li>
      </ul>
     </div>
    </div>
    <div class="card-content collapse show">
     <div class="card-body card-dashboard">
      <p class="card-text">The Responsive
      </p>

      @if (session('success'))
      <div class="alert alert-success">
       {{ session('success') }}
      </div>
      @endif
      <div class="container">
        <table class="table table-striped table-bordered dataex-res-configuration">
            <thead>
             <tr>
              <th>No</th>
              <th>Name</th>
              <th>Service</th>
              <th>Samples</th>
              <th>Actions</th>
             </tr>
            </thead>
            <tbody>
             @php
                 $no =1;
             @endphp
             @foreach ($samples as $sample)
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $sample->name }}</td>
                 <td>{{ $sample->service->service_name }}</td>
                 <td>
                     @if ($sample->photo)
                     <img src="{{ asset('assets/img/samples/img/'.$sample->photo) }}" width="100px" alt="">
                     @endif
                     @if ($sample->video)
                     <video width="100" height="50" controls>
                         <source src="{{ asset('assets/img/samples/video/'.$sample->video) }}" type="video/mp4">
                         <source src="{{ asset('assets/img/samples/video/'.$sample->video) }}" type="video/quicktime">
                         <source src="{{ asset('assets/img/samples/video/'.$sample->video) }}" type="video/x-msvideo">
                         Your browser does not support the video tag.
                     </video>
                     @endif
                     @if ($sample->content)
                     {!! $sample->content !!}
                     @endif
                 </td>
                 <td>
                     <a href="{{ url('/samples/edit/'.$sample->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                     <a href="{{ url('/samples/delete/'.$sample->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                     {{-- <button class="btn btn-sm btn-danger delete_id" data-target="#deleteModal" data-toggle="modal" data-id="{{ $sample->id }}"><i class="fas fa-trash"></i></button> --}}
                 </td>
             </tr>
             @endforeach
            </tbody>
           </table>
      </div>

     </div>
    </div>
   </div>
  </div>
 </div>
 @include('sweetalert::alert')

</section>
<!--/ Configuration option table -->
<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body py-2">
            {{-- <div class="text-end">
                <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal" aria-label="Close"><i class="fas fa-xmark"></i></button>
            </div> --}}
            <div class="text-center">
                <i class="fas fa-warning fa-3x text-danger"></i>
            </div>
            <h5 class="modal-title text-center mt-1">Are You Sure Delete?</h5>
            <div class="d-flex justify-content-center mt-2">
                <div class="mr-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-xmark mr-1"></i>Cancle</button>
                </div>
                <div>
                    <form action="{{ url('/samples/delete/') }}" class="d-inline" method="POST">
                        @csrf
                        <input type="text" name="id" id="delete_id">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check mr-1"></i>Confirm</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<!-- <script src="{{ asset('admin_app/app-assets/vendors/js/material-vendors.min.js') }}"></script> -->

<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_app/app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js') }}"></script>

<script src="{{ asset('admin_app/app-assets/js/scripts/tables/datatables-extensions/datatable-responsive.js') }}">
</script>
<script>
    $(document).ready(function () {
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
    });
</script>

@endsection
