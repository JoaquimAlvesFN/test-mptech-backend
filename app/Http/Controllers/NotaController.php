<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Categorias;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();

        return response()->json($notas);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas = new Nota;

        $notas->titulo = $request->titulo;
        $notas->nota = $request->nota;
        $notas->categoria = $request->categoria;

        $notas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas = Nota::find($id);

        return response()->json($notas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notas = Nota::findOrFail($id);

        $this->validate($request, [
            'titulo',
            'nota',
            'categoria'
        ]);

        $input = $request->all();
        $notas->fill($input)->save();
        
        $notas->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas = Nota::find($id);

        $notas->delete();
    }

    public function categoria()
    {
        $categorias = Categorias::all();

        return response()->json($categorias);
    }
}
