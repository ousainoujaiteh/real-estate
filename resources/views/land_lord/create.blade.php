@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <a href="{{ url('land_lord')}}"> Land Lord</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Land Lord Mangement</a></li>
            <li class="active">Create</li>
        </ol>
        </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <form action="{{ route('land_lord.store')}}" method="POST">
                     {{ csrf_field() }}
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
                                <div class="form-group{{ $errors->has('kin_name') ? 'has-error' : '' }}">
                                    <label for="email">Next of Kin Name</label>
                                    <input type="text" class="form-control" name="kin_name" id="kin_name" style="width: 100%;">
                                    @if ($errors->has('kin_name'))
                                        <span>
                                            <strong>{{ $errors->first('kin_name')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col-6 -->

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('relationship') ? 'has-error' : '' }}">
                                    <label for="relationship">Relationship</label>
                                    <input type="text" class="form-control" name="relationship" id="relationship" style="width: 100%;">
                                    @if ($errors->has('relationship'))
                                        <span>
                                            <strong>{{ $errors->first('relationship')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col-6 -->

                        </div>
                        <!-- /row -->

                        <div class="row">

                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('kin_number') ? 'has-error' : '' }}">
                                      <label for="kin_number">Next of Kin Number</label>
                                      <input type="number" class="form-control" name="kin_number" id="kin_number" style="width: 100%;">
                                        @if($errors->has('kin_name'))
                                          <span>
                                              <strong>{{ $errors->first('kin_name') }}</strong>
                                          </span>
                                        @endif
                              </div>
                            </div>
                            <!-- /col -->
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('property_id') ? 'has-error' : '' }}">
                                  <label for="property_id">Property</label>
                                  <select class="form-control select2" name="property_id" id="property_id" style="width: 100%;">
                                      @foreach($properties as $property)
                                      <option value="{{ $property->id}}">{{ $property->property_name}}</option>
                                      @endforeach
                                  </select>
                                  @if ($errors->has('property_id'))
                                  <span>
                                      <strong>{{ $errors->first('property_id')}}</strong>
                                  </span>
                                  @endif
                              </div>
                            </div>
                          <!-- /col -->
                        </div>
                        <!-- /row -->



                        <a href="{{ route('land_lord.index')}}" type="reset" class="btn btn-danger" value="Clear form">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Save Land Lord</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
