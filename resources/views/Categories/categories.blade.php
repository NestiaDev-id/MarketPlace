@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Category List</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="/category-add" class="btn btn-sm btn-outline-secondary">Add Category</a>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{-- <a href="/category-edit/{{ $item->slug }}">Edit</a> --}}
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->slug }}">Edit</a>
                                        <div class="modal fade" id="exampleModal{{ $item->slug }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category
                                                        </h1>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="/category-edit/{{ $item->slug }}" method="POST">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('put')
                                                            <div>
                                                                <label for="name" class="from-label">Name
                                                                    Category</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control" value="{{ $item->name }}"
                                                                    placeholder="Category Name">
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
                                                    <form action="/category-delete/{{ $item->slug }}" method="POST">
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
                                        {{-- <a href="/category-delete/{{ $item->slug }}">Delete2</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
