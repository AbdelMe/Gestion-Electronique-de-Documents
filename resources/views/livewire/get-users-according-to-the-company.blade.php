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

{{-- <div>
    <div class="max-w-md mb-6">
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
        <div class="max-w-md mb-4">
            <label class="flex items-center space-x-2 text-gray-700 dark:text-gray-300">
                <input type="checkbox" id="selectAllUsers" wire:ignore
                    class="appearance-none h-5 w-5 border-2 rounded-md border-gray-800 checked:bg-indigo-600 checked:border-indigo-600 focus:ring-0 transition duration-150 ease-in-out cursor-pointer">
                <span class="select-none">Sélectionner tous</span>
            </label>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div
                class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between bg-gray-50 dark:bg-gray-700">
                <span class="font-medium text-gray-700 dark:text-gray-300">Utilisateurs</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $users->count() }} utilisateurs</span>
            </div>

            <div class="max-h-96 overflow-y-auto">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($users as $user)
                        <form action="{{ route('roles.assignRoleStore') }}" method="POST"
                            class="flex items-center px-4 py-3 space-x-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">

                            @csrf

                            <label
                                class="flex items-center px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150 cursor-pointer">
                                <input type="checkbox" name="user_ids[]" value="{{ $user->id }}"
                                    wire:model="selectedUsers"
                                    class="user-checkbox appearance-none h-5 w-5 border-2 border-gray-700 rounded-md checked:bg-indigo-600 checked:border-indigo-600 focus:ring-0 transition duration-150 ease-in-out cursor-pointer">
                                <div class="ml-3 flex-grow min-w-0">
                                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200 truncate">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                        {{ $user->email }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-3 py-1.5 rounded-md shadow">
                                            Assigner le rôle
                                        </button>
                                    </p>
                            </label>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    @elseif($selected_company)
        <p class="text-red-600 dark:text-red-400 mt-4">Aucun utilisateur trouvé pour cette entreprise.</p>
    @endif
</div>

<script>
    document.addEventListener('livewire:init', () => {
        document.addEventListener('change', function(e) {
            if (e.target.id === 'selectAllUsers') {
                const checkboxes = document.querySelectorAll('.user-checkbox');
                const isChecked = e.target.checked;

                checkboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                    checkbox.dispatchEvent(new Event('change'));
                });

                Livewire.dispatch('updateSelectedUsers', {
                    selectAll: isChecked,
                    userIds: Array.from(checkboxes).map(cb => cb.value)
                });
            }
        });
    });
</script> --}}
