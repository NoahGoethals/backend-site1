<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profiel bewerken
        </h2>
    </x-slot>

    @php
        $user = auth()->user();
    @endphp

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('status') === 'profile-updated')
                    <p class="text-green-400 mb-4">Profiel succesvol bijgewerkt!</p>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <!-- Gebruikersnaam -->
                    <div>
                        <x-input-label for="username" value="Gebruikersnaam" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                      :value="old('username', $user->username)" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Bio -->
                    <div>
                        <x-input-label for="bio" value="Over mij" />
                        <textarea id="bio" name="bio" rows="4" class="block w-full rounded dark:bg-gray-700 dark:text-white">{{ old('bio', $user->bio) }}</textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>

                    <!-- Geboortedatum -->
                    <div>
                        <x-input-label for="birthdate" value="Geboortedatum" />
                        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                                      :value="old('birthdate', $user->birthdate)" />
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>

                    <!-- Profielfoto -->
                    <div>
                        <x-input-label for="image" value="Profielfoto" />
                        @if ($user->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $user->image) }}" class="h-24 w-24 rounded-full object-cover">
                            </div>
                        @endif
                        <input type="file" id="image" name="image" class="block mt-1 w-full text-white">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <div>
                        <x-primary-button>Opslaan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
