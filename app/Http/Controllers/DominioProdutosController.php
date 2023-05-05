<?php

namespace App\Http\Controllers;

use App\Models\DominioProduto;
use App\Produto;
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
        $domain = DominioProduto::paginate();

        if ($request->input('search')) {

            $domain = DominioProduto::query()
            ->join('produtos', 'dominio_produtos.id_produto', '=', 'produtos.id')
                ->where(function($query) use ($request) {
                $query->where('dominio_produtos.url', 'like', '%' . $request->input('search') . '%')
                ->orWhere('dominio_produtos.status', 'like', '%' . $request->input('search') . '%')
                ->orWhere('produtos.nome_produto', 'like', '%' . $request->input('search') . '%');
            })->paginate();
        }

        return view('dominio_produto.index',compact('domain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();

        return view('dominio_produto.new',compact('produtos'));
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
            'id_produto' => $request->input('produto'),
            'url' => $request->input('url')
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
        
        return view('dominio_produto.edit',compact(['dominioProduto','produtos']));
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
            'url' => 'required|url|unique:dominio_produtos,url,'.$dominioProduto->id,
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
