<?php

namespace App\Transformers\Auth;

use App\Transformers\BaseTransformer;
use Auth;

class LoginTransformer extends BaseTransformer
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
            'id' => self::forId($data->user),
            'token_type' => "Bearer",
            'expires_in' => $data->passport->expires_in,
            'access_token' => $data->passport->access_token,
            'refresh_token' => $data->passport->refresh_token,
            'first_name' => $data->user->first_name,
            'last_name' => $data->user->last_name,
            'email' => $data->user->email,
        ];
    }

        /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'login';
    }
}
