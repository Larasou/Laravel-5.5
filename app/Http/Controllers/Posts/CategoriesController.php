<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('categories.category_create');
    }

    public function store() {
        Category::create(['name' => \request()->name]);

        return redirect("/");
    }

    public function destroy(Category $category) {
        $category->delete();

        return back();
    }
}
