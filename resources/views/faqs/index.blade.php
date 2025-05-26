<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Veelgestelde Vragen</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
  @include('layouts.navigation')

  <main class="max-w-4xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
      Veelgestelde Vragen
    </h1>

    {{-- ADMIN BEHEER BALK BOVENAAN (alleen voor admin) --}}
    @auth
      @if(auth()->user()->is_admin)
        <div class="mb-8 flex flex-wrap gap-3">
          <a href="{{ route('faqs.create') }}"
             class="px-4 py-2 rounded bg-yellow-600 text-white font-semibold hover:bg-yellow-700 transition">
            ➕ Nieuwe FAQ-vraag
          </a>
          <a href="{{ route('categories.index') }}"
             class="px-4 py-2 rounded bg-green-600 text-white font-semibold hover:bg-green-700 transition">
            📁 Categorieën beheren
          </a>
          <a href="{{ route('categories.create') }}"
             class="px-4 py-2 rounded bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
            ➕ Nieuwe categorie
          </a>
        </div>
      @endif
    @endauth

    @foreach($categories as $category)
      <section class="mb-8 bg-white dark:bg-gray-800 rounded shadow">
        <header class="px-6 py-4 flex justify-between items-center border-b dark:border-gray-700">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            {{ $category->name }}
          </h2>
          {{-- Admin actiegroep categorie --}}
          @auth
            @if(auth()->user()->is_admin)
              <div class="space-x-2 text-sm flex items-center">
                <a href="{{ route('categories.edit', $category) }}"
                   class="text-blue-500 hover:underline">Categorie bewerken</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="text-red-500 hover:underline"
                          onclick="return confirm('Weet je het zeker?')">Categorie verwijderen</button>
                </form>
                <a href="{{ route('faqs.create', ['category_id' => $category->id]) }}"
                   class="ml-2 px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                  Nieuwe vraag
                </a>
              </div>
            @endif
          @endauth
        </header>

        <div class="p-6 space-y-6">
          @if($category->faqs->isEmpty())
            <p class="text-gray-500">{{ __('Geen vragen in deze categorie.') }}</p>
          @else
            <ul class="space-y-4">
              @foreach($category->faqs as $faq)
                <li class="flex justify-between items-start bg-gray-50 dark:bg-gray-700 p-4 rounded">
                  <div>
                    <h3 class="font-bold text-gray-800 dark:text-gray-100">{{ $faq->question }}</h3>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                      {{ $faq->answer ?: '— nog niet beantwoord —' }}
                    </p>
                  </div>
                  {{-- Admin acties per FAQ --}}
                  @auth
                    @if(auth()->user()->is_admin)
                      <div class="ml-6 flex flex-col items-end space-y-1">
                        <a href="{{ route('faqs.edit', $faq) }}"
                           class="{{ $faq->answer ? 'text-blue-500' : 'text-green-600' }} font-semibold hover:underline">
                          {{ $faq->answer ? 'Bewerken' : 'Beantwoorden' }}
                        </a>
                        <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="inline">
                          @csrf @method('DELETE')
                          <button type="submit"
                                  class="text-red-500 hover:underline text-sm"
                                  onclick="return confirm('Weet je het zeker?')">
                            Verwijderen
                          </button>
                        </form>
                      </div>
                    @endif
                  @endauth
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </section>
    @endforeach
  </main>
</body>
</html>
