{{--@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
        <h1>
            <a href="{{ url('construction')}}"> Construction</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Construction Mangement</a></li>
            <li class="active">Edit</li>
        </ol>
        </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">--}}
                    <form class="form-group" action="{{ route('construction.update', $construction ) }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                                        <label for="type">Construction Type</label>
                                        <select class="form-control select2" name="type" id="type" style="width: 100%;" value={{ $construction->type }} >
                                            <option selected="selected">Building</option>
                                            <option>Maintenance</option>
                                           
                                        </select>
                                        @if ($errors->has('type'))
                                        <span>
                                            <strong>{{ $errors->first('type')}}</strong>
                                        </span>
                                        @endif  
                                    </div>
                                </div>
                                <!-- /col -->
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('cost') ? 'has-error' : '' }}">
                                        <label for="type">Cost</label>
                                        <input type="number" class="form-control" name="cost" id="cost" style="width: 100%;" value="{{ $construction->cost }}">
                                        @if($errors->has('cost'))
                                            <span>
                                            <strong>{{ $errors->first('cost')}}</strong>
                                            </span>
                                        @endif    
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->

                            <div class="row">
                            
                                <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('details') ?  'has-error' : ''}}">
                                            <label for="details">Details</label>
                                            <textarea class="form-control" name="details" id="details" cols="30" rows="10" style="width: 100%;" value={{ $construction->details }}></textarea>
                                            @if($errors->has('details'))
                                                <span>
                                                    <strong>{{ $errors->first('details')}}</strong>
                                                </span>
                                            @endif   
                                        </div>
                                    </div>
                                    <!-- /col -->
                                </div>

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('worker_name') ? 'has-error' : '' }}">
                                        <label for="worker_name">Worker Name</label>
                                        <input type="text" class="form-control" name="worker_name" id="worker_name" style="width: 100%;" value="{{ $construction->worker_name }}">
                                        @if($errors->has('worker_name'))
                                            <span>
                                            <strong>{{ $errors->first('worker_name')}}</strong>
                                            </span>
                                        @endif    
                                    </div>  
                                </div>
                                <!-- /col -->
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('Worker_type') ? 'has-error' : '' }}">
                                        <label for="worker_type">Worker Type</label>
                                        <select class="form-control select2" name="worker_type" id="worker_type" style="width: 100%;" value={{ $construction->worker_type }}>
                                            <option selected="selected">Company</option>
                                            <option>Individual</option>
                                           
                                        </select>
                                        @if ($errors->has('worker_type'))
                                        <span>
                                            <strong>{{ $errors->first('worker_type')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('work_type') ? 'has-error' : '' }}">
                                        <label for="work_type">Work Type</label>
                                        <select class="form-control select2" name="work_type" id="work_type" style="width: 100%;" value={{ $construction->work_type }}>
                                            <option selected="selected">Building</option>
                                            <option>Maintenance</option>
                                           
                                        </select>
                                        @if ($errors->has('worke_type'))
                                        <span>
                                            <strong>{{ $errors->first('worke_type')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col -->
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('status') ? 'has-error' : '' }}">
                                        <label for="status">Status</label>
                                        <select class="form-control select2" name="status" id="status" style="width: 100%;" value={{ $construction->status }}>
                                            <option >Completed</option>
                                            <option>Incomplete</option>
                                           
                                        </select>
                                        @if ($errors->has('status'))
                                        <span>
                                            <strong>{{ $errors->first('status')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="start_date" class="form-control pull-right" id="datepicker" value={{ $construction->start_date }}>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="end_date" class="form-control pull-right" id="datepicker2" value={{ $construction->end_date }}>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->

                            <div class="row">

                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('location') ? 'has-error' : '' }}">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" style="width: 100%;" value="{{ $construction->location }}">
                                            @if($errors->has('location'))
                                                <span>
                                                <strong>{{ $errors->first('location')}}</strong>
                                                </span>
                                            @endif    
                                        </div>  
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('customer_id') ? 'has-error' : '' }}">
                                        <label for="customer_id">Customer</label>
                                        <select class="form-control select2" name="customer_id" id="customer_id" style="width: 100%;">
                                        @foreach($customers as $customer)
                                        <option {{ $construction->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id}}">{{ $customer->fname }}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('customer_id'))
                                        <span>
                                            <strong>{{ $errors->first('customer_id')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col-6 -->
                            </div>
                            <!-- /row -->
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Update Construction</button>
                    </form>
                {{--</div>
            </div>
        </section>
    </div>
@endsection--}}