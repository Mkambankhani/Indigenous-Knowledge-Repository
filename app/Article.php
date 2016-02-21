<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'body','image_url','video_url','cat_id', 'author_id','editor_id'
    ];
}
