<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable= [
        'title',
        'description',
        'content',
        'slug'
    ];
    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $original_slug = $slug;
        $findslug = Post::where('slug', $slug)->first();
        $i = 0;

        while($findslug){
            $slug = $original_slug . $i;
            $i++;
            $findslug = Post::where('slug', $slug)->first();
        }
        return $slug;
    }
}
