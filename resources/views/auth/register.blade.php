<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input
                id="username"
                class="block mt-1 w-full"
                type="text"
                name="username"
                :value="old('username')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Geboortedatum')" />
            <x-text-input
                id="birthdate"
                class="block mt-1 w-full"
                type="date"
                name="birthdate"
                :value="old('birthdate')" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <!-- Bio -->
        <div class="mt-4">
            <x-input-label for="bio" :value="__('Over mij')" />
            <textarea
                id="bio"
                name="bio"
                rows="4"
                class="block mt-1 w-full rounded-md bg-gray-800 border border-gray-700
                       text-gray-200 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
            >{{ old('bio') }}</textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <!-- Profielfoto -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Profielfoto')" />
            <input
                id="image"
                name="image"
                type="file"
                accept="image/*"
                class="block mt-1 w-full rounded-md bg-gray-800 border border-gray-700
                       text-gray-200 placeholder-gray-500
                       file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0
                       file:bg-gray-700 file:text-gray-200
                       focus:outline-none focus:border-indigo-500 focus:ring-indigo-500"
            />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900
                       dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2
                       focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
