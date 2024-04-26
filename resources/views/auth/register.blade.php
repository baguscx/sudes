<x-guest-layout>
    <x-slot name="title"> Register </x-slot>
    <x-slot name="heading"> Register To Sudes </x-slot>
    <form class="tab-wizard2 wizard-circle wizard" method="POST" action="{{ route('register') }}">
    @csrf
        <div class="form-wrap max-width-600 mx-auto">

            {{-- Name --}}
            <div class="form-group row">
                <x-input-label for="name" class="col-sm-4 col-form-label"
                    >Fullname*</x-input-label
                >
                <div class="col-sm-8">
                    <x-text-input
                    id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    :value="old('fullname')"
                    required
                    autofocus
                    autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group row">
                <x-input-label for="email" class="col-sm-4 col-form-label">Email*</x-input-label>
                <div id="email" class="col-sm-8">
                    <x-text-input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            {{-- Password --}}
            <div class="form-group row">
                <x-input-label for="password" class="col-sm-4 col-form-label">Password*</x-input-label>
                <div class="col-sm-8">
                    <x-text-input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            {{-- Confirm Password --}}
            <div class="form-group row">
                <x-input-label for="password_confirmation" class="col-sm-4 col-form-label"
                    >Confirm Password*</x-input-label
                >
                <div class="col-sm-8">
                    <x-text-input
                    id="password_confirmation"
                    type="password"
                    class="form-control"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <x-button.primary-button class="btn btn-primary">
                {{ __('Register') }}
            </x-button.primary-button>

            <div class="mt-3">
                <a class="" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </form>

</x-guest-layout>
