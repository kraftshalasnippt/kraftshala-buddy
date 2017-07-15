@extends('layouts.app')

@section('content')
<div class="container">
@if (session('status'))
   <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{action('CLUserController@store')}}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="year_of_graduation" class="col-md-4 control-label">Year of Graduation</label>

                            <div class="col-md-6">
                                <input id="year_of_graduation" type="text" class="form-control" name="year_of_graduation" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="status" class="form-control" name="status" value="Student" required>Student</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="status" class="form-control" name="status" value="Alumni" required>Alumni</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add User
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
