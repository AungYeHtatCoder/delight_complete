@extends('layouts.admin_app')

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />


<style>
    .fc-event {
        background-color: #01aff9; /* Your desired color code */
        color: white !important; /* Text color for better visibility */
        border: none; /* Remove event border if needed */
    }
</style>
@endsection

@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Content Calendar</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a>
       </li>
       {{-- <li class="breadcrumb-item"><a href="#">DataTables</a>
       </li> --}}
       <li class="breadcrumb-item active">Content Calendar
       </li>
      </ol>
     </div>
    </div>
   </div>

  </div>
 </div>
</div>

<div class="container card pb-3 shadow text-center">
    <br />
    <h1 class="text-center text-secondary">Content Calendar of "
    <span class="badge badge-info">{{ Auth::user()->name }}</span>
    "</h1>
    <br />

    <h2 class="mb-3">Content Details</h2>
    <p> <span class="badge badge-success">Title: </span> <strong>{{ $event->title }} </strong></p>
    <p class="text-warning"><span class="badge badge-info">Start Date: </span> {{ date('d M, Y', strtotime($event->start)) }}</p>
    <p class="text-danger"> <span class="badge badge-info">End Date: </span> {{ date('d M, Y', strtotime($event->end)) }}</p>
    <!-- Display other event details as needed -->

</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:'/full-calendar',
            selectable:true,
            selectHelper: true,
            eventClick: function(event) {
                if (confirm("View event details?")) {
                    window.location.href = "{{ url('/full-calendar/event/') }}" + event.id;
                }
            }

        });

    });
</script>
@endsection
