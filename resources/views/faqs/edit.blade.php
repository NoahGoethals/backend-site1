{{-- resources/views/faqs/edit.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>FAQ bewerken / beantwoorden</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
  @include('layouts.navigation')

  <main class="max-w-2xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
      FAQ bewerken / beantwoorden
    </h1>

    {{-- Feedback --}}
    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-900 rounded dark:bg-green-800 dark:text-white shadow">
        {{ session('success') }}
      </div>
    @endif

    {{-- Validatiefouten --}}
    @if($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-900 rounded dark:bg-red-800 dark:text-white shadow">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('faqs.update', $faq->id) }}" class="space-y-6">
      @csrf
      @method('PATCH')

      {{-- Vraag --}}
      <div>
        <label for="question" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
          Vraag
        </label>
        <input id="question" name="question" type="text"
               value="{{ old('question', $faq->question) }}"
               required
               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:ring-indigo-500 focus:border-indigo-500" />
      </div>

      {{-- Antwoord --}}
      <div>
        <label for="answer" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
          Antwoord
        </label>
        <textarea id="answer" name="answer" rows="4"
                  required
                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                         bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                         focus:ring-indigo-500 focus:border-indigo-500">{{ old('answer', $faq->answer) }}</textarea>
      </div>

      {{-- Categorie --}}
      <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
          Categorie
        </label>
        <select id="category_id" name="category_id" required
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:ring-indigo-500 focus:border-indigo-500">
          @foreach($categories as $category)
            <option value="{{ $category->id }}"
              {{ old('category_id', $faq->category_id) == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex justify-between items-center mt-6">
        <a href="{{ route('faqs.index') }}"
           class="text-blue-500 hover:underline">
          &larr; Terug naar FAQ overzicht
        </a>
        <button type="submit"
                class="px-5 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500">
          Opslaan
        </button>
      </div>
    </form>
  </main>
</body>
</html>
