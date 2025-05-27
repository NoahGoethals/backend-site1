@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-white">Contacteer ons</h1>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-700 text-white">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
        @csrf
        <div>
            <label for="naam" class="block text-white">Naam</label>
            <input type="text" name="naam" id="naam" required class="block w-full mt-1 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label for="email" class="block text-white">E-mail</label>
            <input type="email" name="email" id="email" required class="block w-full mt-1 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label for="bericht" class="block text-white">Bericht</label>
            <textarea name="bericht" id="bericht" rows="5" required class="block w-full mt-1 rounded bg-gray-700 text-white"></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Verstuur
            </button>
        </div>
    </form>
</div>
@endsection
