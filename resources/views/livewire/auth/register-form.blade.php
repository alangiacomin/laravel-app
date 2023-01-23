<div @class(['register', 'text-center'])>
    <form class="w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal">{{__('auth.register')}}</h1>

        <div class="form-floating">
            <input type="text"
                   autofocus
                   @class(['form-control', 'is-invalid'=>$errors->has('first_name')])
                   id="idFirstName"
                   placeholder="{{ __('auth.fields.first_name') }}"
                   wire:model="first_name">
            <label for="idFirstName">{{ __('auth.fields.first_name') }}</label>
        </div>
        @error('first_name')
        <div @class(['error'])>{{ $message }}</div>
        @enderror

        <div class="form-floating">
            <input type="text"
                   @class(['form-control', 'is-invalid'=>$errors->has('last_name')])
                   id="idLastName"
                   placeholder="{{ __('auth.fields.last_name') }}"
                   wire:model="last_name">
            <label for="idLastName">{{ __('auth.fields.last_name') }}</label>
        </div>
        @error('last_name')
        <div @class(['error'])>{{ $message }}</div>
        @enderror

        <div class="form-floating">
            <input type="text"
                   @class(['form-control', 'is-invalid'=>$errors->has('email')])
                   id="idEmail"
                   placeholder="{{ __('auth.fields.email') }}"
                   wire:model="email">
            <label for="idEmail">{{ __('auth.fields.email') }}</label>
        </div>
        @error('email')
        <div @class(['error'])>{{ $message }}</div>
        @enderror

        <div class="form-floating">
            <input type="password"
                   @class(['form-control', 'is-invalid'=>$errors->has('password')])
                   id="idPassword"
                   placeholder="{{ __('auth.fields.password') }}"
                   wire:model="password">
            <label for="idPassword">{{ __('auth.fields.password') }}</label>
        </div>
        @error('password')
        <div @class(['error'])>{{ $message }}</div>
        @enderror

        <div class="form-floating">
            <input type="password"
                   @class(['form-control', 'is-invalid'=>$errors->has('password_confirmation')])
                   id="idPasswordConfirmation"
                   placeholder="{{ __('auth.fields.password_confirmation') }}"
                   wire:model="password_confirmation">
            <label for="idPasswordConfirmation">{{ __('auth.fields.password_confirmation') }}</label>
        </div>
        @error('password_confirmation')
        <div @class(['error'])>{{ $message }}</div>
        @enderror

        <button class="my-3 w-100 btn btn-lg btn-primary" type="button"
                wire:click="submit"
                wire:loading.attr="disabled">
            {{ __('auth.register') }}
        </button>
        <div @class(['error'])>{{ $registerStatus }}</div>
        <div>
            {{ __('auth.already_have_account') }}
            <a href="{{ route('login') }}">{{ __('auth.login')}}</a>
        </div>
    </form>
</div>
