
@extends('Layouts.master')

@section('name')
    
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                      <div class="card single-accordion">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Billing Address
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="billing-address-form">
                                <form action="/storeorder" method="post" id="store-order" name="store-order">
                                    @csrf
                                    <p><input type="text" required id="name" name="name" placeholder="Name"></p>
                                    <p><input type="email" required id="email" name="email" placeholder="Email"></p>
                                    <p><input type="text" required id="city" name="city" placeholder="City"></p>
                                    <p><input type="text" required id="address" name="address" placeholder="Address"></p>
                                    <p><input type="tel" required id="phone" name="phone" placeholder="Phone"></p>
                                    {{-- <p><input type="hidden" required id="total" name="total" value="{{ $total }}"></p> --}}
                                    <p><textarea name="note" id="note" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="card single-accordion">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Card Details
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="card-details">
                                {{-- <p>Your card details form is here.</p> --}}

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
                            
                                            <div class="col-lg-4 col-md-12">
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

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>

            <div class="cart-buttons">
                {{-- <a href="cart.html" class="boxed-btn">Update Cart</a> --}}
                <a onclick="event.preventDefault(); document.getElementById('store-order').submit();" 
                class="boxed-btn black">Place Order</a>
            </div>

           
        </div>
    </div>
</div>


@endsection