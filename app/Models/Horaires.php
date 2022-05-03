<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaires extends Model
{
    use HasFactory;

    protected $fillable = [
        'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'id_employes'
    ];

    //0-> absent toute la journée, 1-> absent matin, 2-> absent aprèm 3-> pas absent

    public function employes()
    {
        return $this->hasOne(Employes::class);
    }
}
