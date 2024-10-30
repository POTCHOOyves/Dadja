<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    static function GetPoste(){
        $Poste=Poste::all();
        return $Poste->count();
    }
}
