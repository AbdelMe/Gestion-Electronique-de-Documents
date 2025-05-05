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
                    <input type="text" id="name" name="name" required wire:model.live="searchUser"
                        placeholder="Search users by name or email"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:text-white">
                </div>
            </form>

            <div class="flex items-center space-x-3">
                <select name="role" wire:model.live="withRol"
                    class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Search By Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">
                            {{-- {{ request('role') == $role->id ? 'selected' : '' }} --}}
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                {{-- <select name="role" wire:model.live="withoutRol"
                    class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Without Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select> --}}

                <select name="entreprise" wire:model.live="selected_entreprise"
                    class="block w-full md:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Search By Enterprises</option>
                    @foreach ($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}">
                            {{ $entreprise->NomClient }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                {{-- <input type="checkbox" --}}
                                {{-- class="h-5 w-5 rounded-full text-indigo-600 bg-white border-gray-300 dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-150 ease-in-out"> --}}
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">User ID</span>
                            </div>

                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Role
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{-- <input type="checkbox" --}}
                                    {{-- class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600"> --}}
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-white">#USR-{{ $user->id }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets\images\icons\user (1).png') }}"
                                            alt="{{ $user->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $user->first_name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">@php
                                            $slug = Str::slug(trim($user->last_name), '');
                                        @endphp
                                            {{ '@' . $slug }}

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $roleName = $user->roles->pluck('name')->first() ?? 'N/A';
                                    // $roleId = $user->roles->pluck('id')->first();
                                    $firstRole = $user->roles->first();
                                @endphp
                                {{-- {{dd($roleId)}} --}}
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                    {{ $roleName }}
                                </span>
                            </td>
                                <td>
                                    @php
                                        $firstRole = $user->roles->first();
                                    @endphp
                                
                                    @if ($firstRole)
                                        <form action="{{ route('roles.revokeRoleDelete', ['user' => $user->id, 'role' => $firstRole->id]) }}"
                                              method="POST"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle de l’utilisateur ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-2 py-1 bg-red-100 text-red-600 rounded-full text-xs hover:bg-red-200">
                                                <i class="bi bi-trash3-fill mr-1"></i> Revoke
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-500 dark:text-gray-400 italic">No role assigned</span>
                                    @endif
                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
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
</div>
