<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function __construct(){
        // $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::paginate(6);
        return view('admin.contactos.index')->with('contactos', $contactos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto();
        return view('admin.contactos.create',compact('contacto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = [
            'nombres'=>$request->nombres,
            'apellidos'=>$request->apellidos,
            'email'=>$request->email,
            'mensaje'=>$request->mensaje
        ];
        if(Contacto::create($options)){
            return redirect('/contacts');
        }else{
            return view('admin.contactos.create', compact('contactos'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        return view("admin.contactos.edit")->with('contacto', $contacto);
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
        $contacto = Contacto::find($id);
        $contacto->nombres = $request->get('nombre');
        $contacto->apellidos = $request->get('apellidos');
        $contacto->email = $request->get('email');
        $contacto->mensaje = $request->get('mensaje');
        $contacto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect('/contacts');
    }
}
