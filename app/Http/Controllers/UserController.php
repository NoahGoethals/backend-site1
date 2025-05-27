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
        // Prevent yourself from demoting yourself!
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan jezelf niet demoten.');
        }
        $user->is_admin = false;
        $user->save();

        return back()->with('success', "{$user->name} is geen admin meer.");
    }
}
