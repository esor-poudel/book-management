@extends('layouts.app')

@section('content')

<div class="card">
 <div class="card-header text-center">Create a new product</div>
 <div class="card-body">
 <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data"> 
 {{csrf_field()}}

 <div class="form-group">
 <label for="name">Name</label>
 <input type="text" name="name" class="form-control">
 </div>

 
 <div class="form-group">
 <label for="name">Price</label>
 <input type="text" name="price" class="form-control">
 </div>

 
 <div class="form-group">
 <label for="name">Image</label>
 <input type="file" name="image" class="form-control">
 </div>


<label for="description">Description</label>
 <textarea name="description" id="description" cols="90" rows="10"></textarea>

 <div class="form-group">
 <button class="btn btn-success float-right" type="submit">save product</button>
 </div>
 
 
 
 </form>
 </div>
       
@endsection