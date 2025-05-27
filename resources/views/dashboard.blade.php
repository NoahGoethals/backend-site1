@extends('layouts.app')

@section('content')
  <div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          {{-- Welkom --}}
          <h3 class="text-2xl font-semibold mb-6">
            Welkom terug, {{ $user->name }}
          </h3>

          {{-- Statistieken --}}
          <ul class="list-disc list-inside space-y-2 mb-8">
            <li>📰 Je hebt <strong>{{ $newsCount }}</strong> nieuwsberichten.</li>
            <li>❓ Je hebt <strong>{{ $faqCount }}</strong> FAQ-items.</li>
          </ul>

          {{-- Navigatielinks --}}
          <div class="space-y-4">
            <a href="{{ route('news.index') }}"
               class="block text-blue-500 underline hover:text-blue-600">
              ▶ Ga naar nieuws
            </a>

            <a href="{{ route('faqs.index') }}"
               class="block text-blue-500 underline hover:text-blue-600">
              ▶ Ga naar FAQ
            </a>

            <a href="{{ route('faqs.ask') }}"
               class="block text-blue-500 underline hover:text-blue-600">
              ▶ Vragen indienen
            </a>

            <a href="{{ route('chat.index') }}"
               class="block text-blue-500 underline hover:text-blue-600">
              💬 Ga naar de chat
            </a>

            @auth
              @if(auth()->user()->is_admin)
                <a href="{{ route('users.index') }}"
                   class="block text-blue-500 underline hover:text-blue-600">
                  ▶ Gebruikers beheren
                </a>
              @endif
            @endauth

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
