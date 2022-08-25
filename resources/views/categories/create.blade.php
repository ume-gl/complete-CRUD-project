
@extends('layouts.master')
@section('content')
<div class="row">
  @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="container mt-5" style="margin-left: 300px; margin-top:0%">
  
        <div class="col-sm-6">
            <form action="{{route('categories.store')}}" method="POST" >
                @csrf
               
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder=" Enter Name" value="{{old('name')}}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" placeholder="Description" id="description"  value="{{old('description')}}"  name="description" required></textarea>
                    <label for="description"></label>
                  </div>     
                  
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
             
        </div>

  @endsection