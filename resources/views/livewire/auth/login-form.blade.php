<div @class(['login','text-center'])>
    <form class="w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal">{{ __('auth.sign_in') }}</h1>
        <div class="form-floating">
            <input type="email"
                   autofocus
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
        <!--<div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>-->
        <button class="my-3 w-100 btn btn-lg btn-primary" type="button"
                wire:click="submit"
                wire:loading.attr="disabled">
            {{ __('auth.sign_in') }}
        </button>
        <p @class(['error'])>{{ $loginStatus }}</p>
        <p>
            {{ __('auth.dont_have_account') }}
            <a href="{{ route('register') }}">{{ __('auth.register')}}</a>
        </p>
    </form>
</div>
