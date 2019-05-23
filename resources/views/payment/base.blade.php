@extends('layouts.main')
@section('content')
  <div class="content-wrapper">
    @if(Auth::user()->role->create_payment)
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       Payment
     </h1>
      <span class="headerElems" style="float:right;display:block;margin-top:-28px;position:relative;">
         <a href="{{ route('payment.create') }}" class="btn btn-primary  pull-right"><i class="fa  fa-plus"></i> Add Payment</a>
      </span>
    </section>
    @yield('action-content')
    <!-- /.content -->
    @endif
  </div>
@endsection
