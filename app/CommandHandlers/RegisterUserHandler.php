<?php
/** @noinspection PhpUnused */

namespace App\CommandHandlers;

use Alangiacomin\LaravelBasePack\CommandHandlers\CommandHandler;
use App\Commands\RegisterUser;
use App\Exceptions\AuthException;
use App\Http\ValidatorRules;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUserHandler extends CommandHandler
{
    /**
     * The command
     *
     * @return  void
     */
    public RegisterUser $command;

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
            'first_name' => $this->command->first_name,
            'last_name' => $this->command->last_name,
            'email' => $this->command->email,
            'password' => $this->command->password,
            'password_confirmation' => $this->command->password_confirmation,
        ];

        $validator = Validator::make($credentials, ValidatorRules::$register);

        if ($validator->fails())
        {
            throw new AuthException(__('auth.password'));
        }

        $createdUser = User::create(
            [
                'first_name' => $this->command->first_name,
                'last_name' => $this->command->last_name,
                'email' => $this->command->email,
                'password' => Hash::make($this->command->password),
            ]
        );

        if ($createdUser == null)
        {
            throw new AuthException(__('auth.failed'));
        }

        event(new Registered($createdUser));

        Auth::login($createdUser);
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
