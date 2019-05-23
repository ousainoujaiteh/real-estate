
                    <form action="{{ route('property.update', ['id' => $property->id] ) }}" method="POST">
                        {{ csrf_field() }} 
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-element" id="add-new">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('property_no') ? 'has-error' : '' }}">
                                        <label for="property_no">Property No</label>
                                        <input type="number" name="property_no" id="property_no" class="form-control" value="{{ $property->property_no}}">
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
                                        <input type="text" name="property_name" id="property_name" class="form-control" value="{{ $property->property_name}}">
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
                                        <input type="text" name="location" id="location" class="form-control" value="{{ $property->location}}">
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
                                        <input type="number" name="plot_no" id="plot_no" class="form-control" value="{{ $property->plot_no}}">
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
                                        <input type="text" name="size" id="size" class="form-control" value="{{ $property->size}}">
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
                                    <input type="number" step="any" class="form-control" name="price" id="price" style="width: 100%;" value="{{ $property->price}}">
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
                                            <input type="text" name="due_date"  class="form-control pull-right" id="datepicker" value="{{ $property->due_date}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /col-6 -->

                                </div>
                                <!-- new row -->

                            <!-- /row -->       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('customer_id') ? 'has-error' : '' }}">
                                        <label for="customer_id">Customer</label>
                                        <select class="form-control select2" name="customer_id" id="customer_id" style="width: 100%;">
                                            @foreach($customers as $customer)
                                            <option {{ $property->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id}}">{{ $customer->fname }}</option>
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
                                            <option  {{ $property->agent_id == $agent->id ? 'selected' : '' }} value="{{ $agent->id}}">{{ $agent->fname}}</option>
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
                            <!-- .row -->
                            
                            <h3 class="box-title">Additional Fields</h3>

                            @foreach(json_decode($property->attributes) as $key => $value)
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group{{ $errors->has('key') ? 'has-error' : '' }}">
                                            <label for="key">Feature Name</label>
                                            <input type="text" name="key[]" id="key" class="form-control" value={{ $key }}>
                                         @if($errors->has('key'))
                                             <span class="help-block">
                                                 <strong>{{$errors->first('key')}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /col -->
                                    <div class="col-xs-6">
                                        <div class="form-group{{ $errors->has('value') ? 'has-error' : '' }}">
                                            <label for="key">Feature Value</label>
                                            <input type="text" name="value[]" id="value" class="form-control" value={{ $value }}>
                                         @if($errors->has('value'))
                                             <span class="help-block">
                                                 <strong>{{$errors->first('value')}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                            @endforeach                      
                        </div>
                        <!--/form-elements -->
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right">Update Property</button>
                    </form>