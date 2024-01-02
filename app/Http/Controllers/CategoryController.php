<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category) {
        return view('category', [
            'title'=>$category->name,
            'books'=>$category->books->load('category'),
            'active'=>'categories',
            'category'=>$category->name
        ]);
    }

    public function categories() {
        return view('categories', [
            'title'=>'Categories',
            'active'=>'categories',
            'categories'=>Category::all()
        ]);
    }
}
