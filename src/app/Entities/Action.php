<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Action.
 *
 * @package namespace App\Entities\Actions;
 */
class Action extends Model implements Transformable
{
    use TransformableTrait;

    const ACTION_TYPE_VALUE = [
        -1 => 'DO_NOTHING',
        0 => 'CLICK',
        1 => 'DOUBLE_CLICK',
        2 => 'LONG_CLICK',
        3 =>'TOUCH_MOVE',
        4 => 'SWIPE',
        5 => 'ZOOM_IN',
        6 => 'ZOOM_OUT',
        7 => 'GLOBAL_SWIPE_LEFT',
        8 => 'GLOBAL_SWIPE_RIGHT',
        9 => 'GLOBAL_SWIPE_UP',
        10 => 'GLOBAL_SWIPE_DOWN',
        11 => 'GLOBAL_BACK',
        12 => 'GLOBAL_RECENTS',
        13 => 'GLOBAL_HOME',
        14 => 'OPEN_APP',
        15 => 'TAKE_SCREENSHOT',
        16 => 'SEARCH_TEXT',
        17 => 'SEARCH_IMAGE',
        18 => 'DELAY',
        19 => 'SCROLL',
        20 => 'PASTE_TEXT',
        21 => 'COPY_TEXT',
        22 => 'TEXT_OCR'
    ];
    const ACTION_TYPE_KEY = [
        'DO_NOTHING' => -1,
        'CLICK' => 0,
        'DOUBLE_CLICK' => 1,
        'LONG_CLICK' => 2,
        'TOUCH_MOVE' => 3,
        'SWIPE' => 4,
        'ZOOM_IN' => 5,
        'ZOOM_OUT' => 6,
        'GLOBAL_SWIPE_LEFT' => 7,
        'GLOBAL_SWIPE_RIGHT' => 8,
        'GLOBAL_SWIPE_UP' => 9,
        'GLOBAL_SWIPE_DOWN' => 10,
        'GLOBAL_BACK' => 11,
        'GLOBAL_RECENTS' => 12,
        'GLOBAL_HOME' => 13,
        'OPEN_APP' => 14,
        'TAKE_SCREENSHOT' => 15,
        'SEARCH_TEXT' => 16,
        'SEARCH_IMAGE' => 17,
        'DELAY' => 18,
        'SCROLL' => 19,
        'PASTE_TEXT' => 20,
        'COPY_TEXT' => 21,
        'TEXT_OCR' => 22
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'script_id',
        'type',
        'x',
        'y',
        'r',
        'x2',
        'y2',
        'r2',
        'rect_left',
        'rect_top',
        'rect_bottom',
        'rect_right',
        'click_type',
        'duration',
        'delay_time',
        'keyword',
        'image_name',
        'from_clipboard',
        'to_clipboard',
        'package_name'
    ];

}
