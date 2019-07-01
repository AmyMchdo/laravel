<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;

class ControladorImovel extends Controller
{
    public function indexView()
    {
        return view('imoveis');
    }
    
    public function index()
    {
        $imovs = Imovel::all();
        return $imovs->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imov = new Imovel();
        $imov->nome = $request->input('nome');
        $imov->preco = $request->input('preco');
        $imov->estoque = $request->input('estoque');
        $imov->categoria_id = $request->input('categoria_id');
        $imov->save();
        return json_encode($imov);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imov = Imovel::find($id);
        if (isset($imov)) {
            return json_encode($imov);            
        }
        return response('Imovel não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $imov = Imovel::find($id);
        if (isset($imov)) {
            $imov->nome = $request->input('nome');
            $imov->preco = $request->input('preco');
            $imov->estoque = $request->input('estoque');
            $imov->categoria_id = $request->input('categoria_id');
            $imov->save();
            return json_encode($imov);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imov = Imovel::find($id);
        if (isset($imov)) {
            $imov->delete();
            return response('OK', 200);
        }
        return response('Produto não encontrado', 404);
    }
}


















