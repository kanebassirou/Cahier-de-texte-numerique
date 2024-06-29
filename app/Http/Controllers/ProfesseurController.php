<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\User;
use App\Models\Classe;
use App\Models\Modules;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        $datas = User::where('role', 1)->get();
        return view('Parametrage.Professeur.index', ['profs' => $datas]);
    }

    // aff
    // public function showModulesAffectes($profId)
    // {
    //     // Récupérer le professeur par ID
    //     $prof = User::findOrFail($profId);

    //     // Récupérer les affectations de ce professeur
    //     $affectations = Affectation::where('user_id', $profId)->get();

    //     // Récupérer toutes les classes
    //     $classes = Classe::all();
    //     $modules = Modules::all();

    //     // Retourner la vue avec les données nécessaires
    //     return view('Parametrage.Professeur.prof-module', compact('prof', 'affectations', 'classes', 'modules'));
    // }

    // public function getAffect(Request $request)
    // {
    //     // Récupérer le professeur en fonction de l'id passé en requête
    //     $professeur = User::find($request->id);

    //     // Récupérer toutes les classes et tous les modules
    //     $classes = Classe::all();
    //     $modules = Modules::all();

    //     // Récupérer les affectations liées à ce professeur avec les relations
    //     $affectations = Affectation::where('user_id', $professeur->id)
    //         ->with('module', 'classe')
    //         ->get();

    //     return view('Parametrage.Professeur.prof-module', [
    //         'prof' => $professeur,
    //         'modules' => $modules,
    //         'classes' => $classes,
    //         'affectations' => $affectations, // Passer les affectations à la vue
    //     ]);
    // }
}
