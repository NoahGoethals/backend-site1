<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Categorieën</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
  @include('layouts.navigation')

  <main class="mt-6 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
      Categorieën beheer
    </h1>

    <a href="{{ route('categories.create') }}"
       class="inline-block mb-6 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">
      + Nieuwe categorie
    </a>

    <div class="space-y-4">
      @foreach($categories as $category)
        <div class="flex justify-between items-center bg-white dark:bg-gray-800 p-4 rounded shadow">
          <span class="text-gray-900 dark:text-gray-100">{{ $category->name }}</span>
          <div class="space-x-3 text-sm">
            <a href="{{ route('faqs.index', ['category_id' => $category->id]) }}"
               class="text-indigo-600 hover:underline">
              Bekijk FAQ’s
            </a>
            <a href="{{ route('categories.edit', $category) }}"
               class="text-blue-500 hover:underline">
              Bewerken
            </a>
            <form action="{{ route('categories.destroy', $category) }}"
                  method="POST" class="inline">
              @csrf @method('DELETE')
              <button type="submit"
                      class="text-red-500 hover:underline"
                      onclick="return confirm('Weet je het zeker?')">
                Verwijderen
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </main>
</body>
</html>
