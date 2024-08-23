<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $direcciones = Direccion::all();

        if ($direcciones->isEmpty()) {
            $data = [
                'message' => 'No hay direcciones registradas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($direcciones, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $contactoId)
    {
        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:255',
            'ciudad' => 'nullable|max:255',
            'estado' => 'nullable|max:255',
            'codigo_postal' => 'nullable|max:20',
            'pais' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $contacto = Contacto::find($contactoId);

        if (!$contacto) {
            return response()->json([
                'message' => 'Contacto no encontrado',
                'status' => 404
            ], 404);
        }

        $direccion = Direccion::create([
            'contacto_id' => $contacto->id,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'codigo_postal' =>$request->codigo_postal,
            'pais' => $request->pais
        ]);

        $data = [
            'direccion' => $direccion,
            'message' => 'Direccion creada correctamente',
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($contactoId)
    {

        $contacto = Contacto::find($contactoId);

        if (!$contacto) {
            $data = [
                'message' => 'Contacto no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $direcciones = $contacto->direcciones;

       if ($direcciones->isEmpty()) {
            return response()->json([
                'message' => 'No hay correos electrónicos registrados para este contacto',
                'status' => 200
            ], 200);
        }

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $contactoId, $direccionId)
    {
        $direccion = Direccion::where('id', $direccionId)->where('contacto_id', $contactoId)->first();

        if (!$direccion) {
            $data = [
                'message' => 'Dirección no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:255',
            'ciudad' => 'nullable|max:255',
            'estado' => 'nullable|max:255',
            'codigo_postal' => 'nullable|max:20',
            'pais' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $direccion->update($validator->validated());

        $data = [
            'message' => 'Direccion actualizada correctamente',
            'direccion' => $direccion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contactoId, $direccionId)
    {
        $direccion = Direccion::where('id', $direccionId)->where('contacto_id',$contactoId)->frist();

        if (!$direccion) {
            $data = [
                'message' => 'Direccion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $direccion->delete();

        $data = [
            'message' => 'Dirección eliminada correctamente',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
