{{-- resources/views/profile/show.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bewerk Profiel</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
  @include('layouts.navigation')

  <section class="mt-4 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
      <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
          {{ __('Profiel bewerken') }}
        </h1>

        <form method="POST"
              action="{{ route('profile.update') }}"
              enctype="multipart/form-data"
              class="space-y-6">
          @csrf
          @method('PATCH')

          {{-- Profielfoto --}}
<div>
  <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
    {{ __('Profielfoto') }}
  </label>
  <input 
    id="image"
    name="image"
    type="file"
    accept="image/*"
    class="mt-1 block w-full
           text-sm text-gray-700 dark:text-gray-200
           file:mr-4 file:py-2 file:px-4
           file:rounded-lg file:border-0
           file:bg-indigo-600 file:text-white
           file:font-medium
           hover:file:bg-indigo-500
           focus:outline-none focus:ring-2 focus:ring-indigo-500"
  />
  @error('image')
    <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
  @enderror
</div>


          {{-- Naam --}}
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Name') }}
            </label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}"
                   required
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                          focus:ring-indigo-500 focus:border-indigo-500" />
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          {{-- Username --}}
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Username') }}
            </label>
            <input id="username" name="username" type="text"
                   value="{{ old('username', $user->username) }}"
                   required
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                          focus:ring-indigo-500 focus:border-indigo-500" />
            @error('username') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          {{-- Email --}}
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Email') }}
            </label>
            <input id="email" name="email" type="email"
                   value="{{ old('email', $user->email) }}"
                   required
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                          focus:ring-indigo-500 focus:border-indigo-500" />
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          {{-- Birthdate --}}
          <div>
            <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Birthdate') }}
            </label>
            <input id="birthdate" name="birthdate" type="date"
                   value="{{ old('birthdate', $user->birthdate) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                          focus:ring-indigo-500 focus:border-indigo-500" />
            @error('birthdate') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          {{-- Bio --}}
          <div>
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              {{ __('Bio') }}
            </label>
            <textarea id="bio" name="bio" rows="4"
                      class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                             bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                             focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          {{-- Submit --}}
          <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500">
              {{ __('Opslaan') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
