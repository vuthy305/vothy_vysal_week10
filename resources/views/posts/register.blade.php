@extends('layouts.layout')


@section('content')
  <center><h2>Registration Form</h2></center>
  <form action="/auth/signup" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type=text" class="form-control" placeholder="Enter Name" id="name" name="name">
        <span style="color: red">@error('name') {{$message}} @enderror</span>
      </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
      <span style="color: red">@error('email') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
      <span style="color: red">@error('password') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
        <label for="role">User Role</label>
        <select class="form-control" id="role" name="role">
          <option>Admin</option>
          <option>User</option>
        </select>
        <span style="color: red">@error('role') {{$message}} @enderror</span>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
  <div style="width: 100%; display:flex; justify-content: center;">
    <a href="{{url('/posts')}}" class="btn btn-success">Have an account?</a>
  </div>
@endsection