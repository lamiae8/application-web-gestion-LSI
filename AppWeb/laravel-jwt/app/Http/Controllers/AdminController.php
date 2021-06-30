<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Prof;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\http\Resources\etuList;
use App\Http\Controllers\AuthController;
use Illuminate\Support\facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        return etuList::collection(Etudiant::all());
    }


    public function addUser(Request $request){
            $new_user =app('App\Http\Controllers\AuthController')->register($request) ;

            $id=(collect($new_user)->toArray())['original']['user']['id'];

            if($request['role']=='etudiant'){
            Etudiant::create([
                'cne'=>$request['cne'],
                'semester_id'=>$request['semester_id'],
                'user_id'=>$id,
            ]);
            }
            else if($request['role']=='prof'){
                  Prof::create([
                    'user_id'=>$id,
                    'cni'=>$request['cni'],
                  ]);

              }
            //   else {return "role invalide ,tapez prof ou etudiant";}


            return $new_user;
            }
    public function showEtu(){
         return DB::table('users')
         ->join('etudiants', 'users.id', "=", 'etudiants.user_id')
            ->get(['name', 'email','cne','etudiants.id']);
    }

    public function getOneEtu($id){
        return DB::table('users')
        ->join('etudiants', 'users.id', "=", 'etudiants.user_id')
        ->where('etudiants.id','=',$id)
        ->get(['name', 'email','cne']);

   }

    public function deleteEtu($id)
    {
        //$user= new Etudiant();
        $etu = Etudiant::findOrFail($id);
        $user= User::findOrFail($etu->user_id);
        $user->delete();
    }
    public function updateEtu($id,Request $request){

        $etu=Etudiant::findOrFail($id);
        $etu->cne=$request->cne;
        $etu->semester_id=$request->semester_id;
        $etu->save();
        $new_user =app('App\Http\Controllers\AuthController')->update($etu->user_id,$request) ;
    }


    public function showPro(){
        return DB::table('users')
        ->join('profs', 'users.id', "=", 'profs.user_id')
           ->get(['name', 'email','cni','profs.id']);
   }
   public function deletePro($id)
   {
       //$user= new Etudiant();
       $etu = Prof::findOrFail($id);
       $user= User::findOrFail($etu->user_id);
       $user->delete();
   }
   public function updatePro($id,Request $request){

       $pro=Prof::findOrFail($id);
       $pro->cni=$request->cni;
       $pro->save();
       $new_user =app('App\Http\Controllers\AuthController')->update($pro->user_id,$request) ;
   }



//*********module ******* */

    public function showMod(){
        return DB::table('modules')
        ->join('profs', 'profs.id', "=", 'modules.profs_id')
        ->join('semester', 'semester.id', "=", 'modules.semester_id')
        ->get(['profs.name','modules.name', 'semester.name','profs.id']);
    }

    public function addModule(Request $request){
        Module::create([
        'name'=>$request['name'],
        'nbr_heure'=>$request['nbr_heure'],
        'semester_id'=>$request['semester_id'],
        'prof_id'=>$request['prof_id'],
        ]);
    }

        public function updateModule($id,Request $request){

            $mdl=Module::findOrFail($id);
            $mdl->name=$request->name;
            $mdl->nbr_heure=$request->nbr_heure;
            $mdl->prof_id=$request->prof_id;
            $mdl->semester_id=$request->semester_id;
            $mdl->save();
        }

        public function deleteModule($id)
        {
            $mdl = Module::find($id);
            $mdl->delete();

            return response()->json('Module deleted!');
        }
        //******notes** */

        public function addNote(Request $request){
        Note::create([
        'note_val'=>$request['note'],
        'etu_id'=>$request['etu_id'],
        'module_id'=>$request['module_id'],

        ]);
        }

        public function updateNote($id,Request $request){

        $note=Note::findOrFail($id);
        $note->note_val=$request->note;
        $note->module_id=$request->module_id;
        $note->etu_id=$request->etu_id;
        $note->save();

        }
        public function deleteNote($id)
        {
        $note = Note::find($id);
        $note->delete();

        return response()->json('Module deleted!');
        }

}
