@extends('layouts.app')
<style>
    body {
        color: #f0f0f0;
        background-color: #0f172a;
    }
    input[type="text"],
    input[type="datetime-local"],
    textarea {
        background-color: #1f2937 !important;
        color: #f0f0f0 !important;
        border: 1px solid #475569 !important;
        padding: 8px;
        width: 100%;
        border-radius: 4px;
    }
    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
    label {
        font-weight: bold;
        display: block;
        margin-top: 1rem;
        margin-bottom: 0.3rem;
    }
    small {
        color: #ff6b6b;
    }
    .btn-terug {
        background-color: #2563eb;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        margin-top: 1rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    .btn-terug:hover {
        background-color: #1d4ed8;
    }
</style>
@section('content')
<div class="container">
    <h1>Nieuwsbericht</h1>
    {{-- Geen formulier, gewoon velden readonly tonen --}}
    <div>
        <label>Titel:</label><br>
        <input type="text" value="{{ $item->title }}" readonly disabled><br>

        <label>Inhoud:</label><br>
        <textarea rows="5" readonly disabled>{{ $item->content }}</textarea><br>

        <label>Huidige afbeelding:</label><br>
        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding" style="max-width: 200px;"><br>
        @else
            <em style="color: #555;">Geen afbeelding geüpload</em><br>
        @endif

        <label>Publicatiedatum:</label><br>
        <input type="datetime-local"
            value="{{ optional($item->published_at)->format('Y-m-d\TH:i') }}" readonly disabled><br><br>

        {{-- Geen submit-knop maar een terug-knop --}}
        <a href="{{ route('news.index') }}" class="btn-terug">⬅️ Terug naar overzicht</a>
    </div>
</div>
@endsection
