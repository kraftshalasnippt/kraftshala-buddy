@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{action('Admin_UserController@update', $id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="role" class="form-control" name="role" value="Admin" >Admin</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="role" class="form-control" name="role" value="CL" >CL</label>
                        </div>
                        <div class="form-group">
                            <label for="college" class="col-md-4 control-label">College</label>

                            <div class="col-md-6">
                                <input id="college" type="text" class="form-control" name="college">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Details
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
