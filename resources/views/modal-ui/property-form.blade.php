<form action="{{ route('property.store') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-element" id="add-new">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('property_no') ? 'has-error' : '' }}">
                    <label for="property_no">Property No</label>
                    <input type="number" name="property_no" id="property_no" class="form-control">
                    @if($errors->has('property_no'))
                        <span class="help-block">
                            <strong>{{$errors->first('property_no')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col -->
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('property_name') ? 'has-error' : '' }}">
                    <label for="property_name">Property Name</label>
                    <input type="text" name="property_name" id="property_name" class="form-control">
                    @if($errors->has('property_name'))
                        <span class="help-block">
                            <strong>{{$errors->first('property_name')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('property_type' ? 'has-error' : '')}}">
                    <label for="property_type">Property Type</label>
                    <select class="form-control select2" name="property_type" id="property_type" style="width: 100%;">
                        <option >Rent</option>
                        <option>Sale</option>
                        <option>Lease</option>
                    </select>
                    @if($errors->has('property_type'))
                        <span class="help-block">
                            <strong>{{$errors->first('property_type')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col-6 -->
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('location') ? 'has-error' : '' }}">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control">
                    @if($errors->has('location'))
                        <span class="help-block">
                            <strong>{{$errors->first('location')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col-6 -->
        </div>
        <!-- /row -->


        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('plot_no') ? 'has-error' : '' }}">
                    <label for="plot_no">Plot No</label>
                    <input type="number" name="plot_no" id="plot_no" class="form-control">
                    @if($errors->has('plot_no'))
                        <span class="help-block">
                            <strong>{{$errors->first('plot_no')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col -->
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('size') ? 'has-error' : '' }}">
                    <label for="size">Size</label>
                    <input type="text" name="size" id="size" class="form-control">
                    @if($errors->has('size'))
                        <span class="help-block">
                            <strong>{{$errors->first('size')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->



        <div class="row">

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Price</label>
                    <input type="number" step="any" class="form-control" name="price" id="price" style="width: 100%;">
                    @if ($errors->has('price'))
                        <span>
                            <strong>{{ $errors->first('price')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col-6 -->

            <!-- /col-6 -->
            <div class="col-md-6">
                <!-- /form group -->
                <div class="form-group">
                    <label for="payment_due">Payment Due Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="due_date"  class="form-control pull-right" id="datepicker">
                    </div>
                </div>
            </div>
            <!-- /col-6 -->

        </div>
        <!-- new row -->


        <div class="row">
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
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('agent_id') ? 'has-error' : '' }}">
                    <label for="agent_id">Agent</label>
                    <select class="form-control select2" name="agent_id" id="agent_id" style="width: 100%;">
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id}}">{{ $agent->fname}}</option>

                        @endforeach
                    </select>
                    @if ($errors->has('agent_id'))
                        <span>
                            <strong>{{ $errors->first('agent_id')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- /col-6 -->
        </div>
        {{--<!-- .row -->
        <button type="button" class="btn btn-success" id="add">Add More</button>--}}
    </div>
    <!--/form-elements -->
    <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
    <button type="submit" class="btn btn-primary pull-right">Add Property</button>
</form>