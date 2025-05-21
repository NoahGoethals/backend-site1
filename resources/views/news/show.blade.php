@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $item->title }}</h1>

        @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding" style="max-width: 100%; height: auto;">
        @endif

        <p>{{ $item->content }}</p>

        <small>Geplaatst op: {{ $item->published_at ?? 'Onbekend' }}</small><br><br>

        <a href="{{ route('news.index') }}">⬅️ Terug naar overzicht</a>
    </div>
@endsection
