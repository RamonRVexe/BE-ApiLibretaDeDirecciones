<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';

    use HasFactory;

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
