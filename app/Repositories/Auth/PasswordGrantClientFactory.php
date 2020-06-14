<?php

namespace App\Repositories\Auth;

use Illuminate\Http\Request;

class PasswordGrantClientFactory
{
    public static function make($deviceName): PasswordGrantClient
    {
        if (strcasecmp($deviceName,'android') == 0) {
            return new AndroidClient;
        } elseif (strcasecmp($deviceName,'ios') == 0) {
            return new IOSClient;
        }

        return new LaravelClient;
    }
}

abstract class PasswordGrantClient
{
    abstract public function get($credentials);
    
    function makeRequest($credentials){
        $request = Request::create('oauth/token', 'POST', $credentials, [], [], [
            'HTTP_Accept' => 'application/json',
        ]);
        $response = app()->handle($request);
        $decodedResponse = json_decode($response->getContent(), true);
        
        if ($response->getStatusCode() != 200) {
            return response(['error' => 'Incorrect username or password','content'=>$response->getContent(),'req'=>$credentials], $response->getStatusCode());
        }
    
        return $decodedResponse;
    }
}

class LaravelClient extends PasswordGrantClient
{
    public function get($credentials)
    {
        $credentials['client_id'] = config('utils.web_password_grant_client.id');
        $credentials['client_secret'] = config('utils.web_password_grant_client.secret');
        return $this->makeRequest($credentials);
    }
}

class AndroidClient extends PasswordGrantClient
{
    public function get($credentials)
    {
        $credentials['client_id'] = config('utils.web_password_grant_client.id');
        $credentials['client_secret'] = config('utils.web_password_grant_client.secret');
        return $this->makeRequest($credentials);
    }
}

class IOSClient extends PasswordGrantClient
{
    public function get($credentials)
    {
        $credentials['client_id'] = config('utils.web_password_grant_client.id');
        $credentials['client_secret'] = config('utils.web_password_grant_client.secret');
        return $this->makeRequest($credentials);
    }
}
