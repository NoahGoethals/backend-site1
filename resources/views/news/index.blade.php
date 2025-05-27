@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold mb-4">Nieuws Overzicht</h1>

                    @if(session('success'))
                        <div class="mb-4 text-green-600 font-bold">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Alleen admins mogen nieuwsberichten aanmaken --}}
                    @if(auth()->user()?->is_admin)
                        <a href="{{ route('news.create') }}" class="text-blue-400 font-bold">
                            &#43; Nieuw nieuwsbericht
                        </a>
                    @endif

                    <div class="mt-4">
                        @forelse($news as $bericht)
                        <div class="mb-6 border-b border-gray-600 pb-3">
    <div class="font-bold text-lg">{{ $bericht->title }}</div>
    <div class="mb-1">{{ $bericht->content }}</div>
    <div class="text-sm text-gray-400 mb-2">
        Geplaatst op: 
        {{ $bericht->published_at ? \Carbon\Carbon::parse($bericht->published_at)->format('d/m/Y') : 'Onbekend' }}
    </div>
    {{-- SHOW-knop: voor iedereen zichtbaar --}}
    <a href="{{ route('news.show', $bericht) }}" class="text-indigo-400 mr-4">
        <span>🔎</span> Bekijk
    </a>
    {{-- Alleen admins mogen bewerken/verwijderen --}}
    @if(auth()->user()?->is_admin)
        <a href="{{ route('news.edit', $bericht) }}" class="text-blue-400 mr-2">
            <span>📝</span> Bewerken
        </a>
        <form action="{{ route('news.destroy', $bericht) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Verwijderen</button>
        </form>
    @endif
</div>

                        @empty
                            <div class="text-gray-400">Nog geen nieuwsberichten.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
