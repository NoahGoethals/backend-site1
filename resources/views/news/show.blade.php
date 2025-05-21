@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $item->title }}</h1>
        <p>{{ $item->content }}</p>

        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding" style="max-width: 100%; height: auto;">
        @endif

        <p><small>Gepubliceerd op: {{ $item->published_at }}</small></p>

        <a href="{{ route('news.index') }}">← Terug naar overzicht</a>
    </div>
@endsection
