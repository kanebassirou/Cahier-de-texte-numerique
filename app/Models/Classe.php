<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    //Autorisation ciblé
    protected $fillable = ['libelleClasse'];

    //Autorisation globale (pas à utuliser en meme temps que l'autre), permet d'inserer sur toutes les colonnes de la base

    //protected $guarded = [];

}
