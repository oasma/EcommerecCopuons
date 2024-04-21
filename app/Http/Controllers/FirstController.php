<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FirstController extends Controller
{
    function minpage() {

        // Session::put('date', '12-12-2012');
        // session()->forget('date');
        // if (Auth::user()) {
        //     Session::put('user', Auth::user()->name);
        // }

        if(Auth::check()) {
            $result=Category::all();
        }
        else {
            $result=Category::take(3)->get();
        }
        
    //   dd($result);  
    
        return view('welcome',['categories'=>$result]);
    }
    function reviews() {
         $Reviews=Review::all();
        //   dd($reviews);
        return view('reviews',['reviews'=>$Reviews]);
    }

    function storereview( Request $req) {

        $req->validate([
            'name' =>'required',
            'phone' =>'required',
            'email' =>'required|email',
            'subject' =>'required',
            'message' =>'required',
        ]);
        $newreview = new Review();
        $newreview->name = $req->name;
        $newreview->phone = $req->phone;
        $newreview->email = $req->email;
        $newreview->subject = $req->subject;
        $newreview->message = $req->message;
        $newreview->save();

       return redirect('reviews');
   }

    function product($catid=null) {
        if ($catid) {
            // $result=DB::table('products')->get();
            $result = Product::where('category_id',$catid)->paginate(3);
            return view('product',['products'=>$result]);
        }
        else {
            $result = Product::paginate(3);
            // dd($result);
            return view('product',['products'=>$result]); 
        }
    }

    function all() {
        $categores=Category::all();
        
        $products=Product::all();
        return view('category',['categories'=>$categores,'products'=>$products]);
    }
}
