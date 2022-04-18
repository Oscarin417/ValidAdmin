<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;


class ComentarioController extends Controller
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
        $comentarios = Comentario::paginate(5);
        return view('admin.comentarios.index')->with('comentarios', $comentarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comentario = new Comentario();
        return view('admin.comentarios.create', compact('comentario'));
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
            'comentario'=>$request->comentario
        ];
        if(Comentario::create($options)){
            return redirect('/coments');
        }else{
            return view('admin.comentarios.create', compact('comentarios'));
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
        $comentario = Comentario::find($id);
        return view('admin.comentarios.edit')->with('comentarios', $comentario);
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
        $comentario = Comentario::find($id);
        $comentario->nombres = $request->get('nombres');
        $comentario->apellidos = $request->get('apellidos');
        $comentario->comentarios = $request->get('comentario');
        $comentario->save();

        return redirect('/coments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentario::destroy($id);
        return redirect('/coments');
    }
}
