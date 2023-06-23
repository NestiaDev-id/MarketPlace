<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CartController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $products = Product::all();
        $carts = Cart::with(['product'])->get();
        return view('Cart.cart', ['userList' => $users], ['productList' => $products, 'cartList' => $carts]);
    }

    public function store2(Request $request, $id)
    {
        // $product1 = Product::all();
        $product_id = intval($id);
        // $productAll = Product::where('id', $id)->first();
        $request['user_id'] = Auth::user()->id;
        $request['product_id'] = $product_id;
        $request['size'] = $request->size;
        $request['count'] = $request->count;

        Cart::create($request->all());
        return redirect('/cart');
    }
    public function delete()
    {
        Cart::query()->delete();
        return redirect('/cart');
    }
}
