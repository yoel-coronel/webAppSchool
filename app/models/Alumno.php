<?php

namespace App\models;

class Alumno extends Persona
{
    
    protected $fillable = [
        'codigo_matricula',
        'codigo_siagie',
        'estado_academico',
        'estado_matriculado'
    ];
}
