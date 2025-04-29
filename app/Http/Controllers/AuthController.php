<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $role = Role::where('name',  'admin')->first();
        $user->assignRole($role);

        Auth::login($user);

        return redirect()->route('documents.index');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => 'Email or password incorrect',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function AddUser()
    {
        $entreprises = Entreprise::all();
        return view('users.AddUser', compact('entreprises'));
    }
    public function StoreUser(Request $request)
    {
        // dd($request->entreprise_id);
        // dd($request->file('profile_image'));
        $validated = $request->validate([
            'entreprise_id'  => 'nullable|exists:entreprises,id',
            'profile_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name'     => 'nullable|string|max:255',
            'last_name'      => 'nullable|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|string|min:6',
            'phone'          => 'nullable|string|max:20',
            'address'        => 'nullable|string',
            'city'           => 'nullable|string|max:255',
            'postal_code'    => 'nullable|string|max:20',
        ]);
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $validated['profile_image'] = $path;
        }
        $validated['password'] = Hash::make($validated['password']);
        // $validated['entreprise_id'] = 1;
        User::create($validated);
        return redirect()->route('users.index')->with('Added', 'Utilisateur ajouté avec succès.');
    }
}
