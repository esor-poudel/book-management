@extends('layouts.app')

@section('content')


<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">

            <thead>

            <th>

            image
            </th>
            <th>
             Name
            </th>
            <th>
            Price
            </th>
            <th>
            Editing

            </th>

            <th>
            Delete
            </th>
            </thead>
            <tbody>
           @if($products->count()>0)

           @foreach($products as $product)
            <tr>
            <td><img src="{{$product->image}}" alt="{{$product->name}}" width="90px" height="50px"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td><a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-success btn-sm">edit</a></td>
            <td>
            <form action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                            
                            {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button class="btn btn-sm btn-danger" type="submit">Delete</button>

                            </form>
                            </td>
           
           
            
            </tr>
           

           @endforeach
           @else
           <tr>
                <th colspan="5" class="text-center">No product Till Now </th>
                </tr>

           @endif
            </tbody>

            </table>
</div>

</div>

           
@endsection
