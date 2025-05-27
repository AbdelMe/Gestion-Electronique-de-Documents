<div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <form class="w-full md:w-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="name" name="name"  wire:model.live="searchUser"
                        placeholder="Search users by name or email"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:text-white">
                </div>
            </form>

            <div class="flex items-center space-x-3">
                <select name="entreprise" wire:model.live="selected_entreprise"
                    class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Filter By Enterprise</option>
                    @foreach ($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}">{{ $entreprise->NomClient }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <form id="bulkAssignForm" action="{{ route('roles.bulkAssign') }}" method="POST"
        onsubmit="return confirm('Are you sure you want to assign this role to the selected users?');">
        @csrf
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
            <div class="flex items-center p-4">
                <select name="role_id"
                    class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Select Role to Assign</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="selectAll"
                                        class="user-checkbox appearance-none h-5 w-5 border-2 border-gray-700 rounded-md checked:bg-indigo-600 checked:border-indigo-600 focus:ring-0 transition duration-150 ease-in-out cursor-pointer">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">User ID</span>
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col Bateman"
                                class="px-6 py-3 text-xs text-center
                                font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Current Role
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}"
                                            class="user-checkbox appearance-none h-5 w-5 border-2 border-gray-700 rounded-md checked:bg-indigo-600 checked:border-indigo-600 focus:ring-0 transition duration-150 ease-in-out cursor-pointer">
                                        <span
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-white">#USR-{{ $user->id }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                {{-- src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/images/icons/user.png') }}" --}}
                                                src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets\images\icons\user (1).png') }}"
                                                alt="{{ $user->first_name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $user->first_name }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                @php
                                                    $slug = Str::slug(trim($user->last_name), '');
                                                @endphp
                                                {{ '@' . $slug }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6:^M text-center
                                    py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex flex-wrap gap-2">
                                        @forelse ($user->roles as $role)
                                            <span
                                                class="px-3 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                                {{ $role->name }}
                                            </span>
                                        @empty
                                            <span class="text-sm text-gray-500 dark:text-gray-400">N/A</span>
                                        @endforelse
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
        <div class="mt-4">
            <button type="submit"
                class="inline-flex items-center px-4 text-green-700 border hover:text-white border-green-600 py-2 hover:bg-green-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Assign Role to Selected
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const userCheckboxes = document.querySelectorAll('.user-checkbox');
        const bulkAssignForm = document.getElementById('bulkAssignForm');

        selectAllCheckbox.addEventListener('change', function() {
            userCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        userCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(userCheckboxes).every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            });
        });

        bulkAssignForm.addEventListener('submit', function(e) {
            const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
            const roleSelect = bulkAssignForm.querySelector('select[name="role_id"]');
            if (checkedBoxes.length === 0) {
                e.preventDefault();
                alert('Please select at least one user.');
            } else if (!roleSelect.value) {
                e.preventDefault();
                alert('Please select a role to assign.');
            }
        });
    });
</script>
