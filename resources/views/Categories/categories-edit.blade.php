@extends('layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Category</h1>
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
            <form action="/category-edit/{{ $categoryEdit->slug }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="name" class="from-label">Name Category</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $categoryEdit->name }}" placeholder="Category Name">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/category" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        </div>
    </main>
@endsection
