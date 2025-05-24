@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Categorie bewerken</h1>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-white mb-2">Naam van de categorie</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full px-4 py-2 rounded bg-gray-800 text-white">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-white mb-2">Beschrijving</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 rounded bg-gray-800 text-white">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Bijwerken</button>
    </form>
</div>
@endsection
