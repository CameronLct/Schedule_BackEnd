<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;

    protected $fillable = [
        'adresse_mail', 'nom', 'prenom'
    ];

    public function horaire()
    {
        return $this->hasOne(Horaire::class);
    }
}
