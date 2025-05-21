<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $news = News::orderBy('published_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/webp,image/gif|max:2048',
            'published_at' => 'nullable|date',
        ]);
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }
    
        News::create($validated);
    
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = News::findOrFail($id);
    return view('news.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = News::findOrFail($id);
        return view('news.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/webp,image/gif|max:2048',
            'published_at' => 'nullable|date',
        ]);
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }
    
        $item->update($validated);
    
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht succesvol bijgewerkt!');
    }

    public function destroy(string $id)
    {
        $item = News::findOrFail($id);

        if ($item->image) {
            \Storage::disk('public')->delete($item->image);
        }
    
        $item->delete();
    
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht succesvol verwijderd!');
    
    }
}
