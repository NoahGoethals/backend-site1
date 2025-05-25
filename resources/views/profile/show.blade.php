@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 text-white">
    <div class="bg-gray-900 rounded-lg shadow p-6">
        <div class="flex items-center space-x-4">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" class="w-24 h-24 rounded-full object-cover" alt="Profielfoto">
            @else
                <div class="w-24 h-24 bg-gray-700 rounded-full flex items-center justify-center text-xl">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif

            <div>
                <h2 class="text-2xl font-bold">{{ $user->username ?? $user->name }}</h2>
                @if ($user->birthdate)
                    <p class="text-sm text-gray-400">Verjaardag: {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</p>
                @endif
            </div>
        </div>

        @if ($user->bio)
            <div class="mt-6">
                <h3 class="font-semibold mb-1">Over mij:</h3>
                <p class="text-gray-300">{{ $user->bio }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
