<?php

namespace App\Http\Controllers;

use App\Models\CahierTexte;
use Illuminate\Http\Request;

class CahierTexteController extends Controller
{
    //

    public function index()
    {
        // Récupérer les cahiers de texte depuis la base de données
        $cahierTextes = CahierTexte::paginate(10); // Utilisation de la pagination

        // Passer les données à la vue
        return view('Parametrage.Cahier-text.index', compact('cahierTextes'));
    }

    // public function create()
    // {
    //     return view('add-cahierText-component');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'cours' => 'required|string|max:255',
            'heure' => 'required|date_format:H:i',
            'jour' => 'required|date_format:Y-m-d',
            // 'coutenuCour' => 'required|string'
        ]);

        CahierTexte::create($request->all());

        return redirect()->route('cahier-de-texte.index')->with('success', 'vous avez  renseigner le formulaire avec succées.');
    }

    public function edit($id)
    {
        // Trouver l'entrée du cahier de texte
        $cahierTexte = CahierTexte::findOrFail($id);

        // Retourner la vue d'édition avec les données nécessaires
        return view('Parametrage.Cahier-text.edit', compact('cahierTexte'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'cours' => 'required|string|max:255',
            'heure' => 'required',
            'jour' => 'required|date',
        ]);

        try {
            // Trouver l'entrée du cahier de texte et mettre à jour les données
            $cahierTexte = CahierTexte::findOrFail($id);
            $cahierTexte->update([
                'cours' => $request->cours,
                'heure' => $request->heure,
                'jour' => $request->jour,
            ]);

            // Redirection avec message de succès
            return redirect()->route('cahier-de-texte.index')->with('success', 'Cahier de texte mis à jour avec succès.');
        } catch (\Throwable $th) {
            // Gestion des erreurs avec message de redirection
            return redirect()->route('cahier-de-texte.index')->with('danger', "Oups, une erreur a été détectée");
        }
    }


    public function destroy($id)
    {
        // Trouver l'entrée du cahier de texte et supprimer
        $cahierTexte = CahierTexte::findOrFail($id);
        $cahierTexte->delete();

        // Redirection avec message de succès
        return redirect()->route('cahier-de-texte.index')->with('success', 'Cahier de texte supprimé avec succès.');
    }
}
