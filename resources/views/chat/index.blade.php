@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-white">Openbare Chat</h1>

    <div class="bg-gray-800 p-4 rounded mb-4 max-h-96 overflow-y-auto">
        @forelse($messages as $message)
            <div class="mb-3">
                <span class="font-semibold text-blue-400">
                    {{ $message->user->username ?? $message->user->name }}
                </span>
                <span class="text-gray-400 text-xs">
                    ({{ $message->created_at->format('d/m/Y H:i') }})
                </span>
                <div class="text-white ml-3">{{ $message->body }}</div>
            </div>
        @empty
            <div class="text-gray-300">Er zijn nog geen berichten.</div>
        @endforelse
    </div>

    <form method="POST" action="{{ route('chat.store') }}">
        @csrf
        <textarea
            name="body"
            class="w-full rounded mb-2 p-2 border-2 border-blue-700 focus:ring-2 focus:ring-blue-400 placeholder-gray-300"
            style="background-color: #1f2937; color: #fff;"
            rows="2"
            placeholder="Typ je bericht..."
            required
        ></textarea>
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            Verstuur
        </button>
    </form>
</div>
@endsection
