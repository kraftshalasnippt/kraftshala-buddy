@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::user()->role == 'Admin')
                    <h3>Admin Panel</h3>
                    <a href="/admin_user">Admin/CL user table</a><br><br>
                    <a href="/college">List of Colleges</a><br><br>
                    <a href="/appuser/bannedusers">List of Banned Users</a><br><br>
                    <a href="/college/newcollege">New College Requests</a><br><br>
                @else
                    
                @endif
               
</div>
@endsection