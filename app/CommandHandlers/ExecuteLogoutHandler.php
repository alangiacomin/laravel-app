<?php
/** @noinspection PhpUnused */

namespace App\CommandHandlers;

use Alangiacomin\LaravelBasePack\CommandHandlers\CommandHandler;
use App\Commands\ExecuteLogout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExecuteLogoutHandler extends CommandHandler
{
    /**
     * The command
     *
     * @return  void
     */
    public ExecuteLogout $command;

    /**
     * Execute the command
     *
     * @return  void
     */
    public function execute(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }
}
