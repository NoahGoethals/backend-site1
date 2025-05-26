{{-- resources/views/faqs/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-white mb-6">FAQ bewerken</h1>

    {{-- Error messages --}}
    @if($errors->any())
        <div class="mb-4 text-red-500">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('faqs.update', $faq->id) }}">
        @csrf
        @method('PATCH')

        {{-- Vraag --}}
        <div class="mb-4">
            <label for="question" class="block text-sm font-medium text-gray-300 mb-1">Vraag</label>
            <input type="text" id="question" name="question"
                class="block w-full rounded bg-gray-700 text-white border-gray-600 focus:ring-blue-400 focus:border-blue-400"
                value="{{ old('question', $faq->question) }}" required>
        </div>

        {{-- Antwoord --}}
        <div class="mb-4">
            <label for="answer" class="block text-sm font-medium text-gray-300 mb-1">Antwoord</label>
            <textarea id="answer" name="answer" rows="4"
                class="block w-full rounded bg-gray-700 text-white border-gray-600 focus:ring-blue-400 focus:border-blue-400"
                required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        {{-- Categorie --}}
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-1">Categorie</label>
            <select id="category_id" name="category_id"
                class="block w-full rounded bg-gray-700 text-white border-gray-600 focus:ring-blue-400 focus:border-blue-400">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(old('category_id', $faq->category_id) == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('faqs.index') }}" class="text-blue-400 hover:underline">&larr; Terug naar FAQ overzicht</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Opslaan</button>
        </div>
    </form>
</div>
@endsection
