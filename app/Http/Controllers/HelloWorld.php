<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    public function user(Request $request)
    {
        return [
            'user'=>$request->user(),
            'device'=>$request->header('User-Agent')
        ];
    }

    public function users()
    {
        return \App\User::take(10)->get();
    }
}
