<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout (Request $request) {
    	auth()->logout();
        session()->flush();

        //Dades per la pàgina home
        $posts = Post::published()->paginate(2);
        $categories = Category::take(4)->get();
        $tags = Tag::take(4)->get();
        $users = User::take(4)->get();
        
        //Agrupació dels posts per any i per mesos
        $dataPosts = Post::selectRaw('year(published_at) as year')
            ->selectRaw('monthname(published_at) as month')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'month')
            ->orderByRaw('year(published_at)','monthname(published_at)')
            ->get();

        return view('pages.home', compact('posts','categories','tags', 'users', 'dataPosts'));
    }
}

