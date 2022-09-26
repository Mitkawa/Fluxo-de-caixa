<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CentroCusto, Tipo};


class CentroCustoController extends Controller
{
    public function index()
    {
        $centros = CentroCusto::orderBy('centro_custo')->get();
        return view('centro.index')
                ->with(compact('centros'));
    }

    public function create()
    {
        //tratamento para usar o mesmo formulário
        $centro = null;
        $tipos = Tipo::orderBy('tipo')->get();
        return view('centro.form')
                ->with(compact('centro','tipos'));
    }

    public function store(Request $request)
    {
        $centro = new CentroCusto();
        $centro->fill($request->all());
        $centro->save();

        return redirect()->route('centro.index')->with('success','Cadastrado com sucesso');
    }

    public function show(int $id)
    {
        $centro = CentroCusto::find($id);
        return view('centro.show')
                ->with(compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CentroCusto $centro
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $centro = CentroCusto::find($id);
        $tipos = Tipo::orderBy('tipo')->get();
        return view('centro.form')
                ->with(compact('centro','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentroCusto $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $centro = CentroCusto::find($id);
        $centro->fill($request->all());
        $centro->save();

        return redirect()->route('centro.index')->with('success','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentroCusto $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $centro = CentroCusto::find($id);
        $centro->delete();

        return redirect()->route('centro.index')->with('danger','Excluído com sucesso');
    }
}
