@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuws Overzicht</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('news.create') }}">➕ Nieuw nieuwsbericht</a>

        <ul>
            @foreach ($news as $item)
                <li>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->content }}</p>
                    <small>Geplaatst op: {{ $item->published_at ?? 'Onbekend' }}</small>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
