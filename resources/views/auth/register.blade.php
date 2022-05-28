<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}
        <div class="my-4 flex justify-center space-x-2 rounded text-center w-full">
            <a href="{{ route('auth.google') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Register with Google
            </a>

            <a href="{{ route('auth.github') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Register with Github
            </a>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
                @error('name')
                <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                @error('email')
                <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"  />
                @error('username')
                <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                @error('password')

                <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                @enderror
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  />
            </div>
                <div class="mt-4">
                    <x-label for="recaptcha" :value="__('Google Recaptcha')" />
                    <div class="mt-1 w-full">
                    @recaptcha
                    </div>
                    @error('g-recaptcha-response')
                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                    @enderror

                </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
