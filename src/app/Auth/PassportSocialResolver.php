<?php

namespace App\Auth;

use App\Repositories\Auth\User\UserRepository;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Two\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PassportSocialResolver implements SocialUserResolverInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  string  $provider
     * @param  string  $accessToken
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        if ($provider === 'kakao') {
            $res = $this->resolveUserByProviderCredentialsKakao($accessToken);
            $user = $this->mapUserToObject($res);
            return $this->userRepository->findOrCreateProvider($user, $provider);
        }

        $providerUser = null;
        try {
            $providerUser = Socialite::driver($provider)->stateless()->userFromToken($accessToken);
        } catch (Exception $exception) {
            throw new NotFoundHttpException($exception);
        }

        if (blank($providerUser)) {
            return null;
        }


        return $this->userRepository->findOrCreateProvider($providerUser, $provider);
    }

        /**
     * @param  string  $provider
     * @param  string  $accessToken
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function resolveUserByProviderCredentialsKakao(string $accessToken)
    {

        $httpClient = new Client();
        $response = $httpClient->get('https://kapi.kakao.com/v2/user/me', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);
       

        return json_decode($response->getBody(), true);
    }

        /**
     * Map the raw user array to a Socialite User instance.
     *
     * @param array $user
     *
     * @return Laravel\Socialite\Two\User;
     */
    protected function mapUserToObject(array $user)
    {
        $validEmail = Arr::get($user, 'kakao_account.is_email_valid');
        $verifiedEmail = Arr::get($user, 'kakao_account.is_email_verified');

        return (new User())->setRaw($user)->map([
            'id'        => $user['id'],
            'nickname'  => Arr::get($user, 'properties.nickname'),
            'name'      => Arr::get($user, 'properties.nickname'),
            'email'     => $validEmail && $verifiedEmail ? Arr::get($user, 'kakao_account.email') : null,
            'avatar'    => Arr::get($user, 'properties.profile_image'),
        ]);
    }
}
