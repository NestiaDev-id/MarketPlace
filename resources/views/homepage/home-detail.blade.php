@extends('layouts.main2')

@section('content')
    <section id="prodetails" class="section-p1">
        <div class="container" style="display: flex; margin-top: 20px; margin-top: 200px;">

            <div class="single-pro-image" style="width: 40%; margin-right: 50px; ">
                <img src="{{ $productEdit->image != null ? asset('storage/image/' . $productEdit->image) : asset('image/image-notfound.jpg') }}"
                    width="100%" id="MainImage" alt="">
            </div>
            <form action="/cart/{{ $productEdit->id }}" method="post">
                @csrf
                <div class="single-pro-details" style="width: 50%; padding-top: 30px;">
                    <h6 style=""><a href="/" style="text-decoration: none; color: #000;">Home</a> /
                        {{ $productEdit->name }}</h6>
                    <h4 style="padding: 40px 0 20px 0;">{{ $productEdit->name }}</h4>
                    <h2 style="font-size: 26px;">Rp.{{ $productEdit->price }}</h2>
                    <select name="size" id="" style="display: block; padding: 5px 10px; margin-bottom: 10px;">
                        <option value="">Select Size</option>
                        <option value="">XXL</option>
                        <option value="">XL</option>
                        <option value="">S</option>
                    </select>
                    <input type="number" name="count" value="1" min="1"
                        style="width: 50px; height: 47px; padding-left: 10px; font-size:16px; margin-right: 10px;">
                    <button type="submit" class="" style="background: #088178; color: #fff">Add To Cart</button>
                    <h4 style="padding: 40px 0 20px 0;">Product Details</h4>
                    <span style="line-height: 25px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui culpa
                        consectetur repellendus cupiditate
                        obcaecati fugit, dicta aut magnam in incidunt.</span>
                </div>
            </form>
        </div>
    </section>
@endsection
