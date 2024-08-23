<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Email::all();

        if ($email ->isEmpty()) {
            $data = [
                'message' => 'No hay email registrados',
                'status' => 404
            ];

            return response()->json($data, 200);
        }

        return response()->json($email, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $contactoId)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
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

        $email = Email::create([
            'contacto_id' => $contacto->id,
            'email' => $request->email,
            'tipo' => $request->tipo,
        ]);

        return response()->json([
            'email' => $email,
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

        $emails = $contacto->emails;

        if ($emails->isEmpty()) {
            return response()->json([
                'message' => 'No hay correos electrónicos registrados para este contacto',
                'status' => 200
            ], 200);
        }

        return response()->json($emails, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $contactoId, $emailId)
    {
        $email = Email::where('id', $emailId)->where('contacto_id', $contactoId)->first();

        if (!$email) {
            return response()->json([
                'message' => 'Correo electrónico no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'tipo' => 'nullable|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $email->update($validator->validated());

        return response()->json([
            'message' => 'Correo electrónico actualizado correctamente',
            'email' => $email,
            'status' => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contactoId, $emailId)
    {
        $email = Email::where('id', $emailId)->where('contacto_id', $contactoId)->first();

        if (!$email) {
            return response()->json([
                'message' => 'Correo electrónico no encontrado',
                'status' => 404
            ], 404);
        }

        $email->delete();

        return response()->json([
            'message' => 'Correo electrónico eliminado correctamente',
            'status' => 200
        ], 200);
    }
}
