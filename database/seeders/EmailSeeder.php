<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Email;

class EmailSeeder extends Seeder
{
    public function run()
    {
        Email::factory()->count(5000)->create();
    }
}
