@extends('layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       Customer
     </h1>
      <span class="headerElems" style="float:right;display:block;margin-top:-28px;position:relative;">
         <a href="{{ route('customer.create') }}" class="btn btn-primary  pull-right"><i class="fa  fa-plus"></i> Add Customer</a>
      </span>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
