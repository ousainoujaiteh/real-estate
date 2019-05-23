@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
     @if(Auth::user()->role->create_payment)
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
          <a href="{{ url('payment')}}"> Payment</a>
      </h1>
      <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Payment Mangement</a></li>
          <li class="active">Create</li>
      </ol>
      </section>
        <div class="content">
            <div class="box">
                <div class="box-body">
                <form action="{{ route('payment.store') }}" method="POST">
                    {{ csrf_field() }}


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('amount') ? 'has-error' : '' }}">
                                <label for="amount">Amount</label>
                                <input type="number" step="any" class="form-control" name="amount" id="amount" style="width: 100%;">
                                @if ($errors->has('amount'))
                                    <span>
                                        <strong>{{ $errors->first('amount')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /col-4 -->

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('payment_mode') ? 'has-error' : '' }}">
                                <label for="payment_mode">Payment Mode</label>
                                <select class="form-control select2" name="payment_mode" id="payment_mode" style="width: 100%;">
                                    <option selected="selected">Installment</option>
                                    <option>Morgage</option>
                                </select>
                                @if ($errors->has('payment_mode'))
                                <span>
                                    <strong>{{ $errors->first('payment_mode')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /col-4 -->

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('payment_method') ? 'has-error' : '' }}">
                                <label for="payment_method">Payment Method</label>
                                <select class="form-control select2" name="payment_method" id="payment_method" style="width: 100%;">
                                    <option selected="selected">Viewing</option>
                                    <option>Actual Paymet</option>
                                </select>
                                @if ($errors->has('payment_method'))
                                <span>
                                    <strong>{{ $errors->first('payment_method')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /col-4 -->

                    </div>
                    <!-- / row -->

                    <div class="row">
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
                      <!-- /col-6 -->

                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('customer_id') ? 'has-error' : '' }}">
                            <label for="customer_id">Customer</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" style="width: 100%;">
                              @foreach($customers as $customer)
                              <option value="{{ $customer->id}}">{{ $customer->fname }}</option>
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
                    <!-- .row -->

                    <a href="{{ route('payment.index')}}" type="reset" class="btn btn-danger" value="Clear form">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save Payment</button>
                </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
