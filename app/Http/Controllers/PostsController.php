<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Str;

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
            $comments = $post->comments;

            //Previous post
            $previous_id = Post::where('user_id', $post->user_id)
                            ->where('id','<', $post->id)
                            ->max('id');
            $previous = Post::find($previous_id);

            //Next post
            $next_id = Post::where('user_id', $post->user_id)
                        ->where('id','>', $post->id)
                        ->min('id');
            $next = Post::find($next_id);

            //Relateds
            $relateds = Post::where('category_id', $post->category_id)
                        ->where('id','!=', $post->id)
                        ->take(3)->get();
            //return $post;

            return view('posts.show', compact('post', 'categories', 'tags', 'users', 'comments', 'previous', 'next', 'relateds'));

            

        }

        abort(404);

    }
}
