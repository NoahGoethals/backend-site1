<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Toon de chatpagina met alle berichten
    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
        return view('chat.index', compact('messages'));
    }

    // Sla een nieuw bericht op
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return redirect()->route('chat.index');
    }
}
