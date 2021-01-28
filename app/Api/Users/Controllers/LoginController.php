<?php


namespace App\Api\Users\Controllers;


use Freelabois\LaravelQuickstart\Exceptions\BadCredentials;
use Freelabois\LaravelQuickstart\Exceptions\MissingCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LoginController
{

    public function login(Request $request)
    {
        $http = new Client();
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ],
            ]);
            return $response->getBody();
        } catch (BadResponseException $e) {
            switch ($e->getCode()) {
                case 400:
                    throw new MissingCredentials(Lang::get('auth.failed'), $e->getCode());
                case 401:
                    throw new BadCredentials(Lang::get('auth.failed'), $e->getCode());
                default:
                    throw $e;
            }
        }
        return;
    }

    public function logout()
    {
        return response()->json('', 200);
    }
}
