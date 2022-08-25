@extends('layouts.master')
@section('content')
@if(session()->has('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="container mt-5" style="margin-left: 300px; margin-top:0%" >
    <div class="row">
        <div class="col-sm-6">
            <form action="{{route('products.store')}}" method="POST" 	enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description"  value="{{old('description')}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>
                  <div class="form-group">
                    <label for="image" class="form-label">Upload  Image</label>
                    <input type="file" name="file" >
                </div>
                <div class="form-group">
                  <label for="category" class="form-label">Choose Category</label>
                 <select name="category"  class="form control input-sm"> 
                  @foreach($data1 as $cat)
                  <option 
                  value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                 </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
             
        </div>
    

@endsection
       


