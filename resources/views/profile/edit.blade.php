<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profiel bewerken
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <!-- Gebruikersnaam -->
                <div>
                    <x-input-label for="username" value="Gebruikersnaam" />
                    <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                    :value="old('username', $user->username)"                        />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Bio -->
                <div>
                    <x-input-label for="bio" value="Over mij" />
                    <textarea name="bio" id="bio" class="mt-1 block w-full dark:bg-gray-800 dark:text-white">{{ old('bio', $user->bio) }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <!-- Geboortedatum -->
                <div>
                    <x-input-label for="birthdate" value="Geboortedatum" />
                    <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full"
                    :value="old('username', $user->username)" />
                    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                </div>

                <!-- Profielfoto -->
                <div>
                    <x-input-label for="profile_photo" value="Profielfoto" />
                    @if ($user->profile_photo_path)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Huidige profielfoto" class="h-24 w-24 rounded-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
                </div>

                <!-- Opslaan knop -->
                <div class="flex items-center gap-4">
                    <x-primary-button>Opslaan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
