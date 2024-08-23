<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Telefono;
use App\Models\Contacto;



class TelefonoSeeder extends Seeder
{
    public function run()
    {
          // Obtener todos los contactos
          $contactos = Contacto::all();

          // Verificar que hay contactos disponibles
          if ($contactos->isNotEmpty()) {
              foreach ($contactos as $contacto) {
                  // Crear 2 direcciones para cada contacto
                  Telefono::factory()->count(2)->create([
                      'contacto_id' => $contacto->id,
                  ]);
              }
          }
    }
}
