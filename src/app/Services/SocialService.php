<?php

namespace App\Services;

use App\Auth\PassportSocialResolver;
use Illuminate\Http\Request;

class SocialService
{

    protected  PassportSocialResolver $passportSocialResolver;

    public function __construct(PassportSocialResolver $passportSocialResolver)
    {
        $this->passportSocialResolver = $passportSocialResolver;
    }

    public function login($attributes)
    {
        $user = $this->passportSocialResolver->resolveUserByProviderCredentials($attributes['provider'], $attributes['access_token']);
        if (!$user) {
            abort(400, 'login faild');
        }

        $params = [
			'grant_type' => 'social',
			'client_id' => $attributes['client_id'],
			'client_secret' => $attributes['client_secret'],
			'access_token' => $attributes['access_token'],
			'provider' => $attributes['provider'],
		];

		// $request->request->add($params);

		$requestToken = Request::create("oauth/token", "POST", $params);
		$response = app()->handle($requestToken);

        $data = new \stdClass();
        $data->passport = json_decode($response->getContent());
        $data->user = $user;

        return $data;
    }
}
