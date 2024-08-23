<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    ## Obtiene todos los contactos de la base de datos
    public function index()
    {

        $contactos = Contacto::all();

        if($contactos->isEmpty()){
            $data = [
                'message' => 'No hay contactos registrados',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($contactos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'notas' => 'required|max:255',
            'fecha_cumpleanos' => 'required|date',
            'pagina_web' => 'required|max:255',
            'empresa' => 'required|max:255'
        ]);

        ##valida si no tiene ningun en los datos si tiene algun valor incorrecto te muestra el error
        if($validator->fails()){
            $data =[
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
        }

        $contacto = Contacto::create([
            'nombre' => $request->nombre,
            'notas' => $request->notas,
            'fecha_cumpleanos' => $request->fecha_cumpleanos,
            'pagina_web' => $request->pagina_web,
            'empresa' => $request->empresa
        ]);

        if(!$contacto){
            $data = [
                'message' => 'ERROR al crear el contacto',
                'status' => '500'
            ];

            return response()->json($data, 500);
        }

        $data = [
            'contacto' => $contacto,
            'status' => 201
        ];

        return response()->json($data, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);

        if(!$contacto){
            $data = [
                'message' => 'Contacto no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'contacto' => $contacto,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $reques, $id)
    {

        $contacto = Contacto::find($id);

        if(!$contacto){
            $data = [
                'message' => 'Contacto no encontrado',
                'status' => 404
            ];
        }
        
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'notas' => 'required|max:255',
            'fecha_cumpleanos' => 'required|date',
            'pagina_web' => 'required|max:255',
            'empresa' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $contacto->update($validator->validated());

        $data = [
            'message' => 'Contacto actualizado correctamente',
            'contacto' => $contacto,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            $data = [
                'message' => 'Contacto no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $contacto->delete();

        $data = [
            'message' => 'Contacto eliminado correctamente',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
