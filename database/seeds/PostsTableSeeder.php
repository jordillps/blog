<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        Role::truncate();
        Permission::truncate();

        $adminRole = Role::create(['name'=> 'Admin']);
        $writerRole = Role::create(['name'=> 'Writer']);

        $viewPostsPermission = Permission::create(['name'=>'View Posts']);
        $CreatePostsPermission = Permission::create(['name'=>'Create Posts']);
        $UpdatePostsPermission = Permission::create(['name'=>'Update Posts']);
        $DeletePostsPermission = Permission::create(['name'=>'Delete Posts']);


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
        User::truncate();

        $admin = new User;
        $admin->name = 'Jordi';
        $admin->email = 'jordillps@gmail.com';
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Pedro';
        $writer->email = 'pedros@gmail.com';
        $writer->password = bcrypt('secret');
        $writer->save();

        $writer->assignRole($writerRole);

    }
}
