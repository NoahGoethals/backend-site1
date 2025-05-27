<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Toon alle gebruikers
    public function index()
    {
        $users = User::orderBy('is_admin', 'desc')->orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    // Promote user tot admin
    public function promote(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return back()->with('success', "{$user->name} is nu een admin.");
    }

    // Demote admin naar gewone gebruiker
    public function demote(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan jezelf niet demoten.');
        }
        $user->is_admin = false;
        $user->save();

        return back()->with('success', "{$user->name} is geen admin meer.");
    }

    // Toon formulier om nieuwe gebruiker aan te maken
    public function create()
    {
        // Alleen admins mogen dit zien
        if (!auth()->user()->is_admin) {
            abort(403, 'Alleen admins kunnen gebruikers aanmaken.');
        }
        return view('users.create');
    }

    // Verwerk nieuwe gebruiker
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Alleen admins kunnen gebruikers aanmaken.');
        }
    
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // is_admin mag weg, want dat behandel je zelf hieronder
        ]);
    
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => $request->has('is_admin') ? 1 : 0,
        ]);
    
        return redirect()->route('users.index')->with('success', 'Gebruiker toegevoegd!');
    }
    
}
