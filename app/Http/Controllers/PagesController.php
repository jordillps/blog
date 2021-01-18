<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PagesController extends Controller
{
    

    public function home()
    {
        //Opcio 1
        // $posts = Post::whereNotNull('published_at')
        // ->where('published_at', '<=', Carbon::now())
        // ->latest('published_at')
        // ->get();

        //opció 2 amb query scope
        //carreguem  totes les relacions en la consulta
        $query = Post::with(['category','tags', 'owner', 'photos'])->latest('published_at');

        //Tenim en compte ])->['category','tags])->els paràmetres mes,any
        if(request('month')){
            $query->whereMonth('published_at', request('month'));
        }

        if(request('year')){
            $query->whereYear('published_at', request('year'));
        }

        $posts = $query->paginate(4);

        //Per veure els mesos en espanyol
        \DB::statement("SET lc_time_names = 'es_ES'");

        //Agrupació dels posts per any i per mesos
        $dataPosts = Post::byYearAndMonth()->get();

        $categories = Category::take(4)->get();
        $tags = Tag::take(4)->get();
        $users = User::take(4)->get();

        return view('pages.home', compact('posts','categories','tags', 'users', 'dataPosts'));
    }

    public function about(){
        $categories = Category::take(4)->get();
        $tags = Tag::take(4)->get();
        $users = User::take(4)->get();

        return view('pages.about', compact('categories','tags', 'users'));
    }

    public function contact(){
        $categories = Category::take(4)->get();
        $tags = Tag::take(4)->get();
        $users = User::take(4)->get();

        return view('pages.contact', compact('categories','tags','users'));
    }

   



}
