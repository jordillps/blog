<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class CategoriesController extends Controller
{
    //
    public function show(Category $category){

        return view('pages.home', [
            'title_filter' => "Estos son los posts de la categoría {$category->name}",
            'posts' => $category->posts()->paginate(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
