@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <a href="{{ url('customer')}}"> Customer</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Customer Mangement</a></li>
            <li class="active">Create</li>
        </ol>
        </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <form action="{{ route('customer.store') }}" method="POST">
                    {{ csrf_field() }}

                        <div class="row">
                            <!-- col 6 -->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('indentity_name') ? 'has-error' : '' }}">
                                    <label for="indentity_name">Indentity Name</label>
                                    <select class="form-control select2" name="indentity_name" id="indentity_name" style="width: 100%;">
                                        <option selected="selected">National ID Card</option>
                                        <option>Voters Card</option>
                                        <option>Passport</option>
                                    </select>
                                    @if ($errors->has('indentity_name'))
                                    <span>
                                        <strong>{{ $errors->first('indentity_name')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.col-6-->

                            <!-- .col-6-->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('indentity_number') ? 'has-error' : '' }}">
                                    <label for="indentity_number">Indentity Number</label>
                                    <input type="text" class="form-control" name="indentity_number" id="indentity_number" style="width: 100%;">
                                    @if ($errors->has('indentity_number'))
                                        <span>
                                            <strong>{{ $errors->first('indentity_number')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col 6 -->
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <!-- col-6 -->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('fname') ? 'has-error' : '' }}">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" style="width: 100%;">
                                    @if ($errors->has('fname'))
                                        <span>
                                            <strong>{{ $errors->first('fname')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-md-6 -->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('mname') ? 'has-error' : '' }}">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" class="form-control" name="mname" id="mname" style="width: 100%;">
                                    @if ($errors->has('mname'))
                                        <span>
                                            <strong>{{ $errors->first('mname')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- /row -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('lname') ? 'has-error' : '' }}">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" style="width: 100%;">
                                    @if ($errors->has('lname'))
                                        <span>
                                            <strong>{{ $errors->first('lname')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" style="width: 100%;">
                                    @if ($errors->has('phone'))
                                        <span>
                                            <strong>{{ $errors->first('phone')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" name="email" id="email" style="width: 100%;">
                                    @if ($errors->has('email'))
                                        <span>
                                            <strong>{{ $errors->first('email')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" style="width: 100%;">
                                    @if ($errors->has('address'))
                                        <span>
                                            <strong>{{ $errors->first('address')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('gender') ? 'has-error' : '' }}">
                                    <label for="gender">Gender</label>
                                    <select class="form-control select2" name="gender" id="gender" style="width: 100%;">
                                        <option selected="selected">Male</option>
                                        <option>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                    <span>
                                        <strong>{{ $errors->first('gender')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col-6 -->

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('nationality') ? 'has-error' : '' }}">
                                        <label for="lname">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" style="width: 100%;">
                                        @if ($errors->has('nationality'))
                                            <span>
                                                <strong>{{ $errors->first('nationality')}}</strong>
                                            </span>
                                        @endif 
                                </div>
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- /row -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('deposit') ? 'has-error' : '' }}">
                                    <label for="deposit">Deposit</label>
                                    <input type="number" class="form-control" name="deposit" id="deposit" style="width: 100%;">
                                    @if ($errors->has('deposit'))
                                        <span>
                                            <strong>{{ $errors->first('deposit')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col -->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                                    <label for="customer_type">Customer Type</label>
                                    <select class="form-control select2" name="type" id="type" style="width: 100%;">
                                        <option selected="selected">Tenant</option>
                                        <option>Buyer</option>
                                        <option>Maintenance</option>
                                        <option>BUilding</option>
                                    </select>
                                    @if ($errors->has('type'))
                                    <span>
                                        <strong>{{ $errors->first('type')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col-6 -->
                        </div>
                        <!-- row -->

                        <div class="row">
                        
                          <!--  <div class="col-md-6">
                                <div class="form-group{{ $errors->has('property' ? 'has-error' : '')}}">
                                        <label for="property">Property</label>
                                        <select class="form-control select2" name="property" id="property" style="width: 100%;">
                                            <option selected="selected">Ousainou Jaiteh</option>
                                            <option selected="selected">Muhammed Baldeh</option>
                                        </select>
                                </div>
                            </div> -->
                            <!-- /col -->
                            <div class="col-md-6">
                                
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                        
                        <a href="{{ route('customer.index')}}" type="reset" class="btn btn-danger" value="Clear form">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Save Customer</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection