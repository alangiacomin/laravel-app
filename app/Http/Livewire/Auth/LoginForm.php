<?php

namespace App\Http\Livewire\Auth;

use App\Commands\ExecuteLogin;
use App\Http\Livewire\Core\Component;
use App\Http\ValidatorRules;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class LoginForm extends Component
{
    public string $email;

    public string $password;

    public $loginStatus;

    public function submit(): Redirector|RedirectResponse|null
    {
        $this->validate();

        $ret = $this->execute(
            new ExecuteLogin(
                [
                    'email' => $this->email,
                    'password' => $this->password,
                ]
            )
        );

        if ($ret->success)
        {
            $this->loginStatus = "";

            return redirect()->intended(route('home'));
        }
        else
        {
            $this->loginStatus = implode('. ', $ret->errors);
        }

        return null;
    }

    protected function rules(): array
    {
        return ValidatorRules::$login;
    }
}
