<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PagesController extends Controller
{
    //
    public function home()
    {
        //Opcio 1
        // $posts = Post::whereNotNull('published_at')
        // ->where('published_at', '<=', Carbon::now())
        // ->latest('published_at')
        // ->get();

        //opció 2 amb query scope
        $posts = Post::published()->paginate(2);
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.home', compact('posts','categories','tags'));
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.about');
    }

    public function archive(){
        return view('pages.about');
    }


}
