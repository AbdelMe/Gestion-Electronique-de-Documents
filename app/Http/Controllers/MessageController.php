<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function conversation($userId)
    {
        $currentUserId = auth()->id();

        // Mark messages as read
        Message::where('sender_id', $userId)
            ->where('receiver_id', $currentUserId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Get conversation messages
        $messages = Message::where(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $currentUserId)->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $userId)->where('receiver_id', $currentUserId);
        })->orderBy('created_at')->get();

        // Load all users and count unread messages
        // $users = User::where('id', '!=', $currentUserId)
        //     ->withCount(['unreadMessages as unread_count' => function ($query) use ($currentUserId) {
        //         $query->where('receiver_id', $currentUserId)->where('is_read', false);
        //     }])
        //     ->get();

        $currentUser = auth()->user();
        $usersQuery = User::query()
            ->where('id', '!=', $currentUser->id)
            ->withCount(['unreadMessages as unread_count' => function ($query) use ($currentUser) {
                $query->where('receiver_id', $currentUser->id)
                    ->where('is_read', false);
            }]);

        // Apply role filtering only if the current user is not admin or archivist
        if (!($currentUser->is_admin || $currentUser->is_archivist)) {
            $usersQuery->where(function ($query) {
                $query->where('is_admin', 1)
                    ->orWhere('is_archivist', 1);
            });
        }

        $users = $usersQuery->get();

        $otherUser = User::findOrFail($userId);

        return view('messages.conversation', compact('users', 'messages', 'otherUser'));
    }


    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string'
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.conversation', $request->receiver_id);
    }
}
