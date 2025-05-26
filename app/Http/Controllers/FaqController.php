<?php

// app/Http/Controllers/FaqController.php
namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;


class FaqController extends Controller
{
    // Publieke lijst, gegroepeerd per categorie
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faqs.index', compact('categories'));
    }

    // === Admin CRUD ===

    public function create(Request $req)
    {
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'question'    => 'required|string|max:255',
            'answer'      => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        Faq::create($data);
        return redirect()->route('faqs.index')->with('success','Vraag toegevoegd');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('faqs.edit', compact('faq','categories'));
    }

    public function update(Request $req, Faq $faq)
    {
        $data = $req->validate([
            'question'    => 'required|string|max:255',
            'answer'      => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $faq->update($data);
        return redirect()->route('faqs.index')->with('success','Vraag bijgewerkt');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success','Vraag verwijderd');
    }

    public function ask()
{
    // Laad de vijf categorieën (of pas aan naar jouw 5 categorieën)
    $categories = Category::all(); 
    return view('faqs.ask', compact('categories'));
}
public function submit(Request $request)
{
    $data = $request->validate([
        'question'    => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Bewaar met een lege answer, of met default tekst
    $data['answer'] = ''; 

    \App\Models\Faq::create($data);

    return redirect()->route('faqs.ask')
                     ->with('success', 'Bedankt! Je vraag is ontvangen.');
}
}
