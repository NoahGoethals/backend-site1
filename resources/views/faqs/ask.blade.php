<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Stel een vraag</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
  @include('layouts.navigation')

  <main class="max-w-lg mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
      Stel een vraag
    </h1>

    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-900 rounded">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('faqs.submit') }}" class="space-y-6">
      @csrf

      <div>
        <label for="question" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          Je vraag
        </label>
        <input id="question" name="question" type="text"
               value="{{ old('question') }}"
               required
               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:ring-indigo-500 focus:border-indigo-500" />
        @error('question')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          Kies categorie
        </label>
        <select id="category_id" name="category_id" required
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">— selecteer —</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
              {{ old('category_id') == $cat->id ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
        @error('category_id')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500">
          Verstuur vraag
        </button>
      </div>
    </form>
  </main>
</body>
</html>
