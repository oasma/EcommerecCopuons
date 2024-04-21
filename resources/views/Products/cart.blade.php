@extends('Layouts.master')
@section('content')
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="removecartitem/{{ $item->id }}"><i
                                                    class="far fa-window-close"></i></a></td>
                                        <td class="product-image"><img src="{{ $item->product->imagepath }}" alt="">
                                        </td>
                                        <td class="product-name">
                                            <a href="/showproduct/{{ $item->product->id }}">
                                                {{ $item->product->name }}
                                            </a>
                                        </td>
                                        <td class="product-price">{{ $item->product->price }}</td>
                                        <td class="product-quantity">{{ $item->quantity }}</td>
                                        <td class="product-total">{{ $item->product->price * $item->quantity }} $</td>
                                    </tr>
                                @endforeach

                                @if (session('message'))
                                    <div class="alert-message">

                                        <div class="alert alert-info" class="text-center">
                                            <p class="text-center">انتهت الكميه لهذا المنتج</p>
                                        </div>
                                        <p class="text-center">
                                            <button class="btn btn-warning">
                                                {{ session('message') }}
                                            </button>
                                        </p>

                                    </div>
                                @endif
                              


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>$500</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>

                                    <td>
                                        {{-- {{ $carts->sum(function($item)
                                    {
                                        return $item->product->price * $item->quantity;

                                    }) }} --}}

                                        {{-- {{ $carts->sum('product.price') * $carts->sum('quantity') }} $ --}}
                                        {{ $total }} $
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            
                            <a href="/compleateorder" class="boxed-btn black">Check Out</a>
                            <a href="/previousorder" class="boxed-btn">Old Order</a>
                        </div>
                    </div>

                    {{-- <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
