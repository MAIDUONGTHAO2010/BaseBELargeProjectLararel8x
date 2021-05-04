<?php

namespace App\Models\Macro;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\File\File;

/**
 * Class Macro.
 *
 * @package namespace App\Entities\Macro;
 */
class Macro extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'uid',
        'downloads',
        'price',
        'status'
    ];

    /**
     * Get the files for the blog macro.
     */
    public function files()
    {
        return $this->hasMany(File::class)->where('field', 1);
    }

}
