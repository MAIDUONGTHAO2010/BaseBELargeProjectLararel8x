<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id',
        'content'
    ];
}
