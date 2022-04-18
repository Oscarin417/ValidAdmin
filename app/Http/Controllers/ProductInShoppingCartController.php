<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInShoppingCart;

class ProductInShoppingCartController extends Controller
{
    public function __construct(){
        //Llamamos al middleware, para tener acceso al contenido del carrito
        $this->middleware("shopping_cart");   
    }

    public function store(Request $request){
        
        $in_shopping_cart = ProductInShoppingCart::create([
            /*
            Se obtiene el id del carrito de compras,vía request 
            gracias al middleware creado anteriormente.
            */
            'shopping_cart_id'=> $request->shopping_cart->id,
            //Se obtiene id del producto por medio de un formulario.
            'product_id'=> $request->product_id
        ]);
        if($in_shopping_cart){
        /*
        Si la referencia del producto que se está agregando al carrito
        se realizó correctamente, redirigimos a la persona hacia la misma
        página por si desea agregar más de ese mismo producto.
        */
            return redirect()->back();
        }
        // Si no se logró guardar la referencia del product, redirigimos pero con un error.
       return redirect()->back()->withErrors(['product'=>'No se pudo agregar el producto']);
    }


    public function destroy($id){

    }
}
