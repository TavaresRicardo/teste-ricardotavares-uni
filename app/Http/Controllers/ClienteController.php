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
        $clientes = Cliente::all();

        return $clientes;
        //
    }

    public function telefones($id)
    {
        $telefone = Telefone::where('cliente_id', $id )->first();

        return $telefone->numero;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( view()->exists('api.clientes.create')){
            return view("api.clientes.create");
        }else{
            return view('app');
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


        /*telefone = new Telefone();
        $telefone->numero = $request->numero;
        $telefone->principal = $request->principal;
        $telefone->cliente_id = $cliente->id;
        $telefone->save();*/

        return ['status'=>true,"conteudos"=>$cliente];

        // return $cliente->id;


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view ('api.cliente.edit', compact('cliente'));
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

        return ['status'=>true,"conteudos"=>$cliente];


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
