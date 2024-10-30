<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    static function GetCourrierEntrant(){
        $Courrier=Courrier::where('reception','=',"Entrant")->get();
        return $Courrier->count();
    }

    static function GetCourrierSortant(){
        $Courrier=Courrier::where('reception','=',"Sortant")->get();
        return $Courrier->count();
    }

    static function GetCourrierClasse(){
        $Courrier=Courrier::where('traitement','=',1)->get();
        return $Courrier->count();
    }
}
