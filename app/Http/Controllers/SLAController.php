<?php

namespace App\Http\Controllers;

use App\Models\SLA;
use Illuminate\Http\Request;

class SLAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $slas = SLA::all();
        return view('sla', ['slas' => $slas, 'request' => $request->all()]);
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
            'valor' => 'required|max:3'
        ];

        $feedback = [
            'valor.required' => 'O valor deve ser informado.',
            'valor.max' => 'O valor deve conter no máximo 3 caracteres.'
        ];

        $request->validate($regras, $feedback);

        SLA::create($request->all());
        return redirect()->route('sla.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function show(SLA $sLA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function edit(SLA $sLA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SLA $sLA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function destroy(SLA $sLA)
    {
        //
    }
}
