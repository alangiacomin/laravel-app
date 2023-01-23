<?php
/** @noinspection PhpUnused */

namespace App\CommandHandlers;

use Alangiacomin\LaravelBasePack\CommandHandlers\CommandHandler;
use App\Commands\EseguiLogin;
use App\Exceptions\AuthException;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EseguiLoginHandler extends CommandHandler
{
    /**
     * The command
     *
     * @return  void
     */
    public EseguiLogin $command;

    /**
     * Internal working prop
     *
     * @var Authenticatable
     */
    private Authenticatable $user;

    /**
     * Execute the command
     *
     * @return  void
     * @throws AuthException
     */
    public function execute(): void
    {
        $credentials = [
            'email' => $this->command->email,
            'password' => $this->command->password,
        ];

        $validator = Validator::make(
            $credentials, [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );

        if ($validator->fails())
        {
            throw new AuthException(__('auth.password'));
        }

        if (!Auth::attempt($credentials))
        {
            throw new AuthException(__('auth.failed'));
        }

        $this->user = User::withPermissions(Auth::user());
    }

    /**
     * Command response
     *
     * @return Authenticatable
     */
    public function getResponse(): Authenticatable
    {
        return $this->user;
    }
}
