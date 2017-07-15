<!-- index.blade.php -->
@extends('layouts.app')
@section('content')
@if (session('status'))
   <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
  	<div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{action('CollegeController@open', $user->id)}}" class="btn btn-info" style="margin-right:2%;">Back</a>
            <div class="panel panel-default">
                <div class="panel-heading">User Details</div>
                <div class="panel-body">
                <a href="{{action('AppUserController@edit', $user->id)}}" class="btn btn-info" style="margin-right:2%;">Edit</a>
                @if(is_null($user->ban)||!$user->ban)
                <a href="{{action('AppUserController@bantoggle', $user->id)}}" class="btn btn-danger" style="margin-right:2%;">Ban</a>
                @else
                <a href="{{action('AppUserController@bantoggle', $user->id)}}" class="btn btn-warning" style="margin-right:2%;">Unban</a>
                @endif

                @if(is_null($user->verified)||!$user->verified)
                <a href="{{action('AppUserController@verifyuser', $user->id)}}" class="btn btn-warning" style="margin-right:2%;">Verify User</a>
                @else
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">User Verified</a>
                @endif

                @if(is_null($user->verified)||!$user->mobile_verified)
                <a href="{{action('AppUserController@verifymobile', $user->id)}}" class="btn btn-warning" style="margin-right:2%;">Verify Mobile</a>
                @else
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">Mobile Verified</a>
                @endif

                @if(is_null($user->verified)||!$user->email_verified)
                <a href="{{action('AppUserController@verifyemail', $user->id)}}" class="btn btn-warning" style="margin-right:2%;">Verify Email</a>
                @else
                <a href="" class="btn btn-info disabled" style="margin-right:2%;">Email Verified</a>
                @endif
                <br><br>
                <p><b>Name :</b>{{' '.$user->name}}</p>
                <p><b>Email :</b>{{' '.$user->email}}</p>
                <p><b>Mobile :</b>{{' '.$user->mobile}}</p>
                <p><b>College :</b>{{' '.$user->college}}</p>
                <p><b>Year of graduation :</b>{{' '.$user->year_of_graduation}}</p>
                <p><b>Status :</b>{{$user->alumni?' Alumni':' Student'}}</p>
                <p><b>Description :</b>{{' '.$user->description}}</p>
                @if($user->alumni)
                	@if($user->cur_org)
                	<p><b>Current Organisation :</b>{{' '.$user->cur_org}}</p>
                	@endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
