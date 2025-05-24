@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Veelgestelde Vragen</h1>

    @forelse($categories as $category)
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">{{ $category->name }}</h2>

        @foreach($category->faqs as $faq)
            <div class="mb-6 bg-white dark:bg-gray-800 p-4 rounded shadow">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">{{ $faq->question }}</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $faq->answer }}</p>
                <small class="text-xs text-gray-500 dark:text-gray-400">
                    Gepubliceerd op {{ \Carbon\Carbon::parse($faq->published_at)->format('d/m/Y') }}
                </small>
            </div>
        @endforeach

    @empty
        <p class="text-gray-500 dark:text-gray-400">Er zijn nog geen FAQ-categorieën toegevoegd.</p>
    @endforelse
</div>
@endsection
