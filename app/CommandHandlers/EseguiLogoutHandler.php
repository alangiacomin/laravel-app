<?php
/** @noinspection PhpUnused */

namespace App\CommandHandlers;

use Alangiacomin\LaravelBasePack\CommandHandlers\CommandHandler;
use App\Commands\EseguiLogout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EseguiLogoutHandler extends CommandHandler
{
    /**
     * The command
     *
     * @return  void
     */
    public EseguiLogout $command;

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
