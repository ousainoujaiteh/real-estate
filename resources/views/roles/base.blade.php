@extends('layouts.main')
@section('content')
  <div class="content-wrapper">
  @if(Auth::user()->role->create_role)
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       Roles
     </h1>
      <span class="headerElems" style="float:right;display:block;margin-top:-28px;position:relative;">
         <a href="{{ route('roles.create') }}" class="btn btn-primary  pull-right"><i class="fa  fa-plus"></i> Add Role</a>
      </span>
    </section>
    @yield('action-content')
    <!-- /.content -->
    @endif
  </div>
@endsection
