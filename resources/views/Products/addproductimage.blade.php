@extends('Layouts.master')
@section('content')
   
   



    <div class="container mt-5 mb-5" style="text-align: center;">


        <form action="/storeproductimage" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 mb-5">
                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                <div class="col-9 pt-2">
                <input type="file" class="form-control"  name="photo" id="photo">
                </div>
                <div class="col-3">
                <p><input type="submit" class="w-100" value="حفظ"></p>
                </div>
                <span class="text-danger">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </form>


        <div class="row">
            @foreach ($productphotos as $item)
                <div class="col-4">
                    <img src="{{ asset($item->imagepath) }}" width="70%" height="70%" alt="">
                    <a href="/deleteproductimage/{{ $item->id }}" class="btn btn-danger "><i class="fas fa-trash"></i>
                        حذف
                        الصوره</a>
                </div>
            @endforeach

        </div>

    </div>
@endsection
