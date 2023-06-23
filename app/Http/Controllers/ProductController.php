<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Cart;
use App\Models\User;

class ProductController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $cartCount = Cart::count();
        return view('dashboard', [
            'product_count' => $productCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount,
            'cart_count' => $cartCount,
        ]);
    }
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('Product.product', ['productList' => $product, 'categories' => $category]);
    }
    public function addProduct()
    {
        $categories = Category::all();
        return view('Product.addProduct', ['categoriesProductList' => $categories]);
    }
    public function addProductProcess(ProductRequest $request)
    {
        $newName = '';
        if ($request->file('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('cover')->storeAs('image', $newName);
        }
        $request['image'] = $newName;
        $product = Product::create($request->all());
        $product->categories()->sync($request->categories);

        return redirect('/products')->with('status', 'Product ' . $product->name . ' Success ditambah');
    }
    public function editProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();
        return view('Product.editProduct', ['productEdit' => $product, 'categories' => $categories]);
    }
    public function editProcess(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('cover')->storeAs('image', $newName);
            $request['image'] = $newName;
        }
        $product = Product::where('slug', $slug)->first();
        $product->update($request->all());

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        }
        return redirect('/products')->with('status', 'Product ' . $product->name . ' Success diedit');
    }
    public function delete($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->delete();
        return redirect('/products')->with('status', 'Product ' . $product->name . ' Success dihapus');
    }
    public function showDeleted()
    {
        $product = Product::onlyTrashed()->get();
        return view('Product.showDeletedProduct', ['productListDeleted' => $product]);
    }
    public function restore($slug)
    {
        $product = Product::withTrashed()->where('slug', $slug)->first();
        $product->restore();
        return redirect('/products')->with('status', 'Product ' . $product->name . ' Success direstore');
    }
    public function deleteSlug($slug)
    {
        $products = Product::withTrashed()->where('slug', $slug)->first();
        if ($products) {
            $products->forceDelete();
            return redirect('/products')->with('status', 'Product ' . $products->name . ' Success dihapus secara permanen');
        } else {
            return redirect('/products')->with('status', 'Product tidak ditemukan');
        }
    }
    public function deleteAllSlug()
    {
        $categories = Product::onlyTrashed()->forceDelete();
        return redirect('/products')->with('status', 'Semua Sampah pada Products Success dihapus secarea permanen');
    }
}
