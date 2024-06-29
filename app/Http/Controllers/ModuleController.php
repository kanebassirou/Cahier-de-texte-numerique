<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Classe;
use App\Models\Modules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ModuleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //gérer les accès
    }
    public function index()
    {

        $datas = Modules::select('id', 'libelleModule', 'created_at')
            ->orderBy('id', 'ASC')
            ->get();

        return view('Parametrage.Module.index', ['modules' => $datas]);
    }

    public function edit(Request $request)
    {
        //dd($request -> id);

        $modules = Modules::find($request->id);
        return view('edit-modules-component', ['modules' => $modules]);

        //dd($classe);
        //$post = Classe::where('id',$request -> id)->first();
    }

    public function update(Request $request)
    {


        $request->validate(['libelle' => 'required|min:3|max:120']);
        try {
            Modules::find($request->id)->update(['libelleModule' => $request->input('libelle')]);
            return redirect()->route('modules.index')->with('success', "Modification effectué avec success");
        } catch (\Throwable $th) {
            return redirect()->route('modules.index')->with('danger', "Oups une erreur a été détecté");
        }
    }


    public function create()
    {
        return view('add-modules-component');
    }
    public function saveModule(Request $request)
    {
        $request->validate([
            'libelleModule' => 'required|string|max:255',
        ]);

        $module = new Modules;
        $module->libelleModule = $request->input('libelleModule');
        $module->save();

        return redirect()->back()->with('success', 'Le module a été enregistré avec succès.');
    }

    public function save(Request $request)
    {
        // Validation des données reçues du formulaire
        $request->validate([
            'classe' => 'required|exists:classes,id',
            'quantum' => 'required|integer|min:1',
            'module_id' => 'required|exists:modules,id',
        ]);

        // Récupération de l'utilisateur actuellement connecté (exemple)
        $userId = auth()->id(); // Assurez-vous que votre système d'authentification est configuré

        // Récupération des autres données du formulaire
        $classeId = $request->input('classe');
        $quantumHoraire = $request->input('quantum');
        $moduleId = $request->input('module_id');

        // Exemple de sauvegarde en base de données
        $affectation = new Affectation();
        $affectation->classe_id = $classeId;
        $affectation->quantum = $quantumHoraire;
        $affectation->module_id = $moduleId;
        $affectation->user_id = $userId; // Assigner user_id à l'affectation

        $affectation->save();

        // Redirection avec un message de succès (facultatif)
        return redirect()->back()->with('success', 'L\'affectation a été enregistrée avec succès.');
    }

    public function showModulesAffectes($profId)
    {
        // Récupérer le professeur par ID
        $prof = User::findOrFail($profId);

        // Récupérer les affectations de ce professeur
        $affectations = Affectation::where('user_id', $profId)->get();

        // Récupérer toutes les classes
        $classes = Classe::all();
        $modules = Modules::all();

        // Retourner la vue avec les données nécessaires
        return view('Parametrage.Professeur.prof-module', compact('prof', 'affectations', 'classes', 'modules'));
    }




    public function delete($id)
    {
        $modules = Modules::find($id);
        $modules->delete();
        return redirect()->route('modules.index')->with('success', "Suppression effectué avec success");
    }
}
