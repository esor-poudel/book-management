<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        $pdt= Product::find(request()->pdt_id);
           // dd(request()->all());
          $cartItem= Cart::add([
               'id'=>$pdt->id,
               'name'=>$pdt->name,
               'qty'=> request()->qty, //to make sure that the quantity is from user
               'price'=> $pdt->price

           ]);
           Cart::associate($cartItem->rowId,'App\Product');
           return redirect()->route('cart');
    }

    public function cart()
    {
      
        return view('cart');
    }
    public function Cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();

    }
    public function incr($id, $qty)
    {
        Cart::update($id, $qty+ 1);
        return redirect()->back();
    }

    public function decr($id, $qty)
    {
        Cart::update($id, $qty- 1);
        return redirect()->back();
    }
    public function addFast($id)
    {
        
        $pdt= Product::find($id);
           // dd(request()->all());
          $cartItem= Cart::add([
               'id'=>$pdt->id,
               'name'=>$pdt->name,
               'qty'=> 1, //to make sure that the quantity is from user
               'price'=> $pdt->price

           ]);
           Cart::associate($cartItem->rowId,'App\Product');
           return redirect()->route('cart');

    }

  
}
