<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\User;

class TagsController extends Controller
{
    //
    public function show(Tag $tag){

        return view('pages.home', [
            'title_filter' => "Estos son los posts de la etiqueta {$tag->name}",
            'posts' => $tag->posts()->paginate(2),
            'categories' => Category::take(4)->get(),
            'tags' => Tag::take(4)->get(),
            'users'=> User::take(4)->get()
        ]);
    }
}
