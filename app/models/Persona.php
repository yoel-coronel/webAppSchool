<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class Persona extends Model
{
    use SoftDeletes;
    const PERSONA_ACTIVO   = "ACTIVO";
    const PERSONA_INACTIVO = "DESACTIVADO";
    
    protected $fillable = [
        'numero_documento',
        'tipo_documento',
        'tipo_genero',
        'primer_nombre',
        'segundo_nombre',
        'tercer_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'correo_electronico',
        'ubigeo',
        'imagen',
        'nacionalidad',
        'estado'
    ];


    public function user(){

        return $this->hasOne(User::class);
    }
}
