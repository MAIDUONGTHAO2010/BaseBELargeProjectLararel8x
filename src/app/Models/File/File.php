<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class File.
 *
 * @package namespace App\Entities\File;
 */
class File extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'type',
        'name',
        'field',
        'folder',
        'macro_id',
    ];

}
