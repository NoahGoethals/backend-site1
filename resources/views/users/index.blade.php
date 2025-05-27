@extends('layouts.app')

@section('content')
<div class="w-full max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-white">
        Gebruikersbeheer
    </h1>

    @if(session('success'))
        <div class="mb-4 p-4 rounded shadow bg-green-100 text-green-900 dark:bg-green-800 dark:text-white">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 rounded shadow bg-red-100 text-red-900 dark:bg-red-800 dark:text-white">
            {{ session('error') }}
        </div>
    @endif

    {{-- Admin-only: Nieuwe gebruiker knop --}}
    @if(auth()->user() && auth()->user()->is_admin)
        <div class="mb-8 flex justify-end">
            <a href="{{ route('users.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded font-semibold hover:bg-green-700 transition">
                ➕ Nieuwe gebruiker
            </a>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full min-w-[800px] divide-y divide-gray-700 bg-gray-800 rounded shadow-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-white">Naam</th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-white">E-mail</th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-white">Rol</th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-white">Actie</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 text-white">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-white">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if($user->is_admin)
                                <span class="inline-block px-2 py-1 bg-green-700 text-white rounded">Admin</span>
                            @else
                                <span class="inline-block px-2 py-1 bg-gray-700 text-white rounded">Gebruiker</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if(auth()->id() == $user->id)
                                <span class="text-gray-300">Jij</span>
                            @elseif($user->is_admin)
                                <form method="POST" action="{{ route('users.demote', $user) }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1 rounded bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                                        Demote
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('users.promote', $user) }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1 rounded bg-green-600 text-white font-semibold hover:bg-green-700 transition">
                                        Promote
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
