@extends('Layouts.master')

@section('content')
    {{-- <h1>shljhjs</h1>
<img src="{{asset($product->imagepath) }}" alt="">
@foreach ($product->ProductPhoto as $item)
   <img src="{{asset($item->imagepath) }}" alt="">
@endforeach



@dd($product->Category); --}}

    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="section-title text-center">
                <h3><span class="orange-text">Product</span> Details</h3>
                
            </div>>
            <div class="row">
                <div class="col-md-3">
                    <div class="single-product-img">
                        <img src="{{ asset($product->imagepath) }}" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-product-content">
                        <h4>{{ $product->name }}</h4>
                        <p class="single-product-pricing"><span>Quantity : {{ $product->quantity }}</span>
                            ${{ $product->price }}</p>
                        <p>{{ $product->description }}.</p>
                        <div class="single-product-form">

                            <a href="/addproducttocart/{{ $product->id }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <p><strong>Categories: </strong>{{ $product->Category->name }}</p>
                        </div>
                        {{-- <h4>Share:</h4>
                        <ul class="product-share">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul> --}}
                    </div>


                </div>
                <div class="col-md-3">

                    <div class="testimonail-section mt-80 mb-150">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center">
                                    <div class="testimonial-sliders">
                                        @foreach ($product->ProductPhoto as $item)
                                            <div class="single-testimonial-slider">
                                                <div class="client-avater">
                                                    <img src="{{ asset($item->imagepath) }}" alt="">
                                                </div>
                                                <div class="client-meta">

                                                    <div class="last-icon">
                                                        <i class="fas fa-quote-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<div class="container">
    <div class="section-title text-center">
        <h3><span class="orange-text">Related</span> Products</h3>
        
    </div>>
    <div class="row">

        @foreach ($relatedproducts as $item)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/showproduct/{{ $item->id }}"><img src="{{ asset($item->imagepath) }}"
                                style="min-height: 200px;max-height: 200px;" alt=""></a>
                    </div>
                    <h3>{{ $item->name }}</h3>
                    <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$ </p>



                    <a href="/addproducttocart/{{ $item->id }}" class="cart-btn">

                        <i class="fas fa-shopping-cart"></i>
                        اضافة للسله
                    </a>



                


                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
