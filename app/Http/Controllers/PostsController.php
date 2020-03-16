<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsController extends Controller
{
    //Utilitzant la id
    // public function show($id){

    //     $post = Post::find($id);
    //     return view('posts.show', compact('post'));
    // }

    public function show(Post $post){

        $categories = Category::take(4)->get();
        $tags = Tag::take(4)->get();
        $users = User::take(4)->get();

        if($post->isPublished() || auth()->check()){

            return view('posts.show', compact('post', 'categories', 'tags', 'users'));
        }

        abort(404);

    }
}
