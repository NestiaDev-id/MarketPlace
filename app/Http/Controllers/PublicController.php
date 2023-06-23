<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->category || $request->title) {
            // $book = Book::where('title', 'like', '%' . $request->title . '%')->get();
            $product = Product::whereHas('categories', function ($item) use ($request) {
                $item->where('categories.id', $request->category);
            })->get();
        } else {
            $product = Product::all();
        }
        return view('homepage.home', ['productList' => $product, 'categoryList' => $categories]);
    }
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();
        return view('homepage.home-detail', ['productEdit' => $product, 'categories' => $categories]);
    }
}
