<?php

namespace App\Http\Controllers;

use App\Models\BioLink;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users/leading');
    }

    public function about()
    {
        return view('users/about');
    }

    public function princing()
    {
        return view('users/price');
    }

    public function bio()
    {


        return view('users/bio');
    }

    public function link()
    {
        return view('users/link');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('lofran')->check()) {
            return redirect()->intended('/home');
        }
        return view('users/auth');
    }

    public function signup()
    {
        return view('users/signup');
    }


    /**
     * Store a newly created resource in storage.
     */

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('lofran')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'prenom.required' => 'Le prénom est obligatoire',
            'nom.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'adresse email est obligatoire',
            'email.email' => 'L\'adresse email n\'est pas valide',
            'email.unique' => 'Cette adresse email est déjà utilisée',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas',
        ]);

        try {
            UserModel::create([
                'prenom' => $validated['prenom'],
                'nom' => $validated['nom'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
            // Redirection avec message de succès
            return redirect()->route('/auth')->with('success', 'Votre compte a été créé avec succès!');
        } catch (\Exception $e) {
            // En cas d'erreur, retour en arrière avec message d'erreur
            return back()->with('error', 'Une erreur est survenue lors de la création du compte.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserModel $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModel $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserModel $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserModel $user)
    {
        //
    }

    public function dashboard()
    {

        return view('users/dashboard');
    }
}
