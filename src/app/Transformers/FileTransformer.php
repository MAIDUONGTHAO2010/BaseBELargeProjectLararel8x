<?php

namespace App\Transformers\File;

use App\Transformers\BaseTransformer;

class FileTransformer extends BaseTransformer
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
            'name' => $data->name,
            'path' => $data->path,
            'macro_id' => $data->macro_id,
            'user_id' => $data->user_id,
            'type' => $data->type,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'file';
    }
}
