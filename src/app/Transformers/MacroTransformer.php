<?php

namespace App\Transformers;

use App\Transformers\BaseTransformer;
use App\Models\Macro\Macro;
use App\Transformers\File\FileTransformer;

class MacroTransformer extends BaseTransformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [

    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'files'
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
            'description' => $data->description,
            'script' => $data->script,
            'user_id' => $data->user_id,
            'country_id' => $data->country_id,
            'no_downloads' => $data->no_downloads,
            'files' => $data->files,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];
    }

    public function includeFiles(Macro $macro)
    {
        return $this->collection($macro->files, new FileTransformer());
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'macro';
    }
}
