@props([
    'message' => 'Êtes-vous sûr de vouloir continuer ?',
])

<div x-data="{ open: false }" @keydown.escape.window="open = false" class="inline-block">
    <form
        {{ $attributes }}
        x-ref="form"
        @submit.prevent="open = true"
    >
        {{ $slot }}

        <!-- Confirmation modal -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50"
            style="display: none;"
        >
            <div
                @click.away="open = false"
                x-transition
                x-transition:enter="transform transition duration-300"
                x-transition:enter-start="scale-90 opacity-0"
                x-transition:enter-end="scale-100 opacity-100"
                x-transition:leave="transform transition duration-200"
                x-transition:leave-start="scale-100 opacity-100"
                x-transition:leave-end="scale-90 opacity-0"
                class="bg-white dark:bg-gray-900 rounded-xl p-8 max-w-md w-full text-center shadow-2xl ring-1 ring-black ring-opacity-5"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3a9 9 0 110 18 9 9 0 010-18z" />
                </svg>

                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    {{ $message }}
                </p>

                <div class="flex justify-center gap-6">
                    <button
                        type="button"
                        @click="open = false"
                        class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition"
                    >
                        Annuler
                    </button>
                    <button
                        type="button"
                        @click="$refs.form.submit()"
                        class="inline-flex justify-center rounded-md bg-red-600 px-6 py-2 text-sm font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition"
                    >
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
