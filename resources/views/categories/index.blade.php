@extends('layouts.layout')

@section('content')
  <center><h2>Categories</h2></center>
  <a href="{{route('category.create')}}" class="btn btn-success btn-lg float-right">Add New Category</a>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Other Activity</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td><a href="/categories/{{$category->id}}/edit" id="{{$category->id}}" class="btn btn-primary">Edit</a> <a href="/categories/{{$category->id}}/delete" id="{{$category->id}}" class="btn btn-danger">Delete</a></td>
        </tr>
      @endforeach  
    </tbody>
  </table>
  <div style="width:100%;display:flex;justify-content: center">
    {{ $categories->links() }}
  </div>
@endsection