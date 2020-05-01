<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'nivel_id'
    ];
}
