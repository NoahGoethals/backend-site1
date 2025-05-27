@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-white">Contactberichten</h1>
    @forelse($messages as $msg)
        <div class="bg-gray-800 rounded p-4 mb-4">
            <div class="mb-2">
                <span class="font-bold text-blue-400">{{ $msg->name }}</span>
                <span class="text-gray-400 text-xs">({{ $msg->email }})</span>
                <span class="text-gray-400 text-xs float-right">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="text-white">{{ $msg->message }}</div>
        </div>
    @empty
        <div class="text-gray-300">Geen berichten gevonden.</div>
    @endforelse
</div>
@endsection
