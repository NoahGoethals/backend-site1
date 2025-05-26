<?php

// app/Http/Controllers/CategoryController.php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $req) {
        $data = $req->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create($data);
        return redirect()->route('faqs.index')->with('success','Categorie toegevoegd');
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $req, Category $category) {
        $data = $req->validate(['name'=>'required|string|max:255']);
        $category->update($data);
        return redirect()->route('faqs.index')->with('success','Categorie bijgewerkt');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('faqs.index')->with('success','Categorie verwijderd');
    }
}
