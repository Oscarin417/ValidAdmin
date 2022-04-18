<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    //Método para controlar las sesiones del carrito de compras
    public static function findOrCreateById($shopping_cart_id){
        if($shopping_cart_id){
            /*
            Si ya existe una sesión en ese dispositivo la obtiene
            y devuelve el id de esa sesión 
            */
            return ShoppingCart::find($shopping_cart_id);
        }else{
            //Si la sesión no existe la crea
            return ShoppingCart::create();

        }
    }
    //Método que obtiene la relación de la tabla muchos a muchos
    public function products(){
        return $this->belongsToMany('App\Models\Product', 'product_in_shopping_carts');
    }

     //Una vez obtenida la relación este método cuenta los registros
    public function productsCount(){
        return $this->products()->count();  
      }
}
