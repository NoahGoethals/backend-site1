@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-white">{{ $user->username ?? $user->name }}</h1>

    @if ($user->bio)
        <p class="text-white mt-2">{{ $user->bio }}</p>
    @endif

    @if ($user->birthdate)
        <p class="text-gray-400 mt-1 text-sm">🎂 Geboren op {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</p>
    @endif

    @if ($user->profile_photo_path)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profielfoto" class="w-32 h-32 object-cover rounded-full border">
        </div>
    @endif
</div>
@endsection
