@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Nieuwe gebruiker toevoegen</h1>

    <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">
                Naam
            </label>
            <input type="text" id="name" name="name" required
                   class="block w-full rounded mt-1 border-gray-300 dark:border-gray-700
                          bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                   value="{{ old('name') }}">
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                E-mail
            </label>
            <input type="email" id="email" name="email" required
                   class="block w-full rounded mt-1 border-gray-300 dark:border-gray-700
                          bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                   value="{{ old('email') }}">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">
                Wachtwoord
            </label>
            <input type="password" id="password" name="password" required
                   class="block w-full rounded mt-1 border-gray-300 dark:border-gray-700
                          bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-900 dark:text-white">
                Herhaal wachtwoord
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="block w-full rounded mt-1 border-gray-300 dark:border-gray-700
                          bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Gebruiker toevoegen
            </button>
        </div>
    </form>
</div>
@endsection
