<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\TraitSubirArchivo;
use Illuminate\Support\Str;
use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller
{
    use TraitSubirArchivo;
    public function __construct(){
        // $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(5);
        if($request->wantsJson()){
            return new ProductsCollection($products);
        }
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('products.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->title = $request->get('title');
        $products->price = $request->get('price');
        $products->description = $request->get('description');
        if($request->has('image_url')){
            $image_url = $request->file('image_url');
            $nombreImagen = Str::random(15);
            $folder = 'portadas';
            $imagenCargada = $this->subirArchivo($image_url, $folder, 'public', $nombreImagen);
            $products->image_url = $imagenCargada;
        }
        $products->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit")->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product = new Product();
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        if($request->has('image_url')){
            $image_url = $request->file('image_url');
            $nombreImagen = Str::random(15);
            $folder = 'portadas';
            $imagenCargada = $this->subirArchivo($image_url, $folder, 'public', $nombreImagen);
            $product->image_url = $imagenCargada;
        }
        $product->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/productos');
    }
}
