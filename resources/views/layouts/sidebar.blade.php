@php $isRtl = app()->getLocale() === 'ar'; @endphp
<div
    class="h-screen bg-white border-r border-gray-200 w-72 fixed shadow-sm flex flex-col dark:bg-gray-900 dark:border-gray-800 {{ $isRtl ? 'border-l border-gray-200' : '' }}">
    <div class="p-4 dark:border-gray-800">
        <div class="flex items-center space-x-3">
            <div class="relative">
                <img class="w-10 h-10 rounded-full"
                    src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('assets\images\icons\user (1).png') }}"
                    alt="Profile">
                <span
                    class="absolute bottom-0 right-0 block w-2 h-2 bg-green-400 rounded-full ring-2 ring-white dark:ring-gray-900"></span>
            </div>
            <div>
                @php $isRtl = app()->getLocale() === 'ar'; @endphp
                <h5
                    class="{{ $isRtl ? 'font-medium text-gray-900 dark:text-white px-4 pt-2' : 'font-medium text-gray-900 dark:text-white' }}">
                    {{ Auth::user()->first_name }}
                </h5>
                <span class="text-sm text-gray-500 dark:text-gray-400 {{ $isRtl ? 'px-4 pt-1' : '' }}">
                    {{ Auth::user()->getRoleNames()->first() ?? 'user' }}
                </span>

            </div>
        </div>
    </div>
    <nav class="p-2 flex-1 overflow-y-auto removeScroll">
        <div class="mb-2 px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider dark:text-gray-400 {{ $isRtl ? 'px-6' : '' }}">
            {{ __('sidebar.navigation') }}
        </div>
        {{-- @if (auth()->user()->hasRole('admin')) --}}
        <ul class="space-y-1">
            {{-- @if (auth()->user()->hasPermissionTo('create_document'))        --}}
            @if (auth()->user()->getRoleNames()->contains('admin'))
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.dashboard') }}</span>
                    </a>
                </li>
            @endif
            {{-- @endif --}}
            <li>
                <a href="{{ route('users.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.users') }}</span>
                </a>
            </li>
            <li>
                <details class="group">
                    <summary
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 cursor-pointer transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                        <span class="flex-1 {{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.permissions') }}</span>
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transform group-open:rotate-180 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </summary>
                    <ul class="pl-8 mt-1 space-y-1">
                        <li>
                            <a href="{{ route('user_permissions.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span  class="{{ $isRtl ? 'px-10' : '' }}">{{ __('sidebar.role_permissions') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.showUserPermissions') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span  class="{{ $isRtl ? 'px-10' : '' }}">{{ __('sidebar.user_permissions') }}</span>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li>
                <a href="{{ route('dossiers.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.dossiers') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('entreprise.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5m-4 0h4">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.entreprises') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.roles') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permitions.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.all_permissions') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.demande') }}</span>
                </a>
            </li>
            <li>
                <details class="group">
                    <summary
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 cursor-pointer transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="flex-1 {{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.documents') }}</span>
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transform group-open:rotate-180 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </summary>
                    <ul class="pl-8 mt-1 space-y-1">
                        <li>
                            <a href="{{ route('documents.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span class="{{ $isRtl ? 'px-10' : '' }}">@lang('sidebar.all_documents')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('type_documents.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span class="{{ $isRtl ? 'px-10' : '' }}">@lang('sidebar.document_types')</span>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li>
                <details class="group">
                    <summary
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 cursor-pointer transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="flex-1 {{ $isRtl ? 'px-2' : '' }}">{{ __('sidebar.rubriques') }}</span>
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transform group-open:rotate-180 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </summary>
                    <ul class="pl-8 mt-1 space-y-1">
                        <li>
                            <a href="{{ route('rubrique.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span class="{{ $isRtl ? 'px-10' : '' }}">@lang('sidebar.all_rubriques')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('type_rubrique.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span class="{{ $isRtl ? 'px-10' : '' }}">@lang('sidebar.type_rubrique')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rubrique_document.index') }}"
                                class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-gray-600 hover:text-gray-900 transition-colors duration-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                <span class="{{ $isRtl ? 'px-10' : '' }}">@lang('sidebar.rubrique_document')</span>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li>
                <a href="{{ route('logs.showUsersLog') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.logs')</span>
                </a>
            </li>
            <li>
                <a href="{{ route('classe.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.classes')</span>
                </a>
            </li>
            <li>
                <a href="{{ route('etats.index') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                    <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.etat')</span>
                </a>
            </li>

            <div
                class="mt-8 mb-2 px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider dark:text-gray-400 {{ $isRtl ? 'px-6' : '' }}">
                @lang('sidebar.support')
            </div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('contact') }}"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.chat_support')</span>
                    </a>
                </li>
            </ul>
            <div
                class="mb-2 px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider dark:text-gray-400 {{ $isRtl ? 'px-6' : '' }}">
                @lang('sidebar.terms')
            </div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('about.about') }}"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.about')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('documentation') }}"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-colors duration-200 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="{{ $isRtl ? 'px-2' : '' }}">@lang('sidebar.documentation')</span>
                    </a>
                </li>
            </ul>
        </ul>
        {{-- @endif --}}
    </nav>
</div>
<style>
    .removeScroll {
        overflow: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .removeScroll::-webkit-scrollbar {
        display: none;
    }
</style>
