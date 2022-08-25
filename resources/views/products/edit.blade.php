
   @extends('layouts.master')
   @section('content')
    <div class="container mt-5" >
        <div class="row">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="col-sm-6" style="margin-left: 300px; margin-top:0%">
              <form action="{{url('products/'  .$products->id)}}" method="POST">
                @csrf
                @METHOD('PUT')
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value={{"$products->title"}} required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value={{"$products->description"}} required>
                      </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value={{"$products->price"}} required>
                      </div>
                      <div class="form-group">
                        <label for="image" class="form-label">Upload  Image</label>
                        <input type="file" name="file" value={{"$products->file"}} required>
                    </div>
                      <div class="form-group">
                        <label for="category" class="form-label">Choose Category</label>
                      <select name="category_id"  id ="category" class="form control input-sm">
                       
                        @foreach($data1 as $cat)
                        <option @if($products->category_id == $cat->id) selected   @endif value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </div>
                       </select>
                  <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                  </form>
                  @if(session()->has('status'))
                  <div class="alert alert-success">
                      {{session('status')}}
                  </div>
                  @endif
            </div>
            </div>


@endsection