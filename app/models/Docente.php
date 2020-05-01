<?php

namespace App\models;

class Docente extends Persona
{
    
    protected $fillable = [
        'especialidad',
        'grado_academico'
    ];
}
