<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //

    public function store(Post $post){

        $this->validate(request(),[
            'photo' => 'required|image|max:2048'
        ]);

        $photo = request()->file('photo');

        //Per guardar a la carpeta public/img/posts
        //Ho hem configurat a config/filesystems: public_path
        $photoUrl = $photo->store('posts');

        //Per guardar a la carpeta /storage/public/
        //Ho hem configurat a config/filesystems: storage_path
        //$photoUrl = $photo->store('public');

        Photo::create([
            'url' => '/images/'.$photoUrl,
            'post_id' => $post->id
        ]);

    }

    public function destroy(Photo $photo)
    {
        //Borrem de la base de dades
        $photo->delete();

        //Borrem del servidor
        $image_path = public_path().$photo->url;
        unlink($image_path);

        return back()->with('flash', 'Foto eliminada');
    }
}
