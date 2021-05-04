<?php

namespace App\Http\Controllers\V1\Backend\Auth\Authenticator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth\PassportSocialResolver;
use App\Services\SocialService;
use App\Transformers\Auth\LoginTransformer;

class SocialLoginController extends Controller
{

    protected  SocialService $socialService;

    public function __construct(SocialService $socialService)
    {
        $this->socialService = $socialService;
    }

    public function google(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'access_token' => 'required|string',
                'provider' => 'required|string|in:kakao,google',
                'client_id' => 'required|numeric',
                'client_secret' => 'required|string'
            ]
        );

        return $this->fractal($this->socialService->login($attributes), new LoginTransformer());
    }
}