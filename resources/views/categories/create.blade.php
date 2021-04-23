@extends('layouts.layout')

@section('content')
  <a href="{{route('category')}}" class="btn btn-primary btn-lg">Back</a>
  <center><h2>Categories Form Submit</h2></center>
  <form action="/categories" method="POST">
     @csrf 
    <div class="form-group">
      <label for="name">Catgory Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Category Name" name="name">
      <small style="color: red">@error('name'){{$message}}@enderror</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection