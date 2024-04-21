@extends('Layouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/showproduct/{{ $item->id }}"><img src="{{ asset($item->imagepath) }}"
                                        style="min-height: 200px;max-height: 200px;" alt=""></a>
                            </div>

                            <h3>{{ session('locale') == 'ar' ? $item->name : $item->nameEN }}</h3>

                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$ </p>



                            <a href="/addproducttocart/{{ $item->id }}" class="cart-btn">

                                <i class="fas fa-shopping-cart"></i>
                                اضافة للسله
                            </a>

                            @if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role =='salesman'))
                                <a href="/deleteproduct/{{ $item->id }}" class="btn btn-danger "><i
                                        class="fas fa-trash"></i> حذف المنتج</a>

                                <a href="/editproduct/{{ $item->id }}" class="btn btn-primary ">
                                    <i class="fas fa-edit"></i> تعديل المنتج
                                </a>


                                <a href="/addproductimage/{{ $item->id }}" class="btn btn-dark ">
                                    <i class="fas fa-image"></i> اضافة صورة
                                </a>
                            @endif


                        </div>
                    </div>
                @endforeach
                <div style="text-align: center; margin: 0px auto; color: #F28123; margin-top: 20px; margin-bottom: 20px;">
                    {{ $products->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection

<style>
    svg {
        height: 50px !important;
    }
</style>
