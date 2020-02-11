<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Posts
        //Per buidar la taula Posts
        Post::truncate();

        $post = new Post;
        $post->title = "The Best Tropical Leaves Images.";
        $post->url = Str::slug("The Best Tropical Leaves Images.");
        $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "The Best Cultural Leaves Images.";
        $post->url = Str::slug("The Best Cultural Leaves Images.");
        $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "The Best Energical Leaves Images.";
        $post->url = Str::slug("The Best Energical Leaves Images.");
        $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        $post->published_at = Carbon::now()->subMonths(2);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        //Categories

        Category::truncate();

        $category = new Category;
        $category->name = "animals";
        $category->save();

        $category = new Category;
        $category->name = "plants";
        $category->save();

        //Tags
        $tag = new Tag;
        $tag->name = "animals";
        $tag->save();

        $tag = new Tag;
        $tag->name = "plants";
        $tag->save();

        //Users
        $user = new User;
        $user->name = 'Jordi';
        $user->email = 'jordillps@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        $user = new User;
        $user->name = 'Pedro';
        $user->email = 'pedros@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

    }
}
