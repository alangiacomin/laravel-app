<?php

namespace App\Commands;

use Alangiacomin\LaravelBasePack\Commands\Command;

class ExecuteLogin extends Command
{
    /**
     * Email
     *
     * @var string
     */
    public string $email = '';

    /**
     * Password
     *
     * @var string
     */
    public string $password = '';
}
