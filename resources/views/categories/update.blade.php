@extends('layouts.layout')

@section('content')
  <a href="{{route('category')}}" class="btn btn-primary btn-lg">Back</a>
  <center><h2>Categories Form Update</h2></center>
  <form action="/categories/{{$data->id}}" method="POST">
    @method('PUT') 
    @csrf 
    <div class="form-group">
      <label for="name">Catgory Name</label>
      <input type="text" class="form-control" id="name" placeholder="Input Update Category Name" name="name" value="{{$data->name}}">
      <small style="color: red">@error('name'){{$message}}@enderror</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection