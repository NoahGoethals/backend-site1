@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-2 text-white">Contacteer ons</h1>
    <div class="mb-6 text-gray-300">
        Website owner: <span class="font-semibold text-blue-400">superadmin@ehb.be</span>
    </div>
    @if(session('success'))
    <div class="mb-4 text-white">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
        @csrf
        <input
            type="email"
            name="email"
            placeholder="Jouw e-mail"
            value="{{ old('email') }}"
            class="w-full rounded mb-2 p-2 border-2 border-blue-700 focus:ring-2 focus:ring-blue-400 placeholder-gray-300"
            style="background-color: #1f2937; color: #fff;"
            required
        >
        <textarea
            name="message"
            rows="5"
            placeholder="Je bericht..."
            class="w-full rounded mb-2 p-2 border-2 border-blue-700 focus:ring-2 focus:ring-blue-400 placeholder-gray-300"
            style="background-color: #1f2937; color: #fff;"
            required
        >{{ old('message') }}</textarea>
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Verstuur
        </button>
    </form>
</div>
@endsection
