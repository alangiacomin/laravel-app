<?php

namespace App\Http;

class ValidatorRules
{
    public static array $login = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public static array $register = [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'confirmed'],
    ];
}
