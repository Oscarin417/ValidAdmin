<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    public $fillable = ['pregunta'];

    public function url(){
        return $this->id ? 'admin.faqs.update': 'admin.faqs.store';
    }

    public function method(){
        return $this->id ? 'PUT': 'POST';
    }
}
