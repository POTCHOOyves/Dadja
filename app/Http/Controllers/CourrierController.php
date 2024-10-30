<?php

namespace App\Http\Controllers;

use App\Models\Bordereau;
use App\Models\Courrier;
use App\Models\Departement;
use App\Models\Typecourrier;
use App\Models\User;
use App\Models\Voiestransmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourrierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TypeCourrier(){
        $Type=Typecourrier::OrderBy('id','desc')->get();
        return view('Courrier.type',compact('Type'));
    }

    public function Add_Courrier(Request $request){
        $add=new Typecourrier();
        $add->typeCourrier=$request->input('type');
        $add->descriptionCourrier=$request->input('description');
        $add->etatCourrier=1;

        //vérification du doublon
        $Doubl=Typecourrier::where('typeCourrier','=',$add->typeCourrier)
            ->get();

        if($Doubl->count()>0){
            return back()->with("error","Désolé, ce type de courrier existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Type de courrier $add->typeCourrier ajouté avec succès.");
        }
    }

    public function Update_Courrier(Request $request,$id){
        $add=Typecourrier::find(decrypt($id));
        $add->typeCourrier=$request->input('type');
        $add->descriptionCourrier=$request->input('description');
        $add->etatCourrier=$request->input('etat');

        //vérification du doublon
        $Doubl=Typecourrier::where('typeCourrier','=',$add->typeCourrier)
            ->get();

        if($Doubl->count()>1){
            return back()->with("error","Désolé, ce type de courrier existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Type de courrier $add->typeCourrier ajouté avec succès.");
        }
    }

    public function delete_typecourrier($id){
        Typecourrier::destroy(decrypt($id));
        return back()->with("success","Type de courrier supprimé avec succès.");
    }

    public function VoieTransmission(){
        $Vt=Voiestransmission::OrderBy('id','desc')
            ->get();
        return view('Courrier.voie',compact('Vt'));
    }

    public function Add_VoieTransmission(Request $request){
            $add=new Voiestransmission();
            $add->voietransmission=$request->input('voie');
            $add->descriptionVt=$request->input('description');
            $add->etatVt=1;
            //vérification du doublon
            $Db=Voiestransmission::where('voietransmission','=',$add->voietransmission)
                ->get();
            if($Db->count()>0){
                return back()->with("error","Désolé, cette voie de transmission existe déjà.");
            }else{
                $add->save();
                return back()->with("success","Voie de transmission ajouté avec succès.");
            }
    }

    public function Update_VoieTransmission(Request $request,$id){
        $add=Voiestransmission::find(decrypt($id));
        $add->voietransmission=$request->input('voie');
        $add->descriptionVt=$request->input('description');
        $add->etatVt=$request->input('etat');
        //vérification du doublon
        $Db=Voiestransmission::where('voietransmission','=',$add->voietransmission)
            ->get();
        if($Db->count()>1){
            return back()->with("error","Désolé, cette voie de transmission existe déjà.");
        }else{
            $add->save();
            return back()->with("success","Voie de transmission ajouté avec succès.");
        }
    }

    public function delete_voiet($id){
        Voiestransmission::destroy(decrypt($id));
        return back()->with("success","Voie de transmission supprimé avec succès.");
    }

    public function Courriers_Entrants(){
        $Voietransaction=Voiestransmission::OrderBy('id','desc')->get();
        $TypeCourrier=Typecourrier::OrderBy('id','desc')->get();
        $Courrier=Courrier::OrderBy('id','desc')->get();
        $User=User::where('etat','=',1)->get();
        return view('Courrier.entrant',compact('TypeCourrier','Voietransaction','Courrier','User'));
    }

    public function AddCourrier(Request $request){
        $add=new Courrier();
        $add->courtier=$request->input('courtier');
        $add->idVoieTrans=$request->input('voie');
        $add->idTypeCourrier=$request->input('typeCourrier');
        $add->numero=$request->input('numero');
        $add->contenu=$request->input('contenu');
        $add->objet=$request->input('objet');
        $add->heureEnregistrement=date('H:m');
        $add->dateEnvoi=$request->input('reception');
        $add->dateEnregistrement=date('Y-m-d');
        $add->idCharge=Auth::user()->getAuthIdentifier();
        $add->traitement=0;
        $add->destinataire=$request->input('destinataire');
        $add->groupe=$request->input('groupe');

        $add->nombreColis=$request->input('nbreColis');
        $add->poids=$request->input('poids');
        $add->frais=$request->input('frais');
        $add->reception=$request->input('reception');

        //Importation des pièces jointes
        if($request->file('files')){
            $path="upload";
            $file=$request->file('files');
            $extension=$request->file('files')->getClientOriginalExtension();
            $nomFichier=rand(1111,9999).'.'.$extension;
            $file->move($path,$nomFichier);
            $add->piece_jointe="$path/$nomFichier";
        }
        //
        $add->save();

        return back()->with("success","Courrier enrégistré avec succès.");
    }

    public function Courriers_Groupes(){
        $Voietransaction=Voiestransmission::OrderBy('id','desc')->get();
        $TypeCourrier=Typecourrier::OrderBy('id','desc')->get();
        $Courrier=Courrier::OrderBy('id','desc')->get();
        $User=Departement::where('etatDepartement','=',1)->get();
        return view('Courrier.groupe',compact('TypeCourrier','Voietransaction','Courrier','User'));
    }

    public function Bordereau_Entrants(){
        $Courrier=Courrier::OrderBy('id','desc')->get();
        return view('Courrier.bordereau',compact('Courrier'));
    }

    public function MesCourriers(){
        $Courrier=Courrier::OrderBy('id','desc')
            ->where('destinataire','=',Auth::user()->getAuthIdentifier())
            ->where('traitement','=',1)
            ->get();
        return view('Courrier.mycourrier',compact('Courrier'));
    }

    public function Add_Bordereau(Request $request){
           $add=new Bordereau();
           $add->matriculeBordereau=$request->input('bordereau');
           $add->idCourrier=$request->input('courrier');
           $add->nombreColis=$request->input('colis');
           $add->statut=1;
           $add->commentaire=$request->input('commentaire');
           $add->poids=$request->input('poids');
           $add->frais=$request->input('frais');
           $add->idCharge=Auth::user()->getAuthIdentifier();
           $add->save();
           //changement etat du courrier
           $Courrier=Courrier::find($add->idCourrier);
           $Courrier->traitement=1;
           $Courrier->save();

        return back()->with("success","Bordereau enrégistré avec succès.");
    }

    public function delete_courrier($id){
        Courrier::destroy(decrypt($id));
        return back()->with("success","Courrier supprimé avec succès.");
    }

    public function details_courrier($id){
        $Courrier=Courrier::find(decrypt($id));
        return view('Courrier.detail',compact('Courrier'));
    }

    public function Validation_Transmission($id){
        $Courrier=Courrier::findORFail(decrypt($id));
        $Courrier->traitement=1;
        $Courrier->save();
        return back()->with("success","Courrier valider avec succès avec succès.");
    }

    public function MailBox(){
        $User=User::OrderBy('nom','asc')
            ->where('etat','=',1)
            ->get();

        $Dep=Departement::OrderBy('departement','asc')
            ->where('etatDepartement','=',1)
            ->get();

        $Mail=Courrier::where('destinataire','=',Auth::user()->getAuthIdentifier())
            ->OrderBy('id','desc')
            ->where('virtuel','=',1)
            ->get();

        return view('MailBox.list',compact('User','Dep','Mail'));
    }

    public function SendBox(){
        $User=User::OrderBy('nom','asc')
            ->where('etat','=',1)
            ->get();

        $Dep=Departement::OrderBy('departement','asc')
            ->where('etatDepartement','=',1)
            ->get();

        $Mail=Courrier::where('idCharge','=',Auth::user()->getAuthIdentifier())
            ->OrderBy('id','desc')
            ->where('virtuel','=',1)
            ->get();

        return view('MailBox.send',compact('User','Dep','Mail'));
    }

    public function SendMail(Request $request){
        $Sender=User::findOrFail(Auth::user()->getAuthIdentifier());
        $add=new Courrier();
        $add->courtier="$Sender->nom $Sender->prenom";
        $add->contenu=$request->input('message');
        $add->objet=$request->input('objet');
        $add->heureEnregistrement=date('H:m');
        $add->dateEnvoi=date('Y-m-d');
        $add->dateEnregistrement=date('Y-m-d');
        $add->idCharge=Auth::user()->getAuthIdentifier();
        $add->traitement=1;
        $add->destinataire=$request->input('destinataire');
        $add->groupe=$request->input('groupe');

        $add->nombreColis=0;
        $add->poids=0;
        $add->frais=0;
        $add->virtuel=1;
        $add->reception="courrier electronique";

        //Importation des pièces jointes
        if($request->file('fichier')){
            $path="upload";
            $file=$request->file('fichier');
            $extension=$request->file('fichier')->getClientOriginalExtension();
            $nomFichier=rand(1111,9999).'.'.$extension;
            $file->move($path,$nomFichier);
            $add->piece_jointe="$path/$nomFichier";
        }
        //
        $add->save();

        return back()->with("success","Courrier électronique envoyé avec succès.");
    }

    public function SendCourrier(){
        $User=User::OrderBy('nom','asc')
            ->where('etat','=',1)
            ->get();

        $Dep=Departement::OrderBy('departement','asc')
            ->where('etatDepartement','=',1)
            ->get();

         return view('MailBox.add',compact('User','Dep'));
    }
}


