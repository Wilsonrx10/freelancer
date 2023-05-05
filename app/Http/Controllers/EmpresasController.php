<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\UsuarioEmpresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = Empresa::paginate();

        if ($request->input('search')) {
            $company = Empresa::query()
            ->where('nome_empresa', 'like', '%' . $request->input('search') . '%')
            ->Orwhere('id', 'like', '%' . $request->input('search') . '%')
            ->Orwhere('cnpj', 'like', '%' . $request->input('search') . '%')
            ->Orwhere('status', 'like', '%' . $request->input('search') . '%')->paginate();
        }
        
        return view('empresa.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('empresa.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_empresa' => 'required|string',
            'cnpj' => 'required|min:14|max:14|unique:empresas',
            'status' => 'required'
        ]);

        Empresa::create($request->all());

        flash('Empresa Cadastrada.');

        return Redirect::route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nome_empresa' => 'required|string',
            'cnpj' => 'required|min:14|max:14|unique:empresas,cnpj,'.$empresa->id,
            'status' => 'required'
        ]);

        $empresa->update($request->all());

        flash('Empresa Cadastrada.');

        return Redirect::route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        flash()->success('Empresa deletado.');

        return Redirect::route('empresa.index');
    }
}