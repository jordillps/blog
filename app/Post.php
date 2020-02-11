<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //

    protected $dates = ['published_at'];

    protected $fillable = [
       'title','url','excerpt','body','iframe','published_at','category_id'
    ];

    //si no volem utilitzar la id per a
    //mostrar el post
    function getRouteKeyName()
    {
        return 'url';
    }

    public function category(){ //$post->category->name
        return $this->belongsTo(Category::class);
    }

    public function tags(){ //$post->tag->name
        return $this->belongsToMany(Tag::class);
    }

    public function photos(){ //$post->tag->name
        return $this->hasMany(Photo::class);
    }


    //Exemple query scope
    function scopePublished($query){
        $query->whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');

    }

    //Mutador para calcular publiched_at
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
        ? $category
        : Category::create(['name'=> $category])->id;
    }



}
