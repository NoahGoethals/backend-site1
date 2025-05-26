{{-- resources/views/profile.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

  {{-- Navigatie --}}
  @include('layouts.navigation')

  {{-- Direct na navigatie, klein top-margintje --}}
  <section class="mt-4 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
      <div class="p-6">

        {{-- Header --}}
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
          {{ __('Profile') }}
        </h1>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
          {{ __('View and update your profile information.') }}
        </p>

        {{-- Formulier --}}
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
          @csrf @method('PATCH')

          {{-- Profielfoto --}}
          <div class="flex items-center mb-4">
            <img src="{{ $user->image_url ?? asset('default-avatar.png') }}"
                 alt="{{ __('Profile Image') }}"
                 class="w-16 h-16 rounded-full object-cover border" />
          </div>

          {{-- Naam --}}
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Name') }}
            </label>
            <input id="name" name="name" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                   value="{{ old('name',$user->name) }}"
                   required autocomplete="name" />
            @error('name')
              <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

          {{-- Username --}}
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Username') }}
            </label>
            <input id="username" name="username" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                   value="{{ old('username',$user->username) }}"
                   required autocomplete="username" />
            @error('username')
              <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

          {{-- Email --}}
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Email') }}
            </label>
            <input id="email" name="email" type="email"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                   value="{{ old('email',$user->email) }}"
                   required autocomplete="email" />
            @error('email')
              <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror

            @if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
              <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification" class="underline text-indigo-600 dark:text-indigo-400 ml-2">
                  {{ __('Re-send verification email') }}
                </button>
              </p>
            @endif
          </div>

          {{-- Hidden verify-form --}}
          <form id="send-verification" method="POST" action="{{ route('verification.send') }}">@csrf</form>

          {{-- Geboortedatum --}}
          <div>
            <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Birthdate') }}
            </label>
            <input id="birthdate" name="birthdate" type="date"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                   value="{{ old('birthdate',$user->birthdate) }}" />
            @error('birthdate')
              <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

          {{-- Bio --}}
          <div>
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Bio') }}
            </label>
            <textarea id="bio" name="bio" rows="3"
                      class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-200">{{ old('bio',$user->bio) }}</textarea>
            @error('bio')
              <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

        </form>
      </div>
    </div>
  </section>

</body>
</html>
