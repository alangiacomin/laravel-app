<?php

namespace App\Http\Controllers;

use Alangiacomin\LaravelBasePack\Controllers\Controller;
use App\Commands\ExecuteLogout;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected array $cfgMiddleware = [
        'login' => ['guest'],
        'register' => ['guest'],
        'verificationNotice' => ['auth'],
        'verificationVerify' => ['auth', 'signed', 'throttle:6,1'],
        'verificationSend' => ['auth', 'throttle:6,1'],
    ];

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        if (Auth::user())
        {
            $ret = $this->execute(new ExecuteLogout());
            if ($ret->success)
            {
                return redirect()->route('home');
            }
        }

        return redirect()->route('home');
    }

    public function verificationNotice()
    {
        if (Auth::user() && Auth::user()->hasVerifiedEmail())
        {
            return redirect()->intended(route('home'));
        }

        return view('errors.unverified');
    }

    public function verificationVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }

    public function verificationSend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
