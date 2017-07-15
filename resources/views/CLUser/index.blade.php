@extends('layouts.app')

@section('content')
<div class="container">
    <h3>CL Control Panel</h3>
	<a href="{{action('CLUserController@users',Auth::user()->college)}}">List of Users</a><br><br>
	<a href="{{action('CLUserController@bannedusers',Auth::user()->college)}}">List of Banned Users</a>
</div>
@endsection