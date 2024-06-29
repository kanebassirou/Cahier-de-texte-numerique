<?php

// Affectation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'module_id', 'classe_id', 'quantum'];
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
