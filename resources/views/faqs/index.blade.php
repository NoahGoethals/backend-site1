@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Veelgestelde Vragen</h1>

            @forelse ($categories as $category)
                @if ($category->faqs->count())
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $category->name }}</h2>

                        @foreach ($category->faqs as $faq)
                            <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-4 rounded mb-4 shadow">
                                <h3 class="font-semibold text-lg">{{ $faq->question }}</h3>
                                <p class="mt-2 text-sm text-gray-800 dark:text-gray-300">{{ $faq->answer }}</p>
                                <small class="block mt-2 text-xs text-gray-500 dark:text-gray-400">
                                    Gepubliceerd op {{ \Carbon\Carbon::parse($faq->published_at)->format('d/m/Y') }}
                                </small>
                            </div>
                        @endforeach
                    </div>
                @endif
            @empty
                <p class="text-gray-500 dark:text-gray-300">Er zijn nog geen FAQ-categorieën toegevoegd.</p>
            @endforelse
        </div>
    </div>
@endsection
