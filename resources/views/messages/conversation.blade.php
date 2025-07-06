@extends('layouts.app')
@section('title', 'Chat & Support')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex rounded-xl overflow-hidden bg-white dark:bg-gray-800 h-[600px]">

            <div class="w-1/3 border-r border-gray-200 dark:border-gray-700 overflow-y-auto bg-gray-50 dark:bg-gray-900">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 p-4">Admins & Archivists</h3>

                @foreach ($users as $user)
                    <a href="{{ route('messages.conversation', ['userId' => $user->id]) }}"
                        class="relative flex items-center gap-3 px-4 py-3 mx-4 my-1 rounded-xl hover:bg-gray-200 hover:rounded-xl dark:hover:bg-gray-700 {{ $otherUser->id === $user->id ? 'bg-gray-200 dark:bg-gray-700' : '' }}">

                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->first_name) }}"
                            alt="Photo" class="w-10 h-10 rounded-full object-cover">

                        <div class="flex flex-col">
                            <span
                                class="text-sm text-gray-800 dark:text-gray-100 font-medium">{{ $user->first_name }}</span>

                            @if ($user->is_admin)
                                <span class="text-xs text-green-600 dark:text-green-400 font-semibold">Admin</span>
                            @elseif ($user->is_archivist)
                                <span class="text-xs text-blue-600 dark:text-blue-400 font-semibold">Archivist</span>
                            @endif
                        </div>

                        @if ($user->unread_count > 0)
                            <span
                                class="absolute right-3 top-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                                {{ $user->unread_count }}
                            </span>
                        @endif
                    </a>
                @endforeach


            </div>
            <div class="w-2/3 flex flex-col justify-between">
                <div class="p-4 border-b border-gray-300 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                        {{ $otherUser->first_name != auth()->user()->first_name ? 'Conversation avec ' . $otherUser->first_name : 'Start Conversation' }}
                    </h2>
                </div>

                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    @foreach ($messages as $message)
                        <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div
                                class="max-w-xs px-4 py-2 rounded-xl
                            {{ $message->sender_id === auth()->id()
                                ? 'bg-indigo-700 text-white rounded-br-none'
                                : 'bg-gray-300 text:dark dark:text-white rounded-bl-none dark:bg-gray-700' }}">
                                {{ $message->content }}
                                <div class="text-xs mt-1 opacity-70">{{ $message->created_at->format('H:i') }}</div>
                                <div class="text-xs mt-1 opacity-70">{{ $message->is_read == 1 ? 'seen' : 'sent' }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($otherUser->first_name != auth()->user()->first_name)
                    <form action="{{ route('messages.send') }}" method="POST"
                        class="flex items-center p-4 border-t border-gray-300 dark:border-gray-700 gap-2">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
                        <input type="text" name="content" placeholder="Tapez votre message..." required
                            class="flex-1 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                            Envoyer
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </div>
@endsection
