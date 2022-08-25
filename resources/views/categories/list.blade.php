@extends('layouts.master')
@section('content')


<form action="{{url('/categories')}}"  type="get">

  <div class="input-group">
      <input type="search"  value="{{ request('search') }}"  class="form-control" name="search" style= "width:500px; margin-left:820px"  placeholder="Search categories"
       > <span class="input-group-btn">
          <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
          </button>
      </span>
  </div>
</form>

<div class="col-sm-6" style="margin-left: 300px; margin-top:0%">
  <a href="{{route('categories.create')}}" class="btn btn-outline-success" style="margin-top: 60px;margin-left: 40px;">Add Category</a>
  <div class="row">
    @if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
  @endif
    <table class="table table-hover" style="margin-left: 40px">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <th>{{$cat->id}}</th>
              <td>{{$cat->name}}</td>
              <td>{{$cat->description}}</td>
              <td>
                @if($cat->status == 1)
                
                  Hidden
                
                @else
                
                  Visible
                
                @endif
              </td>
        
            
              <td>
                  <a href="{{ url('categories/' .$cat->id. '/edit',)}}" class="btn btn-outline-success">EDIT</a>
              </td>
              <td>
                <form action="{{url('categories/' .$cat->id)}}" method="POST">
                  @csrf
                  @METHOD('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger" >DELETE</a>
                <form>
            </td>
            </tr>
            @endforeach
        </tbody>
          <br>
       
    
    </table>
    {{ $categories->links() }}
</div>
</div>

</div>
@endsection