@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-white mb-4">Categorieënbeheer</h1>

    <a href="{{ route('categories.create') }}" class="text-blue-500 underline">+ Nieuwe categorie</a>

    <ul class="mt-4 space-y-2">
        @foreach ($categories as $category)
            <li class="bg-white dark:bg-gray-800 p-4 rounded shadow flex justify-between items-center">
                <span class="text-white">{{ $category->name }}</span>
                <div class="space-x-2">
                    <a href="{{ route('categories.edit', $category) }}" class="text-blue-500">Bewerken</a>
                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Verwijderen</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
