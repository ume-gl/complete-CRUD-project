@extends('layouts.master')
@section('content')
<table class="table table-hover">
     
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        {{-- <th scope="col">Category</th> --}}
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
     
      </tr>
    </thead>
 
      @foreach($products as $pdct)
      <tbody>
      <tr>
        <th>{{$pdct->id}}</th>
        <td>{{$pdct->title}}</td>
        <td>{{$pdct->description}}</td>
        <td>{{$pdct->price}}</td>
        {{-- <td>{{$pdct->category->name}}</td> --}}
        <td>
          <a href="{{ url('products/' .$pdct->id. '/edit',)}}"  class="btn btn-outline-success">EDIT</a>
         
      </td>
      <td>
        <form action="{{url('products/' .$pdct->id)}}" method="POST">
          @csrf
          @METHOD('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger" >DELETE</a>
        <form>
    </td>
      </tr>
  </tbody>
    
  @endforeach

</table>
@endsection