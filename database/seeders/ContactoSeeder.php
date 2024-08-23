<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;


class ContactoSeeder extends Seeder
{
    public function run()
    {
        Contacto::factory()->count(5000)->create();
    }
}
