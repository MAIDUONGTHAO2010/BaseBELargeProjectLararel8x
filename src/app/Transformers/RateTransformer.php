<?php

namespace App\Transformers;

use App\Transformers\BaseTransformer;

class RateTransformer extends BaseTransformer
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
            'script_id' => $data->script_id,
            'scores' => $data->scores
        ];
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'rate';
    }
}
