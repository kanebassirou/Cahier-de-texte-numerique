<?php

namespace App\Http\Controllers;

use App\Models\Jours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //gérer les accès 
    }
    
    public function index(){

        $datas = Jours:: select ('id','libelleJours','created_at') 
                           ->orderBy('id','ASC')
                           -> paginate(10);    

       return view ('Parametrage.Jours.index',['jours' => $datas]);
  
    }

    public function edit (Request $request){
        

        $jours = Jours::find($request -> id);
        return view ('edit-jours-component',['jours' => $jours]);

     
    }

    public function update(Request $request){

        $request-> validate(['libelle' => 'required|min:3|max:120']);
       try {
            Jours::find($request -> id)->update([ 'libelleJours' =>$request ->input('libelle')]);
            return redirect()->route('jours.index') -> with('success',"Modification effectué avec success");
       } catch (\Throwable $th) {
            return redirect()->route('jours.index') -> with('danger',"Oups une erreur a été détecté");
       }
    }

    public function create(){
        return view ('add-jours-component');
    }

    public function save(Request $request){
        $request-> validate(['libelleJours' => 'required|min:3|max:120']);
        $libelle = $request -> input('libelleJours');

        Try{
            /**
             * Insert Data
             */
            Jours::create(['libelleJours' => $libelle]);
        }catch(\Throwable $th){
            /**
             * Redirect if error
             */
            return redirect()->route('jours.index') -> with('danger',"Oups une erreur a été détecté");
        }
    
        return redirect()->route('jours.index') -> with('success',"Enregistrement effectué avec success");
    }

    public function delete($id){
        $jours = Jours::find($id);
        $jours->delete();
        return redirect()->route('jours.index') -> with('success',"Suppression effectué avec success");
    }
}
