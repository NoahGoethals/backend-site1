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

    @foreach($categories as $category)
      <section class="mb-8 bg-white dark:bg-gray-800 rounded shadow">
        <header class="px-6 py-4 flex justify-between items-center border-b dark:border-gray-700">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            {{ $category->name }}
          </h2>

          @auth @can('admin')
            <div class="space-x-2 text-sm">
              <a href="{{ route('categories.edit',$category) }}"
                 class="text-blue-500 hover:underline">Bewerken</a>
              <form action="{{ route('categories.destroy',$category) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline"
                        onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
              </form>
              <a href="{{ route('faqs.create',['category_id'=>$category->id]) }}"
                 class="ml-4 px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                Nieuwe vraag
              </a>
            </div>
          @endcan @endauth
        </header>

        <div class="p-6 space-y-6">
          @if($category->faqs->isEmpty())
            <p class="text-gray-500">{{ __('Geen vragen in deze categorie.') }}</p>
          @else
            @foreach($category->faqs as $faq)
              <article class="bg-gray-50 dark:bg-gray-700 p-4 rounded">
                <h3 class="font-bold text-gray-800 dark:text-gray-100">{{ $faq->question }}</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                  {{ $faq->answer ?: '— nog niet beantwoord —' }}
                </p>
                @auth @can('admin')
                  <div class="mt-4 flex space-x-4 text-sm">
                    @if(!$faq->answer)
                      <a href="{{ route('faqs.edit', $faq) }}"
                         class="text-green-500 hover:underline">
                        Beantwoorden
                      </a>
                    @else
                      <a href="{{ route('faqs.edit', $faq) }}"
                         class="text-blue-500 hover:underline">
                        Bewerken
                      </a>
                    @endif
                    <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="inline">
                      @csrf @method('DELETE')
                      <button type="submit"
                              class="text-red-500 hover:underline"
                              onclick="return confirm('Weet je het zeker?')">
                        Verwijderen
                      </button>
                    </form>
                  </div>
                @endcan @endauth
              </article>
            @endforeach
          @endif
        </div>
      </section>
    @endforeach
  </main>
</body>
</html>
