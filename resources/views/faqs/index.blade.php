@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Veelgestelde Vragen</h1>

        @forelse ($categories as $category)
            @if ($category->faqs->count())
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-2">{{ $category->name }}</h2>

                    @foreach ($category->faqs as $faq)
                        <div class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-4">
                            <h3 class="font-semibold text-lg">{{ $faq->question }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $faq->answer }}</p>
                            <small class="text-xs text-gray-400">
                                Gepubliceerd op {{ $faq->published_at->format('d/m/Y') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif
        @empty
            <p class="text-gray-300">Er zijn nog geen FAQ-categorieën toegevoegd.</p>
        @endforelse
    </div>
@endsection
