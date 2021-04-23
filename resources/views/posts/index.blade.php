@extends('layouts.layout')


@section('content')
  @if(Session::has('LoggedIn'))
   <a href="/auth/logout" class="btn btn-danger btn-lg float-right">Log Out</a>
   <a href="{{route('posts.create')}}" class="btn btn-success btn-lg float-left">Add New Category</a>

   <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Other Activity</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->category->name}}</td>
            <td>
              @if (Session::get('LoggedIn')->email === $post->user_email || Session::get('LoggedIn')->role === 'Admin')
                <a href="/posts/{{$post->id}}/edit" id="{{$post->id}}" class="btn btn-primary">Edit</a> <a href="/posts/{{$post->id}}/delete" id="{{$post->id}}" class="btn btn-danger">Delete</a>
              @else
                  You are not this post owner or admin so you can not edit or delete this post
              @endif
            </td>
        </tr>
      @endforeach  
    </tbody>
  </table>
  <div style="width:100%;display:flex;justify-content: center">
    {{ $posts->links() }}
  </div>
  @else
    <center><h2>Login Form</h2></center>
    @if (Session::get('Failed'))
        <div class="alert alert-danger">
            {{Session::get('Failed')}}
        </div>
    @endif
    <form action="/auth/login" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
    <div style="width: 100%; display:flex; justify-content: center;">
        <a href="{{route('register')}}" class="btn btn-success">Don't have an account?</a>
    </div> 
  @endif
@endsection