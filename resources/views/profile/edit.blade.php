{{-- resources/views/profile/edit.blade.php --}}
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
          {{ __('View your profile information.') }}
        </p>

        {{-- Profielfoto --}}
        <div class="flex items-center mb-4">
          @if($user->image)
            <img
              src="{{ asset('storage/' . $user->image) }}"
              alt="{{ $user->name }}’s profielfoto"
              class="w-16 h-16 rounded-full object-cover border"
            />
          @else
            <img
              src="{{ asset('images/default-avatar.png') }}"
              alt="Standaard profielfoto"
              class="w-16 h-16 rounded-full object-cover border"
            />
          @endif
        </div>

        {{-- Formulier (alleen lezen) --}}
        <form class="space-y-4" onsubmit="return false;">
          {{-- Naam --}}
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Name') }}
            </label>
            <input id="name" name="name" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200"
                   value="{{ $user->name }}"
                   readonly />
          </div>

          {{-- Username --}}
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Username') }}
            </label>
            <input id="username" name="username" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200"
                   value="{{ $user->username }}"
                   readonly />
          </div>

          {{-- Email --}}
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Email') }}
            </label>
            <input id="email" name="email" type="email"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200"
                   value="{{ $user->email }}"
                   readonly />
          </div>

          {{-- Geboortedatum --}}
          <div>
            <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Birthdate') }}
            </label>
            <input id="birthdate" name="birthdate" type="date"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200"
                   value="{{ $user->birthdate }}"
                   readonly />
          </div>

          {{-- Bio --}}
          <div>
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Bio') }}
            </label>
            <textarea id="bio" name="bio" rows="3"
                      class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200"
                      readonly>{{ $user->bio }}</textarea>
          </div>

          <div class="flex justify-end mt-6">
            <a href="{{ route('profile.public', ['user' => $user->id]) }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Bekijk openbaar profiel
            </a>
          </div>

        </form>
      </div>
    </div>
  </section>

</body>
</html>
