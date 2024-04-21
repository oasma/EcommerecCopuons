@extends('Layouts.master')

@section('name')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @foreach ($orders as $item)
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order Number {{ $item->id }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">
                                                <form>
                                                    <p>تاريخ انشاء الطلب  : <input type="tel" value="{{ $item->created_at }}" required
                                                            id="phone" name="phone" placeholder="Phone"></p>
                                                   

                                                    <p>الاسم<input type="text" value="{{ $item->name }}" required
                                                            id="name" name="name" placeholder="Name"></p>
                                                    <p>البريد الالكتروني<input type="email" value="{{ $item->email }}" required
                                                            id="email" name="email" placeholder="Email"></p>
                                                    <p>المدينة<input type="text" value="{{ $item->city }}" required
                                                            id="city" name="city" placeholder="City"></p>
                                                    <p>العنوان<input type="text" value="{{ $item->address }}" required
                                                            id="address" name="address" placeholder="Address"></p>
                                                    <p>التلفون<input type="tel" value="{{ $item->phone }}" required
                                                            id="phone" name="phone" placeholder="Phone"></p>
                                                    <p>الوصف

                                                        <textarea name="note" id="note" cols="30" rows="10" placeholder="Say Something"> {{ $item->note }}</textarea>
                                                    </p>
                                                </form>


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
                                                                    @foreach ($item->OrderDetails as $detail)
                                                                        <tr class="table-body-row">

                                                                            <td class="product-image"><img
                                                                                    src="{{ $detail->product->imagepath }}"
                                                                                    alt="">
                                                                            </td>
                                                                            <td class="product-name">
                                                                                <a
                                                                                    href="/showproduct/{{ $detail->product->id }}">
                                                                                    {{ $detail->product->name }}
                                                                                </a>
                                                                            </td>
                                                                            <td class="product-price">
                                                                                {{ $detail->price }}</td>
                                                                            <td class="product-quantity">
                                                                                {{ $detail->quantity }}</td>
                                                                            <td class="product-total">
                                                                                {{ $detail->price * $detail->quantity }}


                                                                        </tr>
                                                                    @endforeach

                                                                    @if (session('message'))
                                                                        <div class="alert-message">

                                                                            <div class="alert alert-info"
                                                                                class="text-center">
                                                                                <p class="text-center">انتهت الكميه لهذا
                                                                                    المنتج</p>
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

                                                                            {{-- {{ $orders->sum('orderdetail.total')}} $ --}}
                                                                            @php
                                                                                $total = 0;

                                                                                foreach (
                                                                                    $item->OrderDetails
                                                                                    as $detail
                                                                                ) {
                                                                                    $total += $detail->total;
                                                                                }

                                                                            @endphp
                                                                            {{ $total }} $

                                                                            {{-- @php
                                                                        $total = 0;
                                                                        foreach ($item->OrderDetails as $detail) {
                                                                            $total += $detail->total-$detail->total;
                                                                            {{ $total }} $
                                                                        }
                                                                        
                                                                    @endphp --}}





                                                                        </td>


                                                                    </tr>
                                                                    {{-- @dd($total) --}}
                                                                </tbody>
                                                            </table>

                                                        </div>


                                                    </div>
                                                </div>









                                            </div>
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
@endsection
