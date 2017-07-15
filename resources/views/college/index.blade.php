<!-- index.blade.php -->
@extends('layouts.app')
@section('content')
@if (session('status'))
   <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

  <div class="container">
  <a href="/home" class="btn btn-info" style="margin-right:2%;">Back</a>
  <a href="{{action('CollegeController@create')}}" class="btn btn-primary">Add new college</a>
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>City</th>
        <th>State</th>
        <th>Description</th>
        <th>Active</th>
        <th>Website</th>
        <th>Email Domain</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($colleges as $college)
      <tr>
        <td>{{$college->id}}</td>
        <td><a href="{{action('CollegeController@show', $college['id'])}}">{{$college->name}}</a></td>
        <td>{{$college->city}}</td>
        <td>{{$college->state}}</td>
        <td>{{$college->description}}</td>
        <td>{{$college->active}}</td>
        <td>{{$college->website}}</td>
        <td>{{$college->email_domain}}</td>
        <td>{{$college->created_at}}</td>
        <td><a href="{{action('CollegeController@edit', $college['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CollegeController@destroy', $college['id'])}}" method="post">
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
