@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Categorie bewerken</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-white font-semibold">Naam van de categorie</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                   class="w-full mt-1 p-2 rounded bg-gray-800 text-white border border-gray-600">
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Bijwerken
        </button>
    </form>
</div>
@endsection
