<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\User;

class UsersController extends Controller
{
    //
    public function show(User $user){

        return view('pages.home', [
            'title_filter' => "Estos son los posts de {$user->name}",
            'posts' => $user->posts()->paginate(2),
            'categories' => Category::take(4)->get(),
            'tags' => Tag::take(4)->get(),
            'users'=> User::take(4)->get()
        ]);
    }
}
