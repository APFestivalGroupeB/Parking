<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.utilisateur.index', [
            'users' => User::orderBy('est_valide', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.utilisateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'est_valide' => true,
        ]);

        return redirect()->route('utilisateurs.show', ['utilisateur' => $user->id])->with('success', 'L\'utilisateur a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.utilisateur.show', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (!Auth::user()->passwordMatch($request->current_pwd) && !Auth::user()->isAdmin()) {
            return redirect()->back()/*->withInput()*/->with('error', 'Mot de passe invalide');
        }

        $request->validate([
            'password' => ['sometimes', 'string', 'confirmed'],
        ]);

        $user->fill($request->all());

        $changes = $user->getDirty();

        if ($changes) {
            Validator::make($changes, [
                'name' => ['sometimes', 'string', 'max:255'],
                'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
                'est_valide' => ['sometimes', 'boolean']
            ])->validate();

            $user->save();
        }

        return redirect()->back()->with('success', 'Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
