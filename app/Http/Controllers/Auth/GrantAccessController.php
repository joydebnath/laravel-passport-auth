<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\PasswordGrantClientFactory;
use Illuminate\Http\Request;


class GrantAccessController extends Controller
{
    public function grant(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required_if:grant_type,password|string|email',
            'password' => 'required_if:grant_type,password|string',
            'remember_me' => 'boolean',
            'device_name' => 'required|string',
            'grant_type' => 'required|string',
            'refresh_token' => 'string'
        ]);
                
        return PasswordGrantClientFactory::make($request->device_name)->get($credentials);
    }
  
    public function revoke(Request $request)
    {
        $request->user()->token()->revoke();
        return response(["message" => "Successfully signed out"], 200);
    }

}
