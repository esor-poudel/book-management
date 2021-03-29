@extends('layouts.app')

@section('content')

<div class="card">
 <div class="card-header text-center">Edit product</div>
 <div class="card-body">
 <form action="{{route('products.update',['id'=>$products->id])}}" method="post"> 
 {{csrf_field()}}
 {{ method_field('PUT') }}

 <div class="form-group">
 <label for="name">Name</label>
 <input type="text" name="name" value={{$products->name}} class="form-control">
 </div>

 
 <div class="form-group">
 <label for="name">Price</label>
 <input type="text" name="price" value={{$products->price}} class="form-control">
 </div>

 
 <div class="form-group">
 <label for="name">Image</label>
 <input type="file" name="image" class="form-control">
 </div>


<label for="description">Description</label>
 <textarea name="description"  id="description" cols="90" rows="10">{{str_limit($products->description,50)}}</textarea>

 <div class="form-group">
     <button class="btn btn-success float-right" type="submit">edit product</button>
          </div>
 
 
 
 </form>
 </div>
       
@endsection