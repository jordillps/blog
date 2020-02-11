<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;

class TagsController extends Controller
{
    //
    public function show(Tag $tag){

        return view('pages.home', [
            'title_filter' => "Estos son los posts de la etiqueta {$tag->name}",
            'posts' => $tag->posts()->paginate(2),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
