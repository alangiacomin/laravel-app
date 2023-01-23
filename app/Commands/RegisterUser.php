<?php

namespace App\Commands;

use Alangiacomin\LaravelBasePack\Commands\Command;

class RegisterUser extends Command
{
    public string $first_name;

    public string $last_name;

    public string $email;

    public string $password;

    public string $password_confirmation;
}
