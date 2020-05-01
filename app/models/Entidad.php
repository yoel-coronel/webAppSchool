<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'criterio',
        'secuencia',
        'nombre'
    ];

    public static function  GenerateKeySecuencia($criterio){

    	$entodad =  Entidad::where('criterio',$criterio)->get();

    	if ($entodad->max('secuencia') !="")
    	{
    		return $entodad->max('secuencia') + 1;
    	}
    	return 1;
    }
}
