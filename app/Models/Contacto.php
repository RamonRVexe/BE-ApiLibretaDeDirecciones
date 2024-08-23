<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    use HasFactory;

    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }
}
