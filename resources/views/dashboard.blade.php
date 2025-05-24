@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Welkom terug, {{ $user->name }}</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>📰 Je hebt <strong>{{ $newsCount }}</strong> nieuwsberichten.</li>
                        <li>❓ Je hebt <strong>{{ $faqCount }}</strong> FAQ-items.</li>
                    </ul>

                    <div class="mt-6">
                        <a href="{{ route('news.index') }}" class="text-blue-400 underline">➤ Ga naar nieuws</a><br>
                        <a href="{{ route('faqs.index') }}" class="text-blue-400 underline">➤ Ga naar FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
