<form action="{{ route('users.update', $user->id)}}" method="POST">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('fname') ? 'has-error' : '' }}">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" style="width : 100%;" value="{{ $user->fname }}">
                @if($errors->has('fname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fname')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('lname') ? 'has-error' : '' }}">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname" style="width : 100%;" value="{{ $user->lname }}">
                @if($errors->has('lname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lname')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

    <div class="row">

        {{--<div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="lname">Email</label>
                <input type="text" class="form-control" name="email" id="email" style="width : 100%;" value="{{ $user->email }}">
                @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->--}}


        <div class="col-md-12">
            <div class="form-group{{ $errors->has('roles_id') ? 'has-error' : ''}}">
                <label for="roles_id">Role</label>
                <select class="form-control select2" name="roles_id" id="roles_id" style="width : 100%;">
                    @foreach($roles as $role)
                        <option  value="{{ $role->id }}"> {{ $role->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('roles_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roles_id')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->

        {{--<div class="col-md-6">
            <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="lname">Password</label>
                <input type="password" class="form-control" name="password" id="password" style="width : 100%;" >
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->--}}
    </div>
    <!-- /row -->

    {{--<div class="row">

        --}}{{--<div class="col-md-6">
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
        <!-- /col -->--}}{{--
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('role_id') ? 'has-error' : ''}}">
                <label for="role_id">Role</label>
                <select class="form-control select2" name="role_id" id="role_id" style="width : 100%;">
                    @foreach($roles as $role)
                        <option  value="{{ $role->id }}"> {{ $role->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('role_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_id')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->--}}
    <button type="reset" class="btn btn-danger" data-dismiss="modal" value="Clear form">Cancel</button>
    <button type="submit" class="btn btn-primary pull-right">Add User</button>
</form>