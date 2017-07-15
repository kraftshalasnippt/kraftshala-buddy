<!-- index.blade.php -->
@extends('layouts.app')
@section('content')
@if (session('status'))
   <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

  <div class="container">
  <a href="/college" class="btn btn-primary" style="margin-right:2%;">Back</a>
  <a href="{{action('AppUserController@createuser',$college)}}" class="btn btn-primary">Add new user</a>
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>College</th>
        <th>Year of Graduation</th>
        <th>Email</th>
        <th>Verified</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><a href="{{action('AppUserController@show', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->college}}</td>
        <td>{{$user->year_of_graduation}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->verified?'Yes':'No'}}</td>
        <td>{{$user->created_at}}</td>
        <td>
          <form action="{{action('AppUserController@destroy', $user->id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button id="delete" class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
