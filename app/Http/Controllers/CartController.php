<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\orderdetails;

use Illuminate\Http\Request;

class CartController extends Controller
{



     function compleateorder()
     {
      //   $carts = Cart::where('user_id',auth()->user()->id)->get();
      //   $total = 0;
      //   foreach($carts as $cart)
      //   {
      //    $cart->total = $cart->quantity * $cart->product->price;
      //   }
      //   $total = $carts->sum('total');


      $carts = Cart::with('Product')->where('user_id', auth()->user()->id)->get();
       $total = 0;
      foreach($carts as $cart)
      {
       $cart->total = $cart->quantity * $cart->product->price;
      }
      $total = $carts->sum('total');
        return view('Products.compleateorder',['carts'=>$carts ,'total'=>$total]);
     }

     function previousorder()
     {
         // Retrieve all orders with their details
         $orders = Order::with('OrderDetails')->where('user_id',auth()->user()->id)->get();

         return view('Products.previousorder', ['orders' => $orders]);
     }
     





   function cart()
   {
      // $carts = Cart::where('user_id',auth()->user()->id)->get();
      // $carts = Cart::with('product')->where('user_id', auth()->user()->id->get();
     $carts = Cart::with('Product')->where('user_id', auth()->user()->id)->get();
     
     foreach($carts as $cart)
     {
      $cart->total = $cart->quantity * $cart->product->price;
     }
     $total = $carts->sum('total');
     
     
    return view('Products.cart',['carts'=>$carts ,'total'=>$total]);
   } 
   function removecartitem($id)
   {
      
      $cart = Cart::find($id);
      $cart->delete();
      return redirect('cart');
   }


   function addproducttocart ($productid){

      $user_id=auth()->user()->id;
      $product=Product::find($productid);
      $result=Cart::where('user_id',$user_id)->where("product_id",$productid)->get();
  
  
  
   if($result->count() > 0 ){
      if($product->quantity > $result->first()->quantity){
      $result->first()->quantity += 1;
      $result->first()->save();
  }
  else{
      return redirect('/cart')->with(['message'=>$product->name,'Product is out of stock']);
  }
     
   }
      else{
         $newcart = new Cart();
         $newcart->product_id = $productid;
         $newcart->user_id = $user_id;
         // $newcart->quantity = $request->quantity;
         $newcart->quantity = 1;
         $newcart->save();
        
      }
      return redirect('/cart');
  
  }

   function storeorder(Request $req){
      $neworder = new Order();
      $neworder->name = $req->name;
      $neworder->email = $req->email;
      $neworder->phone = $req->phone;
      $neworder->city = $req->city;
      $neworder->address = $req->address;
      $neworder->note = $req->note;
      $neworder->user_id = auth()->user()->id;
      $neworder->save();

      $carts = Cart::with('Product')->where('user_id', auth()->user()->id)->get();
     

      foreach($carts as $item){
         $neworderdetail = new Orderdetails();
         $neworderdetail->product_id = $item->product_id;
         $neworderdetail->price = $item->product->price;
         $neworderdetail->quantity = $item->quantity;
         $neworderdetail->order_id = $neworder->id;
         $neworderdetail->total = $item->quantity * $item->product->price;
         $neworderdetail->save();
      }


      Cart::where('user_id',auth()->user()->id)->delete();
      return redirect('/');


   }

  

 
   
}
