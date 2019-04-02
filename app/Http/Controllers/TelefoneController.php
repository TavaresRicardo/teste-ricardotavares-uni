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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view("cadastrartelefone", compact('clientes'));
    }
    
    public function createid(Request $request, $id)
    {
        $r = new Request();
        
        //
    }
    
    public function incluir($id)
    {
        $client = Cliente::find($id);
        $telefones = Telefone::all();
        return view ('adctelcliente', compact('client', 'telefones'));
        
        //
    }

    public function storenew(Request $request)
    {
        $regras = [ 
            'numero' => 'required|min:14|max:15',
            'idcliente' => 'required'
        ];
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'numero.min' => 'É necessário no mínimo 14 caracteres para o telefone. Ex.: (11)  8901-1234.',
            'numero.max' => 'É aceitavel no máximo 15 caracteres para o telefone. Ex.: (11) 98901-1234.'
        ];
        $request->validate($regras, $mensagens);
        
        $tel = new Telefone();
        $tel->numero = $request->numero; 
        $tel->principal = $request->radios; 
        $tel->cliente_id = $request->idcliente;
        $tel->save();
        
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        return view("listartelefones", compact('clientes', 'telefones'));
       
    }
    
    public function store(Request $request, $idc)
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
        $tel = new Telefone();
        $tel->numero = $request->numero; 
        $tel->principal = $request->radios; 
        $tel->cliente_id = $idc;
        $tel->save();
        
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        return view("listarclientes", compact('clientes', 'telefones'));
       
    }
    
    public function storeid(Request $request, $idc) 
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
        $tel = new Telefone();
        $tel->numero = $request->numero; 
        $tel->principal = $request->radios; 
        $tel->cliente_id = $idc;
        $tel->save();
        $telefones = Telefone::all();
        $client = Cliente::find($idc);
        return view ('adctelclient', compact('client', 'telefones'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        return view("listartelefones", compact('clientes', 'telefones'));
        
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
        return view ('editartelefone', compact('telefone'));
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
        $tel->principal = $request->radios; 
        $tel->save();
        
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        return redirect('/telefones/listar');
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
