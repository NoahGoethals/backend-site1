@extends('layouts.app')

{{-- Debug output --}}
@dump($categories)

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Veelgestelde Vragen</h1>

        @foreach ($categories as $category)
            <h2 class="text-xl text-white font-semibold mb-2">{{ $category->name }}</h2>

            @if ($category->faqs->isEmpty())
                <p class="text-gray-400 mb-4">Geen vragen in deze categorie.</p>
            @else
                @foreach ($category->faqs as $faq)
                    <div class="bg-gray-800 p-4 rounded mb-4 shadow">
                        <h3 class="text-white font-bold text-lg">{{ $faq->question }}</h3>
                        <p class="text-gray-300 mt-1">{{ $faq->answer }}</p>
                        <p class="text-sm text-gray-500 mt-2">
                            Gepubliceerd op {{ \Carbon\Carbon::parse($faq->published_at)->format('d/m/Y') }}
                        </p>
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
@endsection
