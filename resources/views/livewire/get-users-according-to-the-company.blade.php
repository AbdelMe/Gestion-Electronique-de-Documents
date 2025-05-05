<div>
    <div class="max-w-md">
        <label for="entreprise" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Entreprise</label>
        <select id="entreprise" name="entreprise_id" required wire:model.live="selected_company"
            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:focus:ring-indigo-500">
            <option value="" selected disabled>-- Sélectionnez une entreprise --</option>
            @foreach ($entreprises as $entreprise)
                <option value="{{ $entreprise->id }}">{{ $entreprise->NomClient }}</option>
            @endforeach
        </select>
    </div>

    @if ($users && $users->count() > 0)
        <div class="max-w-md">
            <label for="user" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Utilisateur</label>
            <select id="user" name="user_id" required
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:focus:ring-indigo-500">
                <option value="" selected disabled>-- Sélectionnez un utilisateur --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>
    @elseif($selected_company)
        <p class="text-red-600 dark:text-red-400">Aucun utilisateur trouvé pour cette entreprise.</p>
    @endif
</div>
