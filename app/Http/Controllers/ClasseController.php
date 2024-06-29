<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;


class ClasseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //gérer les accès 
    }
    
    /**
     * afficher la liste des classes 
     */
    public function index(){

       /** $classes = DB :: table('classes')->select ('id','libelleClasse','created_at') -> get(); */ 
        /**
     * les deux requetes se valent en haut : QUery Builder et lautre Eloquents 
     */
        $datas = Classe :: select ('id','libelleClasse','created_at') 
                           ->orderBy('id','DESC')
                           -> get();    

        return view ('classe-component',['classes' => $datas]);
  
    }

    /**
     * Recuperer la classe editer et mettre les informations dans le formulaire 
     */
    public function edit (Request $request){
        //dd($request -> id);

        $classe = Classe::find($request -> id);
        return view ('edit-classe-component',['classe' => $classe]);

        //dd($classe);
        //$post = Classe::where('id',$request -> id)->first();   
    }

    public function update(Request $request){

        $request-> validate(['libelle' => 'required|min:3|max:120']);
       try {
            Classe::find($request -> id)->update([ 'libelleClasse' =>$request ->input('libelle')]);
            return redirect()->route('courses.index') -> with('success',"Modification effectué avec success");
       } catch (\Throwable $th) {
            return redirect()->route('courses.index') -> with('danger',"Oups une erreur a été détecté");
       }
    }
    /**
     * formulaire d'ajout des classes 
     */
    public function create(){
        return view ('add-classe-component');
    }

    public function save(Request $request){
        $request-> validate(['libelle' => 'required|min:3|max:120']);
        $libelle = $request -> input('libelle');

        Try{
            /**
             * Insert Data
             */
            Classe::create(['libelleClasse' => $libelle]);
        }catch(\Throwable $th){
            /**
             * Redirect if error
             */
            return redirect()->route('courses.index') -> with('danger',"Oups une erreur a été détecté");
        }
    
        return redirect()->route('courses.index') -> with('success',"Enregistrement effectué avec success");
    }

    public function delete($id){
        $classe = Classe::find($id);
        $classe->delete();
        return redirect()->route('courses.index') -> with('success',"Suppression effectué avec success");
    }
}
