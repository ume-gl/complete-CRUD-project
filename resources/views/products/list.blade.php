@extends('layouts.master')
@section('content')
<form action="{{url('products')}}"     type="get">

  <div class="input-group">
      <input type="search" class="form-control" name="search" value="{{ request('search') }}"  style= "width:500px; margin-left:820px"
          placeholder="Search products"> <span class="input-group-btn">
          <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
          </button>
      </span>
  </div>
</form>
<div class="col-sm-6" style="margin-left: 300px; margin-top:0%">
  <a href="{{route('products.create')}}" class="btn btn-outline-success" style="margin-top: 60px;margin-left: 40px;">Add Products</a>
    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <table class="table table-hover">
     
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Category</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
              <th scope="col">Image</th>
           
            </tr>
          </thead>
        
            @foreach($products as $pdct)
          
            <tbody>
            <tr>
              <th>{{$pdct->id}}</th>
              <td>{{$pdct->title}}</td>
              <td>{{$pdct->description}}</td>
              <td>{{$pdct->price}}</td>
            
              <td>{{$pdct->category->name}}</td>
              
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
              <td>
                
                <img src="{{url('public/Image/'.$pdct->file_path)}}"
            

             style="height: 50px; width: 50px;">
        </td>
            </tr>
           
        </tbody>
          
        @endforeach
      

    </table>
    {{ $products->links() }}

</div>
</div>

</div>
@endsection