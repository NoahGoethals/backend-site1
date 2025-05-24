<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Toon alle FAQ's gegroepeerd per categorie
     */
    public function index()
    {
        $categories = Category::with(['faqs' => function ($query) {
            $query->orderByDesc('published_at');
        }])->orderBy('name')->get();

        return view('faqs.index', compact('categories'));
    }

    /**
     * Toon het formulier om een nieuwe FAQ aan te maken
     */
    public function create()
    {
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
    }

    /**
     * Sla een nieuwe FAQ op in de database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'required|date',
        ]);

        Faq::create($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ toegevoegd.');
    }

    /**
     * Toon een specifieke FAQ (optioneel detailpagina)
     */
    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    /**
     * Toon het formulier om een FAQ te bewerken
     */
    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Werk een bestaande FAQ bij in de database
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'required|date',
        ]);

        $faq->update($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ bijgewerkt.');
    }

    /**
     * Verwijder een FAQ
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ verwijderd.');
    }
}
