<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //gérer les accès 
    }

    public function editProfile(Request $request)
    {
        $filename = time() . '.' . $request->file->extension();
        $request->file->storeAs('public/profile', $filename);

        try {
            User::find(Auth::user()->id)->update(['profile_picture' => $filename]);
            
            return redirect()->route('modules.index')->with('success', "Modification effectuée avec succès");
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }

    public function index()
    {
        $datas = User::select('id', 'name', 'profile_picture', 'adresse', 'phone', 'role', 'etatEtudiant', 'created_at')
            ->orderBy('id', 'ASC')
            ->paginate(10);

        return view('Parametrage.Etudiant.index', ['users' => $datas]);
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('edit-etudiant-component', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'adresse' => 'required|min:3|max:120',
            'phone' => 'required|min:3|max:120',
            'name' => 'required|min:3|max:120',
            'etatEtudiant' => 'required|in:0,1'
        ]);

        try {
            User::find($request->id)->update([
                'adresse' => $request->input('adresse'),
                'phone' => $request->input('phone'),
                'name' => $request->input('name'),
                'etatEtudiant' => $request->input('etatEtudiant')
            ]);
            return redirect()->route('user.index')->with('success', "Modification effectuée avec succès");
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('danger', "Oups, une erreur a été détectée");
        }
    }

    public function create()
    {
        return view('add-etudiant-component');
    }

    public function save(Request $request)
    {
        //dd('test');
        $request->validate([
            'adresse' => 'required|min:3|max:120',
            'phone' => 'required|min:3|max:120',
            'name' => 'required|min:3|max:120',
            'email' => 'required|email',
        ]);

        $adresse = $request->input('adresse');
        $phone = $request->input('phone');
        $name = $request->input('name');

        try {
            User::create([
                'adresse' => $adresse,
                'phone' => $phone,
                'email' => $request->input('email'),
                'password' => 'password@',
                'name' => $name,
            ]);
            return redirect()->route('user.index')->with('success', "Enregistrement effectué avec succès");
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('user.index')->with('danger', "Oups, une erreur a été détectée");
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', "Suppression effectuée avec succès");
    }
}
