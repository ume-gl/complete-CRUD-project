@extends('layouts.master')
@section('content')
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
@endsection