@extends('layouts.app')
<style>
    body {
        color: #f0f0f0;
        background-color: #0f172a;
    }

    input[type="text"],
    input[type="datetime-local"],
    input[type="file"],
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

    input::file-selector-button {
        background-color: #334155 !important;
        color: #f0f0f0 !important;
        border: none;
        padding: 6px 12px;
        cursor: pointer;
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

    button {
        background-color: #2563eb;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        margin-top: 1rem;
        cursor: pointer;
    }

    button:hover {
        background-color: #1d4ed8;
    }
</style>
@section('content')
<div class="container">
    <h1>Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('news.update', $item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Titel:</label><br>
        <input type="text" name="title" value="{{ old('title', $item->title) }}"><br>
        @error('title') <small style="color:red">{{ $message }}</small><br> @enderror

        <label>Inhoud:</label><br>
        <textarea name="content">{{ old('content', $item->content) }}</textarea><br>

        <label>Huidige afbeelding:</label><br>
        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding" style="max-width: 200px;"><br>
        @else
            <em style="color: #555;">Geen afbeelding geüpload</em><br>
        @endif

        <input type="file" name="image" accept="image/*"><br>
        @error('image') <small style="color:red">{{ $message }}</small><br> @enderror

        <label>Publicatiedatum:</label><br>
        <input type="datetime-local" name="published_at"
            value="{{ old('published_at', optional($item->published_at)->format('Y-m-d\TH:i')) }}"><br><br>

        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection
