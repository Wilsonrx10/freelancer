<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoExterno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = (object) $request->all;

        $produtoExterno = ProdutoExterno::paginate();

        if (!empty(request()->all())) {

            $query = ProdutoExterno::query();

            $camposPesquisa = array_keys(array_filter($request->only(['codigo_produto_externo', 'nome_produto_externo', 'status', 'id_produto']), function ($value, $key) {
                return filled($value);
            }, ARRAY_FILTER_USE_BOTH));

            foreach ($camposPesquisa as $campo) {
                $valor = $request->input($campo);
                if ($campo == 'codigo_produto_externo' || $campo == 'nome_produto_externo') {
                    $query->where($campo, 'like', '%' . $valor . '%');
                } else {
                    $query->where($campo, $valor);
                }

                $filtro->$campo = $valor;
            }
            $produtoExterno = $query->paginate();
        }

        return view('produto_externo.index', compact('produtoExterno','filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('produto_externo.new', compact('produtos'));
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
            'codigo_produto_externo' => 'required',
            'nome_produto_externo' => 'required|string',
            'id_produto' => 'required',
            'status' => 'required'
        ]);

        ProdutoExterno::create([
            'codigo_produto_externo' => $request->input('codigo_produto_externo'),
            'nome_produto_externo' => $request->input('nome_produto_externo'),
            'id_produto' => $request->input('id_produto'),
            'status' => $request->input('status')
        ]);

        flash('Produto Externo Adicionado');

        return Redirect::route('ProdutoExterno.index');
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
    public function edit(ProdutoExterno $ProdutoExterno)
    {
        $produtos = Produto::all();

        return view('produto_externo.edit', compact(['ProdutoExterno', 'produtos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoExterno $ProdutoExterno)
    {

        $request->validate([
            'codigo_produto_externo' => 'required',
            'nome_produto_externo' => 'required|string',
            'id_produto' => 'required'
        ]);

        $ProdutoExterno->update($request->all());

        flash('Produto Externo Atualizado');

        return Redirect::route('ProdutoExterno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoExterno $ProdutoExterno)
    {
        $ProdutoExterno->delete();

        flash('Produto Externo Eliminado com suceso');

        return Redirect::route('ProdutoExterno.index');
    }
}
