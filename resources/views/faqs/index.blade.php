<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Veelgestelde Vragen</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
  @include('layouts.navigation')

  <main class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
      Veelgestelde Vragen
    </h1>

    @foreach($categories as $cat)
      <section class="mb-8 bg-white dark:bg-gray-800 rounded shadow">
        <header class="px-6 py-4 flex justify-between items-center border-b dark:border-gray-700">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ $cat->name }}
          </h2>

          @auth @can('admin')
            <div class="space-x-2 text-sm">
              <a href="{{ route('categories.edit',$cat) }}"
                 class="text-blue-500 hover:underline">Bewerken</a>
              <form action="{{ route('categories.destroy',$cat) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline"
                        onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
              </form>
              <a href="{{ route('faqs.create',['category_id'=>$cat->id]) }}"
                 class="ml-4 px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                Nieuwe vraag
              </a>
            </div>
          @endcan @endauth
        </header>

        <div class="p-6 space-y-4">
          @forelse($cat->faqs as $faq)
            <article class="bg-gray-50 dark:bg-gray-700 p-4 rounded">
              <h3 class="font-bold text-gray-800 dark:text-gray-100">{{ $faq->question }}</h3>
              <p class="mt-1 text-gray-700 dark:text-gray-300">{{ $faq->answer }}</p>
              @auth @can('admin')
                <div class="mt-2 space-x-2 text-sm">
                  <a href="{{ route('faqs.edit',$faq) }}" class="text-blue-500 hover:underline">Bewerken</a>
                  <form action="{{ route('faqs.destroy',$faq) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline"
                            onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
                  </form>
                </div>
              @endcan @endauth
            </article>
          @empty
            <p class="text-gray-500">{{ __('Geen vragen in deze categorie.') }}</p>
          @endforelse
        </div>
      </section>
    @endforeach
  </main>
</body>
</html>
