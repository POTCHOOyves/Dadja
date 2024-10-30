<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Departement(){
        $Departement=DB::table('departements')->get();
        return view('Admin.departement',compact('Departement'));
    }

    public function Add_Departement(Request $request){
           $add=new Departement();
           $add->departement=$request->input('libelle');
           $add->descriptionDepartement=$request->input('description');
           //vérification du doublon
           $doublon=Departement::where('departement','=',$add->departement)->get();
           if($doublon->count()>0){
               return back()->with("error","Désolé, ce département existe déjà.");
           }else{
               $add->save();
               return back()->with("success","Département ajouté avec succès.");
           }
    }

    public function Update_Departement($id, Request $request){
        $add=Departement::find(decrypt($id));
        $add->departement=$request->input('libelle');
        $add->descriptionDepartement=$request->input('description');
        $add->etatDepartement=$request->input('etat');
        //vérification du doublon
        $doublon=Departement::where('departement','=',$add->departement)->get();
        if($doublon->count()>1){
            return back()->with("error","Désolé, ce département existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Département modifié avec succès.");
        }
    }

    public function delete_departement($id){
        Departement::destroy(decrypt($id));
        return back()->with("success","Département supprimé avec succès.");
    }

    public function Poste(){
        $Departement=Departement::OrderBy('id','desc')->get();
        $Poste=Poste::OrderBy('id','desc')->get();
        return view('Admin.poste',compact('Departement','Poste'));
    }

    public function Add_Poste(Request $request){
        $add=new Poste();
        $add->poste=$request->input('poste');
        $add->departement=$request->input('departement');
        $add->descriptionPoste=$request->input('description');
        $add->etatPoste=1;

        //vérification du doublon
        $Doubl=Poste::where('poste','=',$add->poste)->where('departement','=',$add->departement)
            ->get();
        if($Doubl->count()>0){
            return back()->with("error","Désolé, ce poste existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Poste ajouté avec succès.");
        }
    }

    public function Update_Poste($id, Request $request){
        $add=Poste::find(decrypt($id));
        $add->poste=$request->input('poste');
        $add->departement=$request->input('departement');
        $add->descriptionPoste=$request->input('description');
        $add->etatPoste=$request->input('etat');

        //vérification du doublon
        $Doubl=Poste::where('poste','=',$add->poste)->where('departement','=',$add->departement)
            ->get();
        if($Doubl->count()>1){
            return back()->with("error","Désolé, ce poste existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Poste modifié avec succès.");
        }
    }

    public function delete_poste($id){
        Poste::destroy(decrypt($id));
        return back()->with("success","Poste supprimé avec succès.");
    }

    public function Utilisateurs(){
        $Departement=Departement::OrderBy('id','desc')->get();
        $Poste=Poste::OrderBy('id','desc')->get();
        $User=User::OrderBy('id','desc')->get();
        return view('Admin.user',compact('Departement','Poste','User'));
    }

    public function delete_user($id){
        User::destroy(decrypt($id));
        return back()->with("success","Utilisateur supprimé avec succès.");
    }

    public function Add_User(Request $request){
        $add=new User();
        $add->nom=$request->input('nom');
        $add->prenom=$request->input('prenom');
        $add->poste=$request->input('poste');
        $add->contact=$request->input('contact');
        $add->typeUser=$request->input('type');
        $add->adresse=$request->input('adresse');
        $add->email=$request->input('email');
        $add->etat=1;
        $add->password=Hash::make("1234");
        //vérification du doubon
        $Db=User::where('nom','=',$add->nom)
            ->where('prenom','=',$add->prenom)
            ->get();

        $Email=User::where('email','=',$add->email)
            ->get();

        if($Db->count()>0 || $Email->count()>0){
            return back()->with("error","Désolé, ce utilisateur existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Utilisateur crée avec succès.");
        }
    }

    public function Update_User(Request $request,$id){
        $add=User::find(decrypt($id));
        $add->nom=$request->input('nom');
        $add->prenom=$request->input('prenom');
        $add->poste=$request->input('poste');
        $add->contact=$request->input('contact');
        $add->typeUser=$request->input('type');
        $add->adresse=$request->input('adresse');
        $add->email=$request->input('email');
        $add->etat=$request->input('etat');
        //vérification du doubon
        $Db=User::where('nom','=',$add->nom)
            ->where('prenom','=',$add->prenom)
            ->get();

        $Email=User::where('email','=',$add->email)
            ->get();

        if($Db->count()>1 || $Email->count()>1){
            return back()->with("error","Désolé, ce utilisateur existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Utilisateur modifié avec succès.");
        }
    }

    public function MonProfil(){
        $user=User::find(Auth::user()->getAuthIdentifier());
        return view('Admin.myprofil',compact('user'));
    }

    public function Modification_User(Request $request){
        $add=User::find(Auth::user()->getAuthIdentifier());
        $add->nom=$request->input('nom');
        $add->prenom=$request->input('prenom');
        $add->contact=$request->input('contact');
        $add->adresse=$request->input('adresse');
        //vérification du doubon
        $Db=User::where('nom','=',$add->nom)
            ->where('prenom','=',$add->prenom)
            ->get();

        $Email=User::where('email','=',$add->email)
            ->get();

        if($Db->count()>1 || $Email->count()>1){
            return back()->with("error","Echec d'enregistrement.");
        }else{
            $add->save();
            return back()->with("success","Modifications appliquées avec succès.");
        }
    }

    public function PasswordUpdate(Request $request){
        $pass1=$request->input('newpassword');
        $pass2=$request->input('renewpassword');
        if($pass1 == $pass2){
            $User=User::find(Auth::user()->getAuthIdentifier());
            $User->password=Hash::make($pass1);
            $User->save();
            Auth::logout();
            return redirect('login');
        }else{
            return back()->with("error","Désolé, les deux mots de passes ne sont pas conforment.");
        }
    }

    public function TableauBord(){
        return view('Dash.tb');
    }
}
