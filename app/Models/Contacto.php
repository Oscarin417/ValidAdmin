<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    public $fillable = ['nombres','apellidos','email','mensaje'];

    public function url(){
        return $this->id ? 'admin.contactos.update': 'admin.contactos.store';
    }

    public function method(){
        return $this->id ? 'PUT': 'POST';
    }
}
