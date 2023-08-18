@extends('layouts.admin_app')
@section('styles')
<style>
/* Add your custom CSS styles here */

.notification-item {
 margin-bottom: 10px;
 padding: 10px;
 border: 1px solid #28a745;
 background-color: #f0f8ea;
 border-radius: 5px;
 display: flex;
 justify-content: space-between;
 align-items: center;
}

.notification-content {
 flex-grow: 1;
}

.notification-time {
 font-weight: bold;
 margin-right: 10px;
}

.mark-as-read {
 color: #007bff;
 text-decoration: none;
 cursor: pointer;
}

.mark-all-link {
 display: block;
 text-align: center;
 margin-top: 10px;
 font-weight: bold;
}

.no-notifications {
 text-align: center;
 color: #dc3545;
 font-weight: bold;
 margin-top: 10px;
}

.user-logged-in {
 text-align: center;
 font-weight: bold;
 margin-top: 10px;
}
</style>
@endsection
@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Dashboard</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
       </li>
       {{-- <li class="breadcrumb-item"><a href="#">DataTables</a>
       </li> --}}
       <li class="breadcrumb-item active">Customer Content Event Notification Dashboard
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
<ul>
 <!-- resources/views/partials/_notifications.blade.php -->
 <li class="dropdown-menu-header">
  <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
  <span class="notification-tag badge badge-danger float-right m-0">
   {{ $notifications->count() }}
  </span>
 </li>
</ul>

<!-- display user noti -->
<div class="card-body">
 @if(session('status'))
 <div class="alert alert-success" role="alert">
  {{ session('status') }}
 </div>
 @endif

 @if(auth()->user()->is_user)
 @forelse($notifications as $notification)
 <div class="alert alert-success notification-item" role="alert">
  <div class="notification-content">
   <span class="notification-time">
    [{{ $notification->created_at }}]
   </span>
   Event: {{ $notification->data['events']['title'] }} ({{ $notification->data['events']['start'] }}) has just Added.
  </div>
  <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
   Mark as read
  </a>
 </div>

 @if($loop->last)
 <a href="#" id="mark-all" class="mark-all-link">
  Mark all as read
 </a>
 @endif
 @empty
 <div class="no-notifications">
  There are no new notifications
 </div>
 @endforelse
 @else
 <div class="user-logged-in">
  You are logged in!
 </div>
 @endif
</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@parent
@if(auth()->user()->is_admin)
<script>
$(function() {
 function sendMarkRequest(id = null) {
  let csrfToken = $('meta[name="csrf-token"]').attr('content');
  return $.ajax("{{ route('admin.markEventNotification') }}", {
   method: 'POST',
   data: {
    _token: csrfToken,
    id
   }
  });
 }

 $('.mark-as-read').click(function() {
  let request = sendMarkRequest($(this).data('id'));

  request.done(() => {
   $(this).parents('div.alert').remove();
  });
 });

 $('#mark-all').click(function() {
  let request = sendMarkRequest();

  request.done(() => {
   $('div.alert').remove();
  })
 });
});
</script>
@endif

@endsection