@extends('layouts.main')
@section('content')
 
  <div class="content-wrapper">
    @if(Auth::user()->role->create_user)
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       Users
     </h1>
      <span class="headerElems" style="float:right;display:block;margin-top:-28px;position:relative;">
         <a href="{{ route('users.create') }}" class="btn btn-primary  pull-right"><i class="fa  fa-plus"></i> Add User</a>
      </span>
    </section>
    @yield('action-content')
    <!-- /.content -->
    @endif
  </div>
 
@endsection
