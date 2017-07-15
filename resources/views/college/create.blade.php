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
                <div class="panel-heading">Add New College</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{url('college')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">College Name</label>

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
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control" name="description" required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">Logo</label>
                            <div class="col-md-6">
                                <input type="file" id="file" name="imagefile">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="active" class="col-md-4 control-label">Active</label>
                            <div class="col-md-6">
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="active" class="form-control" name="active" value="true" required>True</label>
                                <label class="radio-inline"><input style="width:1.2em;height:1.2em;" type="radio" id="active" class="form-control" name="active" value="false" required>False</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email_domain" class="col-md-4 control-label">Email_Domain</label>

                            <div class="col-md-6">
                                <input id="email_domain" type="text" class="form-control" name="email_domain" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add College
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
