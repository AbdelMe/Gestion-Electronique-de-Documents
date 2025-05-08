<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $query = Notification::where('user_id', auth()->id());

    //     if ($request->has('read')) {
    //         if ($request->read == '0') {
    //             $query->whereNull('read_at');
    //         } elseif ($request->read == '1') {
    //             $query->whereNotNull('read_at');
    //         }
    //     }

    //     $notifications = $query->orderBy('created_at', 'desc')->take(10)->get();

    //     return view('notifications.index', compact('notifications'));
    // }

    public function markAsRead($id)
    {
        // dd($id);
        $notification = Notification::where('user_id', auth()->id())->findOrFail($id);
        $notification->update(['read_at' => now()]);

        return back();
    }
    public function destroy(Notification $notification)
    {
        if (auth()->id() === $notification->user_id) {
            $notification->delete();
            return back()->with('success', 'Notification deleted successfully.');
        }

        // abort(403, 'Unauthorized action.');
    }
}
