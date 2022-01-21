<?php

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $redirectRoute = "";

        if (session()->has('users')) {
            $redirectRoute = session()->pull('url.intended');
        } else {
            $redirectRoute = RouteServiceProvider::HOME;
            // $redirectRoute = auth()->user()->isAdmin() ? '/admin/' : '/dashboard';
        }

        return redirect()->intended($redirectRoute);
    }
}
