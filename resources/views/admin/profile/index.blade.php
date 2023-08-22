@extends('layouts.admin_app')
@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Dashboard</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="index.html">Home</a>
       </li>
       {{-- <li class="breadcrumb-item"><a href="#">DataTables</a>
       </li> --}}
       <li class="breadcrumb-item active">Dashboard
       </li>
      </ol>
     </div>
    </div>
   </div>
   {{-- <div class="content-header-right col-md-3 col-12">
    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
     <button class="btn btn-primary round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1"
      type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
     <div class="dropdown-menu"><a class="dropdown-item" href="component-alerts.html"> Alerts</a><a
       class="dropdown-item" href="material-component-cards.html"> Cards</a><a class="dropdown-item"
       href="component-progress.html"> Progress</a>
      <div class="dropdown-divider"></div><a class="dropdown-item" href="register-with-bg-image.html"> Register</a>
     </div>
    </div>
   </div> --}}
  </div>
 </div>
</div>
<div class="content-overlay"></div>

<section id="user-profile-cards" class="row mt-2">
 <div class="col-12">
  <h4 class="text-uppercase">User Profile Cards</h4>
  <p>User profile cards with border & shadow variant.</p>
 </div>
 <div class="col-xl-4 col-md-6 col-12">
  <div class="card">
   <div class="text-center">
    <div class="card-body">
     <img src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}" class="rounded-circle" width="150px" height="150px" alt="Card image">
    </div>
    <div class="card-body">
     <h4 class="card-title">@if(Auth::check())
      {{ Auth::user()->name }}
      @else
      Welcome, Guest
      @endif</h4>
     <h6 class="card-subtitle text-muted">Technical Lead</h6>
    </div>
    <div class="card-body">
     <button type="button" class="btn btn-danger mr-1"><i class="la la-plus"></i> Follow</button>
     <button type="button" class="btn btn-primary mr-1"><i class="ft-user"></i> Profile</button>

     <!-- Profile Photo Update Form -->
     <div class="card-body">
      <form action="{{ url('/profiles/update/') }}" method="post"
       enctype="multipart/form-data">
       @csrf
       <div class="form-group">
        <label for="photo">Change Profile Photo</label>
        <input type="file" id="profile" class="form-control" name="profile">
       </div>
       <button type="submit" class="btn btn-primary">Change Profile Photo</button>
      </form>
     </div>
     <!-- end form -->

    </div>
   </div>
   <div class="list-group list-group-flush">
    <a href="#" class="list-group-item"><i class="la la-briefcase"></i> Overview</a>
    <a href="#" class="list-group-item"><i class="ft-mail"></i> Email : {{ Auth::user()->email }} </a>
    <a href="#" class="list-group-item"><i class="ft-check-square"></i> Task</a>

    <a href="{{ url('/client-calendar/'.Auth::user()->id) }}" class="list-group-item"> <i class="ft-message-square"></i>
     Go To Content Calender</a>
   </div>
  </div>
 </div>
 <!-- <div class="col-xl-4 col-md-6 col-12">
  <div class="card card border-teal border-lighten-2">
   <div class="text-center">
    <div class="card-body">
     <img src="../../../app-assets/images/portrait/small/avatar-s-5.png" class="rounded-circle  height-150"
      alt="Card image">
    </div>
    <div class="card-body">
     <h4 class="card-title">Andrew Davis</h4>
     <h6 class="card-subtitle text-muted">UI/UX Designer</h6>
    </div>
    <div class="card-body">
     <button type="button" class="btn btn-danger mr-1"><i class="la la-plus"></i> Follow</button>
     <button type="button" class="btn btn-primary mr-1"><i class="ft-user"></i> Profile</button>
    </div>
   </div>
   <div class="list-group list-group-flush">
    <a href="#" class="list-group-item"><i class="la la-briefcase"></i> Overview</a>
    <a href="#" class="list-group-item"><i class="ft-mail"></i> Email</a>
    <a href="#" class="list-group-item"><i class="ft-check-square"></i> Task</a>
    <a href="#" class="list-group-item"> <i class="ft-message-square"></i> Calender</a>
   </div>
  </div>
 </div> -->
 @include('sweetalert::alert')

</section>
@endsection
