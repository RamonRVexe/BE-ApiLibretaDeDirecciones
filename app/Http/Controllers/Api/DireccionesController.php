<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contacto_id' => 'required|exists:contactos,id',
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

        $direccion = Direccion::create($validator->validated());

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
    public function show($id)
    {
        $direccion = Direccion::find($id);

        if (!$direccion) {
            $data = [
                'message' => 'Direccion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'direccion' => $direccion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direccion $direccion)
    {
        $direccion = Direccion::find($id);

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
    public function destroy($id)
    {
        $direccion = Direccion::find($id);

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
