<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;

class ShoppingCartController extends Controller
{
    public function __construct(){
        //Obtenemos la sesión del carrito con el middelware
        $this->middleware('shopping_cart');
    }

    public function show(Request $request){
        //Devolvemos una vista con el contenido obtenido del middlewar
        return view('shopping_cart.show', ['shopping_cart'=>$request->shopping_cart]);
    }
    
    public function products(Request $request){
        //Devuelve un json con todos los productos según el id de sesión del carrito
        return new ProductsCollection($request->shopping_cart->products()->get());
    }
}
