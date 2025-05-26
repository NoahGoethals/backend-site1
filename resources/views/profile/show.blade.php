@extends('layouts.app')

@section('content')
    {{-- Container vlak onder de header --}}
    <div class="pt-8 pb-12 bg-gray-100 dark:bg-gray-900 min-h-[calc(100vh-4rem)]">
        <div class="max-w-xl mx-auto px-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8 text-center">
                
                {{-- Profielfoto --}}
                @if ($user->profile_photo_path)
                    <img 
                        src="{{ asset('storage/' . $user->profile_photo_path) }}" 
                        alt="Profielfoto van {{ $user->username ?? $user->name }}" 
                        class="w-32 h-32 rounded-full object-cover border mx-auto mb-4"
                    >
                @endif

                {{-- Naam --}}
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                    {{ $user->username ?? $user->name }}
                </h1>

                {{-- Bio --}}
                @if ($user->bio)
                    <p class="text-gray-700 dark:text-gray-300 mb-3">
                        <span class="font-semibold">Over mij:</span> {{ $user->bio }}
                    </p>
                @endif

                {{-- Geboortedatum --}}
                @if ($user->birthdate)
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        🎂 Geboortedatum: {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection
