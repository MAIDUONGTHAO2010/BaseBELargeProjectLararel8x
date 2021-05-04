<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\Setting;
use App\Entities\Action;


/**
 * Class Script.
 *
 * @package namespace App\Entities\Script;
 */
class Script extends Model implements Transformable
{
    use TransformableTrait;

    const CURRENCY_USD = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'type_id',
      'last_name',
      'version',
      'phone_model',
      'os_version',
      'user_id',
      'price',
      'currency',
      'description'
	];

    /**
     * Get the setting for the script.
     */
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    /**
     * Get the actions for the script.
     */
    public function actions()
    {
        return $this->hasMany(Action::class);
    }

}
