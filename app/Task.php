<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Protected
    protected $fillable = [
        'user_id', 'role_id','article_id','task_status','progress_presentation'
    ];
}
