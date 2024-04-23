<x-guest-layout>
    <x-slot name="title"> Login </x-slot>
    <x-slot name="heading"> Login To Sudes </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group custom">
            <x-text-input
                id="email"
                name="email"
                :value="old('email')"
                type="text"
                class="form-control form-control-lg"
                placeholder="Email Address"
                required autofocus autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="icon-copy dw dw-user1"></i
                ></span>
            </div>
        </div>

        <div class="input-group custom">
            <x-text-input
                id="password"
                name="password"
                type="password"
                class="form-control form-control-lg"
                placeholder="**********"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="dw dw-padlock1"></i
                ></span>
            </div>
        </div>
        <div class="row pb-30">
            <div class="col-6">
                <div class="custom-control custom-checkbox">
                    <input
                        type="checkbox"
                        class="custom-control-input"
                        id="customCheck1"
                    />
                    <label class="custom-control-label" for="customCheck1"
                        >{{ __('Remember me') }}</label
                    >
                </div>
            </div>
            <div class="col-6">
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-0">
                    <!--
                    use code for form submit
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                -->
                    <x-primary-button
                        class="btn btn-primary btn-lg btn-block"
                        >{{ __('Log in') }}</x-primary-button>
                </div>
                <div
                    class="font-16 weight-600 pt-10 pb-10 text-center"
                    data-color="#707373"
                >
                    OR
                </div>
                <div class="input-group mb-0">
                    <a
                        class="btn btn-outline-primary btn-lg btn-block"
                        href="{{ route('register') }}"
                        >Register To Create Account</a
                    >
                </div>
            </div>
        </div>
    </form>

</x-guest-layout>
