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
  <a href="{{action('Admin_UserController@create')}}" class="btn btn-primary">Add new user</a>
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>College</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admin_users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['phone']}}</td>
        <td>{{$user['role']}}</td>
        <td>{{$user['college']}}</td>
        <td>{{$user['created_at']}}</td>
        <td><a href="{{action('Admin_UserController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('Admin_UserController@destroy', $user['id'])}}" method="post">
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

<script type="text/javascript">
    $(document).ready(function () {  
      $("#delete").on("click", function(){
          return confirm("Do you want to delete this item?");
      });
    });
</script>
