<form action="{{ route('users.change_password', $user)}}" method="POST">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('old_password') ? 'has-error' : '' }}">
                <label for="lname">Old Password</label>
                <input type="old_password" class="form-control" name="old_password" id="old_password" style="width : 100%;" >
                @if($errors->has('old_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('old_password')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="lname">New Password</label>
                <input type="password" class="form-control" name="password" id="password" style="width : 100%;" >
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="lname">Comfirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  style="width : 100%;" required>
                @if($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
    <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
    <button type="submit" class="btn btn-primary pull-right">Change Password</button>
</form>