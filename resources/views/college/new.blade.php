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
  <br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>City</th>
        <th>State</th>
        <th>Student Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      @foreach($colleges as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->city}}</td>
        <td>{{$user->state}}</td>
        <td>{{$user->student_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->mobile}}</td>
        <td>
          <form action="{{action('CollegeController@destroynew', $user->id)}}" method="post">
            {{csrf_field()}}
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
