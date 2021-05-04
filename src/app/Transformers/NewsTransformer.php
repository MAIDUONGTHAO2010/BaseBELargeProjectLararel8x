<?php

namespace App\Transformers;

use App\Transformers\BaseTransformer;

class NewsTransformer extends BaseTransformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($data)
    {
        return [
            'id' => self::forId($data),
            'title' => $data->title,
            'user_id' => $data->user_id,
            'content' => $data->content,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
    }

     /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'news';
    }
}
