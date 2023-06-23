@extends('layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add New Product</h1>
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
            <form action="/category-add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="from-label">Name Category</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Input your category Product">
                </div>

                <div class="mt-10">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="/product" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        </div>
    </main>
@endsection
