@extends('layouts.admin_app')

@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Service Create Dashboard</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
       </li>
       <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Back To Service</a>
       </li>
       <li class="breadcrumb-item active">Service Create Dashboard
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
      <a href="{{ route('admin.services.index') }}" class="btn btn-success btn-round">Back To Service Dashboard</a>
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
      <div class="row justify-content-md-center">
       <div class="col-md-6">
        <div class="card">
         <div class="card-header">
          <h4 class="card-title" id="from-actions-top-bottom-center">New Service Create</h4>
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
         <div class="card-content collpase show">
          <div class="card-body">


           <form class="form" id="plan-form" method="post" action="{{ route('admin.services.store') }}">
            @csrf
            <div class="form-body">
             <div class="row">
              <div class="form-group col-12 mb-2">
               <label for="ServiceName">Service Name</label>
               <input type="text" id="service_name" class="form-control" placeholder="Service Name" name="service_name">
              </div>
             </div>
            </div>

            <div class="form-actions text-center">
             <button type="button" class="btn btn-warning mr-1">
              <i class="ft-x"></i> Cancel
             </button>
             <button type="submit" class="btn btn-primary" id="save-button">
              <i class="la la-check-square-o"></i> Save
             </button>
            </div>
           </form>
          </div>
         </div>
        </div>
       </div>
      </div>

     </div>
    </div>
   </div>
  </div>
 </div>

</section>
<!--/ Configuration option table -->
@endsection

@section('scripts')
<script src="{{ asset('admin_app/app-assets/vendors/js/material-vendors.min.js') }}"></script>

<script>
// document.addEventListener('DOMContentLoaded', function() {
//  const planForm = document.getElementById('plan-form');
//  const saveButton = document.getElementById('save-button');

//  saveButton.addEventListener('click', function() {
//   // Serialize the form data
//   const formData = new FormData(planForm);

//   // Perform the AJAX request
//   fetch(planForm.action, {
//     method: 'POST',
//     body: formData,
//     headers: {
//      'X-CSRF-Token': formData.get('_token') // Pass CSRF token
//     }
//    })
//    .then(response => response.json())
//    .then(data => {
//     if (data.success) {
//      // Successful response, handle accordingly
//      alert('Plan created successfully.');
//      if (data.redirect) {
//       window.location.href = data.redirect; // Redirect to plans.index
//      }
//     } else {
//      // Handle validation errors or other failures
//      alert(data.message);
//     }
//    })
//    .catch(error => {
//     console.error('Error:', error);
//    });
//  });
// });
</script>

@endsection