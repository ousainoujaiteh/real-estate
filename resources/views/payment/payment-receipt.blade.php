@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="{{ url('payment')}}"> Property</a>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Payment Mangement</a></li>
                <li class="active">Receipt</li>
            </ol>
        </section>
        <!-- /content-header -->
        <div class="content">
            <div class="box">
                <div class="box-body">
                    <!-- Main content -->
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Real, Estate.
                                    <small class="pull-right">Date: {{ $today }}</small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Real, Estate.</strong><br>
                                    <strong>Address</strong>: Brusubi Housing Estate<br>
                                    <strong>Phone</strong>: 3788015<br>
                                    <strong>Email</strong>: ojaiteh.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>Customer Name</strong>: {{ $payment->customer->fname }} {{ $payment->customer->lname }}<br>
                                    <strong>Address</strong>: {{$payment->customer->address }}<br>
                                    <strong>Phone</strong>: {{ $payment->customer->phone }}<br>
                                    <strong>Email</strong>: {{ $payment->customer->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Receipt #007612</b><br>
                                <b>Property No: </b> <br>
                                <b>Property Name: </b> {{ $payment->property->due_date }} <br>
                                <b>Property Type: </b> <br>
                                <b>Location: </b>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Method</th>
                                        <th>Payment Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>{{ $payment->payment_mode }}</td>
                                            <td>{{ $payment->payment_method }}</td>
                                            <td>{{ $payment->amount }}</td>
                                        </tr>
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h5>Staff:  {{ Auth::user()->fname }} {{ Auth::user()->lname }}</h5>
                                    </div>
                                    <div class="col-lg-1">
                                        <h5>Signature:__________________________</h5>
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <!-- /col-6 -->

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h5>Customer:  {{ $payment->customer->fname }} {{ $payment->customer->lname }}</h5>
                                    </div>
                                    <div class="col-lg-1">
                                        <h5>Signature:__________________________</h5>
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- /row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a type="button" href="{{ route('payment.index')}}" class="btn btn-danger" style="margin-right: 5px;">Cancel</a>


                                <a href="{{route('payment-receipt', $payment)}}" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>

                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
        </div>
        <!-- /content -->
    </div>
    <!-- /content-wrapper -->
@endsection