<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    // Toon het contactformulier (voor iedereen)
    public function show()
    {
        return view('formulier.show');
    }

    // Verwerk het formulier
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|max:2000',
        ]);
    
        ContactMessage::create($request->only('email', 'message'));
    
        return redirect()->route('contact.show')->with('success', 'Bedankt voor je bericht! We nemen spoedig contact op.');
    }
    

    // Voor admin: toon alle berichten
    public function index()
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403);
        }

        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('formulier.index', compact('messages'));
    }
}
