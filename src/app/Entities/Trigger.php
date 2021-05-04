<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Trigger.
 *
 * @package namespace App\Entities\Triggers;
 */
class Trigger extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'script_id',
        'type',
        'condition',
        'c_param',
        'action',
        'a_param'
    ];

}
