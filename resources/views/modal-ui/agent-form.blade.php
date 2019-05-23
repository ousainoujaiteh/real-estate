<form  class="form-group" action="{{ route('agent.store') }}" method="POST">
    {{csrf_field() }}
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
    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="customer_type">Agent Type</label>
                <select class="form-control select2" name="type" id="type" style="width: 100%;">
                    <option >Individual</option>
                    <option>Company</option>
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
    <!-- /row -->
    <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
    <button type="submit" class="btn btn-primary pull-right">Add Agent</button>
</form>