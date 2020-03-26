<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\User;

class CategoriesController extends Controller
{
    //
    public function show(Category $category){

        return view('pages.home', [
            'title_filter' => "Estos son los posts de la categoría {$category->name}",
            'posts' => $category->posts()->paginate(2),
            'categories' => Category::take(4)->get(),
            'tags' => Tag::take(4)->get(),
            'users'=> User::take(4)->get()
        ]);
    }
}
