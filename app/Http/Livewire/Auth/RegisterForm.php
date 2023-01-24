<?php

namespace App\Http\Livewire\Auth;

use App\Commands\RegisterUser;
use App\Http\Livewire\Core\Component;
use App\Http\ValidatorRules;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class RegisterForm extends Component
{
    public string $first_name;

    public string $last_name;

    public string $email;

    public string $password;

    public string $password_confirmation;

    public string $registerStatus;

    public function submit(): Redirector|RedirectResponse|null
    {
        $this->validate();

        $ret = $this->execute(
            new RegisterUser(
                [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => $this->password,
                    'password_confirmation' => $this->password_confirmation,
                ]
            )
        );

        if ($ret->success)
        {
            $this->registerStatus = "";

            return redirect()->intended(route('home'));
        }
        else
        {
            $this->registerStatus = implode('. ', $ret->errors);
        }

        return null;
    }

    protected function rules(): array
    {
        return ValidatorRules::$register;
    }
}
