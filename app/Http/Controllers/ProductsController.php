<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products',Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name'=>'required',
                'price'=>'required',
                'description'=>'required',
                'image'=>'required|image'

        ]);

        $image_name= $request->image;
        $image_name_new_name= time().$image_name->getClientOriginalName();
        $image_name->move('uploads/products/',$image_name_new_name);

        $product= Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'image'=>'uploads/products/'. $image_name_new_name,
                'description'=>$request->description,
        ]);
        Session::flash('success','product created');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')->with('products',Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                'name'=>'required',
                'price'=>'required',
                'description'=>'required'
        ]);

        $product= Product::find($id);
        
        if($request->hasFile('image'))
        {
            $product_image= $request->image;
            $product_new_name= time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/products/', $product_new_name);
            $product->image='uploads/products/'. $product_new_name;

        }

        $product->name= $request->name;
        $product->price= $request->price;
        $product->description= $request->description;
        $product->save();

        Session::flash('success','product edited');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        if(file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();
        Session::flash('success','deleted');
        return redirect()->back();
    }
}
