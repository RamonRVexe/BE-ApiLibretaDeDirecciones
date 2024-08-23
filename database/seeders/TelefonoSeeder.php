<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Telefono;


class TelefonoSeeder extends Seeder
{
    public function run()
    {
        Telefono::factory()->count(5000)->create();
    }
}
