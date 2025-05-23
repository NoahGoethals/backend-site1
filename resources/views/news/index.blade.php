@extends('layouts.app')

@section('styles')
<style>
    body {
        color: #f0f0f0;
    }

    a {
        color: #4ea1f3;
    }

    a:hover {
        color: #79bfff;
    }

    .btn-danger {
        color: #ff6b6b !important;
    }

    .btn-edit {
        color: #f1c40f;
    }

    small {
        color: #aaaaaa;
    }

    h1, h2, h3 {
        color: #ffffff;
    }
</style>
@endsection


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

                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Weet je zeker dat je dit nieuwsbericht wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">
                            🗑️ Verwijderen
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
