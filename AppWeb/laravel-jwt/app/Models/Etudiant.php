<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table='etudiants';
    protected $fillable =[
        'cne',
        'semester_id',
        'user_id',
    ];

    use HasFactory;
}
