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


        if($post->isPublished() || auth()->check()){

            $categories = Category::take(4)->get();
            $tags = Tag::take(4)->get();
            $users = User::take(4)->get();
            $comments = $post->comments();
            
            return view('posts.show', compact('post', 'categories', 'tags', 'users', 'comments'));
        }

        abort(404);

    }
}
