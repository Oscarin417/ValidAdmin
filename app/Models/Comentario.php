<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public $fillable = ['nombres', 'apellidos', 'comentario'];

    public function url(){
        return $this->id ? 'admin.comentarios.update': 'admin.comentarios.store';
    }

    public function method(){
        return $this->id ? 'PUT': 'POST';
    }
}
