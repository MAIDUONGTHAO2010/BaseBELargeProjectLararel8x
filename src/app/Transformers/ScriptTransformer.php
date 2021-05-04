<?php

namespace App\Transformers;

use App\Transformers\BaseTransformer;

class ScriptTransformer extends BaseTransformer
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
            'type_id' => $data->type_id,
            'last_name' => $data->last_name,
            'version' => $data->version,
            'phone_model' => $data->phone_model,
            'os_version' => $data->os_version,
            'user_id' => $data->user_id,
            'price' => $data->price,
            'currency' => $data->currency,
            'description' => $data->description,
            'setting' => $data->setting,
            'actions' => $data->actions
        ];
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'script';
    }
}
