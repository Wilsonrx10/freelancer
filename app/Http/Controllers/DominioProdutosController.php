<?php

namespace App\Http\Controllers;

use App\Models\DominioProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DominioProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = (object) $request->all();

        $domain = DominioProduto::paginate();

        if (!empty(request()->all())) {

            $query = DominioProduto::query()
                ->join('produtos', 'dominio_produtos.id_produto', '=', 'produtos.id')
                ->where(function ($query) use ($request,&$filtro) {

                    $camposPesquisa = array_keys(array_filter($request->only(['nome_produto', 'status', 'id_produto']), function ($value, $key) {
                        return filled($value);
                    }, ARRAY_FILTER_USE_BOTH));

                    foreach ($camposPesquisa as $campo) {
                        $valor = $request->input($campo);
                        if ($campo == 'nome_produto') {
                            $query->where('produtos.' . $campo, 'like', '%' . $valor . '%');
                        } else if ($campo == 'id') {
                            $query->where('produtos.' . $campo, 'like', '%' . $valor . '%');
                        } else {
                            $query->where('dominio_produtos.' . $campo, $valor);
                        }
                        $filtro->$campo = $valor;
                    }
                });

            $domain = $query->paginate();
        }

        return view('dominio_produto.index', compact('domain','filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();

        return view('dominio_produto.new', compact('produtos'));
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
            'url' => 'required|url|unique:dominio_produtos',
            'id_produto' => 'required',
            'status' => 'required'
        ]);

        DominioProduto::create([
            'id_produto' => $request->input('id_produto'),
            'url' => $request->input('url'),
            'status' => $request->input('status')
        ]);

        flash('Dominio de produto Adicionado com sucesso');

        return Redirect::route('dominioProduto.index');
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
    public function edit(DominioProduto $dominioProduto)
    {
        $produtos = Produto::all();

        return view('dominio_produto.edit', compact(['dominioProduto', 'produtos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DominioProduto $dominioProduto)
    {
        $request->validate([
            'url' => 'required|url|unique:dominio_produtos,url,' . $dominioProduto->id,
            'id_produto' => 'required',
        ]);

        $dominioProduto->update($request->all());

        flash('Dominio de produto Atualizado com sucesso');

        return Redirect::route('dominioProduto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DominioProduto $dominioProduto)
    {
        $dominioProduto->delete();

        flash('Dominio eliminado com sucesso');

        return Redirect::route('dominioProduto.index');
    }
}
