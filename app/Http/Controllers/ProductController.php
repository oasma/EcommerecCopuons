<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Http\Controllers\FirstController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;



class ProductController extends Controller
{
    function addproduct(){
        $allcategories = Category::all();
        return view('Products.addproduct',['allcategories'=>$allcategories]);;
    }



    function storeproduct(Request $req){
        // dd($req->all());
        // dd($req);
        $req->validate([
            'name' =>'required',
            'description' =>'required',
            'quantity' =>'required',
            'price' =>'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 
      if($req->id)    //editing product
        {
            $curntproduct = Product::find($req->id);
            $curntproduct->name = $req->name;
            $curntproduct->price = $req->price;
            $curntproduct->quantity = $req->quantity;
            $curntproduct->description = $req->description;
            $curntproduct->category_id = $req->category_id;
            if($req->hasfile('photo')){
                $path = $req -> photo -> move('uploads',
                Str::uuid(). '-' . $req -> photo -> getClientOriginalName());
                $curntproduct->imagepath = $path;
            }
            $curntproduct->save();
            return redirect('product');
        }
        else{      //adding product
        
        

        $newproduct = new Product;
        $newproduct->name = $req->name;
        $newproduct->description = $req->description;
        $newproduct->category_id=$req->category_id;
        $newproduct->quantity = $req->quantity;
        $newproduct->price = $req->price;

        $path = 'assets\img\not.png';
        if($req->hasfile('photo')){
            $path = $req -> photo -> move('uploads',
            Str::uuid(). '-' . $req -> photo -> getClientOriginalName());
        }
        
       

        $newproduct->imagepath = $path;

        $newproduct->save();
        return redirect('product');
    }
    }

    function deleteproduct($id = null){
        if($id != null)
        {
            $product = Product::find($id);
            $product->delete();
            return redirect('product');
        }
        else{
            abort(404,"inter product id not found");
        }
       
    }
    function editproduct($id = null){
        if($id != null)
        {
            $product = Product::find($id);
            $allcategories = Category::all();

            /**
             * Generates a QR code for the product name.
             *
             * This method generates a QR code image for the name of the given product. The QR code can be used to provide a quick way for users to access information about the product.
             *
             * @param Product $product The product for which to generate the QR code.
             * @return void
             */
           $qrcode= QrCode::size(200)->generate('o.a.a.g.almasri@gmail.com');
           $barcode = new DNS1D();
           $barcode = DNS1D::getBarcodeHTML('123456789', 'C39');

           

            return view('Products.editproduct',['product' => $product,'allcategories' => $allcategories,'qrcode' => $qrcode,'barcode'=>$barcode]);
           
        }
        else{
            return redirect('/addproduct');
        }

       
      
       
    }

    // function search (Request $reqq) {
    //     $products=Product::where('name', $reqq->name)->get();
    //      return view('product',['products'=>$products]);
    // }
    function search (Request $req) {
        $products=Product::where('name', 'like', '%'. $req->name. '%')->paginate(2);
         return view('product',['products'=>$products]);
    }

    function producttable(){
        $products=Product::all();
        return view('Products.producttable',['products'=>$products]);
    }
    
    function addproductimage($id){
        $product = Product::find($id);
        $productphotos = ProductPhoto::where('product_id',$id)->get();
        return view('Products.addproductimage',['product'=>$product,'productphotos'=>$productphotos]);
    }

    function deleteproductimage($id){
        $productphoto = ProductPhoto::find($id);
        $productphoto->delete();
        return redirect('product');
    }
    function storeproductimage(Request $req){
        $req->validate([
            'product_id' =>'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $productphoto = new ProductPhoto();
        $productphoto->product_id = $req->product_id;
        $path = 'assets\img\not.png';
        if($req->hasfile('photo')){
            $path = $req -> photo -> move('uploads',
            Str::uuid(). '-' . $req -> photo -> getClientOriginalName());
        }
        $productphoto->imagepath = $path;
        $productphoto->save();
        return redirect('product');
    }
    function showproduct($id){
        // $product = Product::find($id);
        // $productphotos = ProductPhoto::where('product_id',$id)->get();
        // $product = Product::find($id)->with('ProductPhoto')->get();
        // $product = Product::with('ProductPhoto')::with('Category')->find($id);
        $product = Product::with('ProductPhoto','Category')->find($id);
        $relatedproducts = Product::where('category_id',$product->category_id)
        ->where('id','!=',$id)->inRandomOrder()->limit(3)->get();



        return view('Products.showproduct',['product'=>$product,'relatedproducts'=>$relatedproducts]);
    }

    
}

