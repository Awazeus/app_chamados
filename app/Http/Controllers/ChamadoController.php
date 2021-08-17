<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Categoria;
use App\Models\Situacao;
use App\Models\SLA;
use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $situacoes = Situacao::all();
        $projetos = Projeto::all();
        $slas = SLA::all();

        if($request->has('situacao')){
            $chamados = Chamado::where('situacao_id', $request->situacao)->get();
        } else if($request->has('categoria')){
            $chamados = Chamado::where('categoria_id', $request->categoria)->get();
        } else if($request->has('projeto')){
            $chamados = Chamado::where('projeto_id', $request->projeto)->get();
        }else if($request->has('sla')){
            $chamados = Chamado::where('sla_id', $request->sla)->get();
        }else if($request->has('ordem_data')){
            $chamados = Chamado::orderBy('created_at', $request->ordem_data)->get();
        // } else if($request->has('ordem_sla')){
        //     $chamados = Chamado::orderBy('sla', $request->ordem_sla)->get();
        } else{
            $chamados = Chamado::all();
        }

        return view('chamados', [
            'chamados' => $chamados, 
            'categorias' => $categorias, 
            'situacoes' => $situacoes, 
            'projetos' => $projetos, 
            'slas' => $slas, 
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
            'titulo' => 'required|max:30',
            'projeto_id' => 'required',
            'sla_id' => 'required',
            'categoria_id' => 'required'
        ];

        $feedback = [
            'titulo.required' => 'O título do chamado deve ser informado.',
            'titulo.max' => 'O título deve conter no máximo 30 caracteres.',
            'projeto_id.required' => 'O projeto deve ser informado.',
            'sla_id.required' => 'A SLA deve ser informada.',
            'categoria_id.required' => 'A categoria deve ser informada.'
        ];

        $request->validate($regras, $feedback);

        Chamado::create($request->all());
        return redirect()->route('chamados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        $regras = [
            'titulo' => 'required|max:30'
        ];

        $feedback = [
            'titulo.required' => 'O título do chamado deve ser informado.',
            'titulo.max' => 'O título deve conter no máximo 30 caracteres.'
        ];

        $request->validate($regras, $feedback);

        $chamado->update($request->all());
        return redirect()->route('chamados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('chamados.index');
    }
}
