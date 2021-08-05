<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Categoria;
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
        $projetos = Projeto::paginate(10);
        $categorias = Categoria::all();
        return view('projetos', ['projetos' => $projetos, 'categorias' => $categorias, 'request' => $request->all()]);
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
            'nome' => 'required|max:20',
            'titulo' => 'required|max:30',
            'sla' => 'required|max:3',
            'categoria_id' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O nome do projeto deve ser informado.',
            'nome.max' => 'O nome deve conter no máximo 20 caracteres.',
            'titulo.required' => 'O título do projeto deve ser informado.',
            'titulo.max' => 'O título deve conter no máximo 30 caracteres.',
            'sla.required' => 'A SLA do projeto deve ser informada.',
            'titulo.max' => 'A SLA deve conter no máximo 3 caracteres.',
            'categoria_id.required' => 'A categoria do projeto deve ser informada.'
        ];

        $request->validate($regras, $feedback);

        Projeto::create($request->all());
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
