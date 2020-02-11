<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    //Utilitzant la id
    // public function show($id){

    //     $post = Post::find($id);
    //     return view('posts.show', compact('post'));
    // }

    public function show(Post $post){

        $categories = Category::all();
        $tags = Tag::all();


        return view('posts.show', compact('post', 'categories', 'tags'));
    }
}
