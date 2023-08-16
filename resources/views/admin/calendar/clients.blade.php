@extends('layouts.admin_app')
@section('content')
<div class="content-header row">
 <div class="content-header-light col-12">
  <div class="row">
   <div class="content-header-left col-md-9 col-12 mb-2">
    <h3 class="content-header-title">Clients</h3>
    <div class="row breadcrumbs-top">
     <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="index.html">Home</a>
       </li>
       {{-- <li class="breadcrumb-item"><a href="#">DataTables</a>
       </li> --}}
       <li class="breadcrumb-item active">Clients
       </li>
      </ol>
     </div>
    </div>
   </div>

  </div>
 </div>
</div>
<div class="container card py-3">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Calendars</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                        <span class="badge badge-primary">{{ $role->title }}</span>

                        @endforeach
                    </td>
                    <td>
                        <a href="{{ url('/client-calendar/'.$user->id) }}" class="btn btn-sm btn-primary">See Calendar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
