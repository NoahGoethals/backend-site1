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
                <h3>
    <a href="{{ route('news.show', $item->id) }}">
        {{ $item->title }}
    </a>
</h3>
<p>{{ $item->content }}</p>
<small>Geplaatst op: {{ $item->published_at ?? 'Onbekend' }}</small><br>

<a href="{{ route('news.edit', $item->id) }}">✏️ Bewerken</a>

                </li>
            @endforeach
        </ul>
    </div>
@endsection
