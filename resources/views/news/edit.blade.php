@extends('layouts.app')

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
