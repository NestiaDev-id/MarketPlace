@extends('layouts.main')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h1 class="h2">Product</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/products-add" class="btn btn-sm btn-outline-secondary">Add Product</a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
            </div>

            {{-- {{ $productList->categoriesProductList[1] }} --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Sold</th>
                                <th>Rating</th>
                                <th>Size</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productList as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    {{-- <td>{{ $item->categoriesProductList->name }} --}}
                                    <td>
                                        @foreach ($item->categories as $categoryItem)
                                            {{ $categoryItem->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $item->sold }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->image }}</td>
                                    <td>
                                        {{-- <a href="/products-edit/{{ $item->slug }}">Edit</a> --}}
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->slug }}">Edit</a>
                                        <div class="modal fade" id="exampleModal{{ $item->slug }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product
                                                        </h1>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"> <span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="/products-edit/{{ $item->slug }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('put')
                                                            <div>
                                                                <label for="name" class="from-label">Name
                                                                    Product</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control"
                                                                    placeholder="Input your name Product"
                                                                    value="{{ $item->name }}">
                                                            </div>
                                                            <div>
                                                                <label for="stock" class="from-label">Stock
                                                                    Product</label>
                                                                <input type="number" name="stock" id="stock"
                                                                    class="form-control"
                                                                    placeholder="Input your Stock Product"
                                                                    value="{{ $item->stock }}">
                                                            </div>
                                                            <div>
                                                                <label for="price" class="from-label">Price
                                                                    Product</label>
                                                                <input type="number" name="price" id="price"
                                                                    class="form-control"
                                                                    placeholder="Input your Price Product"
                                                                    value="{{ $item->price }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="rating" class="from-label">Rating
                                                                    Product</label>
                                                                <input type="number" name="rating" id="rating"
                                                                    class="form-control"
                                                                    placeholder="Input your Rating Product"
                                                                    value="{{ $item->rating }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="size" class="from-label">Size
                                                                    Product</label>
                                                                <input type="text" name="size" id="size"
                                                                    class="form-control"
                                                                    placeholder="Input your Size Product"
                                                                    value="{{ $item->size }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="cover" class="form-label">Image</label>
                                                                <input type="file" name="cover" id="cover"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="mt-3 mb-3">
                                                                <label for="category" class="form-label">Category</label>
                                                                <select name="categories[]" id="category"
                                                                    class="form-control">
                                                                    @foreach ($categories as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" class="btn btn-primary">Yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->slug }}">Delete</a>
                                        <div class="modal fade" id="exampleModal{{ $item->slug }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="/products-delete/{{ $item->slug }}" method="POST">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('DELETE')
                                                            Apakah anda yakin ingin menghapus {{ $item->name }}
                                                            ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <button type="submit" class="btn btn-primary">Yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    {{-- @include('Product.editProductMeda') --}}
@endsection
