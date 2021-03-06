<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['title','image_url','description','price'];

    public function url(){
        return $this->id ? 'admin.products.update': 'admin.products.store';
    }

    public function method(){
        return $this->id ? 'PUT': 'POST';
    }
}
