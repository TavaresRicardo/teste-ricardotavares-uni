<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Telefone;
use Illuminate\Http\Request;
use DB;

class ClienteController extends Controller
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
        if( view()->exists('cadastrarcliente')){
            return view("cadastrarcliente");
        }else{
            return view('welcome');
        }
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
        // Criando um novo objeto do tipo Cliente
        $cliente = new Cliente();

        // Colocando os valores recebidos do formulário nos atributos do objeto $cliente
        $cliente->nome = $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;
        if( $request->data_cadastro ){
            $cliente->created_at = $request->data_cadastro;
        }
        if( $request->data_atualizacao ){
            $cliente->updated_at = $request->data_atualizacao;
        }
        $cliente->save();
        return $cliente->id;
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        
        return $cliente;
    }
    
    
    public function listar()
    {
        $clientes = Cliente::all();
        if( view()->exists('listarclientes')){
            return view('listarclientes');
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $client = Cliente::find($id);
        $telefones = Telefone::all();
        return view ('editarcliente', compact('client', 'telefones'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [ 
            'nome' => 'required|min:3|max:45', 
            'data_nascimento' => 'required',
        ];
        $mensagens = [
            'required' => 'O :attribute é obrigatório.',
            'nome.min' => 'É necessário no mínimo 3 caracteres no nome.',
            'nome.max' => 'É aceitavel no máximo 45 caracteres no nome.',
            'data_nascimento.before' => 'Idade do cliente inferior a 1 dia, impossível fazer o cadastro.',
        ];
        $request->validate($regras, $mensagens);

        // Buscando o cliente para atualizar pelo ID
        $cliente = Cliente::find($id);

        // Colocando os valores recebidos do formulário nos atributos do objeto $cliente
        // atualiizando
        $cliente->nome = $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;

        $cliente->save();
        
        $clientes = Cliente::all();
        $telefones = Telefone::all();
        return view("listarclientes", compact('clientes', 'telefones'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Cliente::find($id);
        if( $c == NULL ){
            return ['status' => 0, 'rason' => 'Não encontrado o cliente! '];
        }else{
            $c->delete();
            return ['status' => 1, 'rason' => 'Cliente excluido! '];
        }
    }
}
