<?php

namespace App\Http\Controllers;

use App\Telefone;
use App\Cliente;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefones = Telefone::all();
        return $telefones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( view()->exists('api.telefones.create')){
            return view("api.telefones.create");
        }else{
            return view('app');
        }
    }

    public function store(Request $request)
    {
        $regras = [
            'numero' => 'required|min:14|max:15',
            'cliente_id' => 'required'
        ];
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'numero.min' => 'É necessário no mínimo 14 caracteres para o telefone. Ex.: (11)  8901-1234.',
            'numero.max' => 'É aceitavel no máximo 15 caracteres para o telefone. Ex.: (11) 98901-1234.'
        ];
        $request->validate($regras, $mensagens);

        $tel = new Telefone();
        $tel->numero = $request->numero;
        $tel->principal = $request->principal;
        $tel->cliente_id = $request->cliente_id;
        $tel->save();

        return ['status'=>true,"conteudos"=>$tel];

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $telefone = Telefone::find($id);
        return $telefone;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefone = Telefone::find($id);
        return view ('api.telefone.edit', compact('telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'numero' => 'required|min:14|max:15'
        ];
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'numero.min' => 'É necessário no mínimo 14 caracteres para o telefone. Ex.: (11)  8901-1234.',
            'numero.max' => 'É aceitavel no máximo 15 caracteres para o telefone. Ex.: (11) 98901-1234.',
        ];
        $request->validate($regras, $mensagens);


        // Buscando o cliente para atualizar pelo ID
        $tel = Telefone::find($id);

        $tel->numero = $request->numero;
        $tel->principal = $request->principal;
        $tel->save();
        return ['status'=>true,"conteudos"=>$tel];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telefone = Telefone::find($id);
        $telefone->delete();
        return redirect('/telefones/listar');
    }
}
