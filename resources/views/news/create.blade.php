@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuw nieuwsbericht</h1>

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Titel:</label><br>
            <input type="text" name="title" value="{{ old('title') }}"><br>
            @error('title') <small style="color:red">{{ $message }}</small><br> @enderror

            <label>Inhoud:</label><br>
            <textarea name="content">{{ old('content') }}</textarea><br>

            <label>Afbeelding:</label><br>
            <input type="file" name="image"><br>

            <label>Publicatiedatum:</label><br>
            <input type="datetime-local" name="published_at"><br><br>

            <button type="submit">Opslaan</button>
        </form>
    </div>
@endsection
