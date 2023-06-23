@extends('layouts.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Product</h1>
        </div>

        <div class="mt-5 w-50">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/products-edit/{{ $productEdit->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label for="name" class="from-label">Name Product</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Input your name Product" value="{{ $productEdit->name }}">
                </div>
                <div>
                    <label for="stock" class="from-label">Stock Product</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                        placeholder="Input your Stock Product" value="{{ $productEdit->stock }}">
                </div>
                <div>
                    <label for="price" class="from-label">Price Product</label>
                    <input type="number" name="price" id="price" class="form-control"
                        placeholder="Input your Price Product" value="{{ $productEdit->price }}">
                </div>

                <div class="mb-3">
                    <label for="rating" class="from-label">Rating Product</label>
                    <input type="number" name="rating" id="rating" class="form-control"
                        placeholder="Input your Rating Product" value="{{ $productEdit->rating }}">
                </div>
                <div class="mb-3">
                    <label for="size" class="from-label">Size Product</label>
                    <input type="text" name="size" id="size" class="form-control"
                        placeholder="Input your Size Product" value="{{ $productEdit->size }}">
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Image</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="categories[]" id="category" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-10">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="/products" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        </div>
    </main>

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
