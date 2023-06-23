@extends('layouts.main2')

@section('content')
    <div style="padding-top: 120px;">
        <div class="container-fluid">

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">Cart List</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="/" class="btn btn-sm btn-outline-secondary">Kembali Ke Home</a>
                    </div>
                </div>
            </div>
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
                                    <th>Name Product</th>
                                    <th>Waktu Pemesanan</th>
                                    <th>Harga</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <?php $totalPrice = 0; ?>
                            <tbody>
                                @foreach ($cartList as $item)
                                    @if ($item->user_id === Auth::user()->id)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>Rp.{{ $item->product->price }}</td>
                                            {{-- <td>
                                                <a href="/category-edit">Edit</a>
                                                <a href="/category-delete">Delete</a>
                                            </td> --}}
                                        </tr>
                                        <?php $totalPrice += $item->product->price; ?>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <form action="/cart-checkout" method="POST">
                            @csrf
                            @method('DELETE')
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Total Harga : Rp.{{ $totalPrice }}</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href="/cart-checkout" class="btn btn-sm btn-outline-secondary">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
