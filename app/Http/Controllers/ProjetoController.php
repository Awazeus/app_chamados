<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        $projetos = Projeto::all();
        
        return view('projetos', [
            'projetos' => $projetos, 
            'clientes' => $clientes, 
            'request' => $request->all()
        ]);
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
        $regras = [
            'nome' => 'required|max:30',
            'cliente_id' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O nome do projeto deve ser informado.',
            'nome.max' => 'O nome deve conter no máximo 30 caracteres.',
            'cliente_id.required' => 'O cliente do projeto deve ser informada.'
        ];

        $request->validate($regras, $feedback);

        $projeto = new Projeto();
        $projeto->create([
            'nome' => $request->nome,
            'cliente_id' => $request->cliente_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('projetos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projeto $projeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projeto $projeto)
    {
        //
    }
}
