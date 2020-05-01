<?php

namespace App\Http\Controllers\mantenimientos;

use App\models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class PersonaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numero_documento' => 'required|integer|unique:personas,numero_documento',
            'tipo_documento' => 'required|integer',
            'tipo_genero' => 'required|integer',
            'primer_nombre' => 'required|string|min:3',
            'segundo_nombre' => 'nullable|string|min:3',
            'tercer_nombre' => 'nullable|string|min:3',
            'primer_apellido' => 'required|string|min:3',
            'segundo_apellido' => 'required|string|min:3',
            'fecha_nacimiento' => 'required|date|date_format:Y-m-d|before:today',
            'correo_electronico' => 'required|email|unique:personas,correo_electronico',
            'ubigeo' => 'nullable|string',
            'nacionalidad' => 'nullable|string',
            'grado_academico' => 'nullable|integer',
            'parentesco' => 'nullable|integer',
            'codigo_matricula' => 'nullable|integer',
            'codigo_siagie' => 'nullable|string',
            'codigo_siagie' => 'nullable|string',
            'estado_academico' => 'nullable|string',
            'estado_matriculado' => 'nullable|string',
            'imagen' => 'nullable|mimes:jpg,png,jpeg|max:2048',

        ]);


        if($validator->fails()){
                return $this->errorResponse($validator->errors(),1,400);
        }

        if($request->hasFile('imagen')){

            $datos = $request->all();
            $datos['imagen'] = $request->imagen->store('');

        }

        Persona::create($datos);

        return $this->successResponseStatus("Registrado con exito.",0,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
