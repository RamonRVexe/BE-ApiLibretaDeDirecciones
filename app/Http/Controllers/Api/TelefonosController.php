<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Telefono;
use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Validator;


class TelefonosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telefono = Telefono::all();

        if($telefono->isEmpty()){
            $data = [
                'message' => 'No hay telefonos Registrados',
                'status' => 404
            ];

            return response()->json($data, 200);
        }

        return response()->json($telefono, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $contactoId)
    {
        $validator = Validator::make($request->all(), [
            'numero' => 'required|max:255',
            'tipo' => 'nullable|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $contacto = Contacto::find($contactoId);

        if (!$contacto) {
            return response()->json([
                'message' => 'Contacto no encontrado',
                'status' => 404
            ], 404);
        }

        $telefono = Telefono::create([
            'contacto_id' => $contacto->id,
            'numero' => $request->numero,
            'tipo' => $request->tipo,
        ]);

        return response()->json([
            'telefono' => $telefono,
            'status' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($contactoId)
    {
        $contacto = Contacto::find($contactoId);

        if (!$contacto) {
            return response()->json([
                'message' => 'Contacto no encontrado',
                'status' => 404
            ], 404);
        }

        $telefonos = $contacto->telefonos;

        if ($telefonos->isEmpty()) {
            return response()->json([
                'message' => 'No hay teléfonos registrados para este contacto',
                'status' => 200
            ], 200);
        }

        return response()->json($telefonos, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $contactoId, $telefonoId)
    {
        $telefono = Telefono::where('id', $telefonoId)->where('contacto_id', $contactoId)->first();

        if (!$telefono) {
            return response()->json([
                'message' => 'Teléfono no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'numero' => 'required|max:255',
            'tipo' => 'nullable|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $telefono->update($validator->validated());

        return response()->json([
            'message' => 'Teléfono actualizado correctamente',
            'telefono' => $telefono,
            'status' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contactoId, $telefonoId)
    {
        $telefono = Telefono::where('id', $telefonoId)->where('contacto_id', $contactoId)->first();

        if (!$telefono) {
            return response()->json([
                'message' => 'Teléfono no encontrado',
                'status' => 404
            ], 404);
        }

        $telefono->delete();

        return response()->json([
            'message' => 'Teléfono eliminado correctamente',
            'status' => 200
        ], 200);
    }
}
