<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Categories.categories', ['categoryList' => $categories]);
    }
    public function addCategory()
    {

        return view('Categories.categories-add');
    }
    public function addCategoryProcess(CategoryRequest $request)
    {
        $categories = Category::create($request->all());

        return redirect('/category')->with('status',  'Category ' . $categories->name . ' Success ditambah');
    }
    public function editCategory($slug)
    {
        $categories = Category::where('slug', $slug)->first();
        return view('Categories.categories-edit', ['categoryEdit' => $categories]);
    }
    public function editProcess(CategoryRequest $request, $slug)
    {
        // dd($request->all());

        $categories = Category::where('slug', $slug)->first();
        $categories->update($request->all());
        return redirect('/category')->with('status', 'Category ' . $categories->name . ' Success diupdate');
    }
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/category')->with('status', 'Category ' . $category->name . ' Success dihapus');
    }
    public function showDeleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view('Categories.categories-showDeleted', ['deletedShow' => $categories]);
    }
    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('/category')->with('status', 'Category ' . $category->name . ' Success direstore');
    }
    public function deleteSlug($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        if ($category) {
            $category->forceDelete();
            return redirect('/category')->with('status', 'Category ' . $category->name . ' Success dihapus secara permanen');
        } else {
            return redirect('/category')->with('status', 'Category not found');
        }
    }
    public function deleteAllSlug()
    {
        $categories = Category::onlyTrashed()->forceDelete();
        return redirect('/category')->with('status', 'Semua Sampah pada Category Success dihapus secarea permanen');
    }
}
