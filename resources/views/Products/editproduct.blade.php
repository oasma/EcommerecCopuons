@extends('Layouts.master')
@section('content')

<div class="m-50">

    {!! $barcode !!}
</div>
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span> Products</h3>
                        <img src="data:image/svg+xml;base64,{{ base64_encode($qrcode) }}" alt="QR Code">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">

                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="/storeproduct" dir="rtl">
                            @csrf {{-- csrf token to protect from forgery attacks about post method --}}
                            <p>
                                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                <input type="text" style="width: 100%" placeholder="الاسم" name="name" id="name"
                                    value="{{ $product->name }}" required>

                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="number" class="ml-4 " style="width: 50%" placeholder="السعر" name="price"
                                    id="price" value="{{ $product->price }}" required>
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="number" style="width: 50%" placeholder="الكمية" name="quantity" id="quantity"
                                    value="{{ $product->quantity }}" required>
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </p>
                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="الوصف">

                                    {{ $product->description }}    {{-- in textarea the old value put it here --}} 
                                </textarea>
                            </p>

                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>

                            <p>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($allcategories as $item)
                                        @if ($item->id == $product->category_id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </p>

                            <p>
                                <input type="file" name="photo" id="photo" class="form-control">

                                <span class="text-danger">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <img src="{{ asset($product->imagepath) }}" width="200" height="200" alt="">
                            </p>

                            <p><input type="submit" value="حفظ"></p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
