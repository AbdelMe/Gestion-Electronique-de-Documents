<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::with('user')->latest()->get();

        return view('requests.index', compact('requests'));
    }
    public function store(HttpRequest $request)
    {
        $request->validate([
            'type' => 'required|in:permission,consulting,downloading,creating',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Request::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('Added', 'Votre demande a été envoyée avec succès.');
    }
}
