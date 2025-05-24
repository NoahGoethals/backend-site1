@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Veelgestelde Vragen</h1>

        @forelse ($categories as $category)
            <div class="mb-10">
                <h2 class="text-xl font-semibold text-blue-400 mb-3">{{ $category->name }}</h2>

                @forelse ($category->faqs as $faq)
                    <div class="mb-4 bg-white dark:bg-gray-800 p-4 rounded shadow">
                        <h3 class="font-medium text-lg">{{ $faq->question }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $faq->answer }}</p>
                    </div>
                @empty
                    <p class="text-gray-400 italic">Geen vragen in deze categorie.</p>
                @endforelse
            </div>
        @empty
            <p class="text-gray-400">Er zijn nog geen FAQ-categorieën toegevoegd.</p>
        @endforelse
    </div>
@endsection
