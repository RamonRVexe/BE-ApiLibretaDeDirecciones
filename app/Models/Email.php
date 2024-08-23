<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    use HasFactory;

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
