@extends('Layouts.master')
@section('content')
{{Session::get('user')}}
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text"> {{ __('string.add') }}</span> {{ __('string.product')}}</h3>
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
                            @csrf
                            <p>
                                <input type="text" style="width: 100%" placeholder="الاسم" name="name" id="name"
                                    value="{{ old('name') }}" required>
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="number" class="ml-4 " style="width: 50%" placeholder="السعر" name="price"
                                    id="price" value="{{ old('price') }}" required>
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="number" style="width: 50%" placeholder="الكمية" name="quantity" id="quantity"
                                    value="{{ old('quantity') }}" required>
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </p>
                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="الوصف">

                                    {{ old('description') }}    {{-- in textarea the old value put it here --}} 
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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <p><input type="submit" value="حفظ"></p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
