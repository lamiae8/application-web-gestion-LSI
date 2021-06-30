<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $fillable =[
        'user_id',
        'cni',
    ];
    use HasFactory;
}
