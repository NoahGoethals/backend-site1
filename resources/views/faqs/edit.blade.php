@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-white mb-6">FAQ bewerken</h1>

    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="question" class="block text-white mb-2">Vraag</label>
            <input type="text" name="question" id="question"
                   value="{{ old('question', $faq->question) }}"
                   class="w-full px-4 py-2 rounded bg-gray-800 text-white">
        </div>

        <div class="mb-4">
            <label for="answer" class="block text-white mb-2">Antwoord</label>
            <textarea name="answer" id="answer"
                      class="w-full px-4 py-2 rounded bg-gray-800 text-white"
                      rows="4">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-white mb-2">Categorie</label>
            <select name="category_id" id="category_id"
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="published_at" class="block text-white mb-2">Publicatiedatum</label>
            <input type="datetime-local" name="published_at" id="published_at"
                   value="{{ old('published_at', \Carbon\Carbon::parse($faq->published_at)->format('Y-m-d\TH:i')) }}"
                   class="w-full px-4 py-2 rounded bg-gray-800 text-white">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Bijwerken
        </button>
    </form>
</div>
@endsection
