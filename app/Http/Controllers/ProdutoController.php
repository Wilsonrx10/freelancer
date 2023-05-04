<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produto = Produto::paginate();

        if ($request->input('search')) {
            $produto = Produto::query()
            ->where('nome_produto', 'like', '%' . $request->input('search') . '%')
            ->Orwhere('id', 'like', '%' . $request->input('search') . '%')
            ->Orwhere('status', 'like', '%' . $request->input('search') . '%')->paginate();
        }

        return view('produto.index', compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.new');
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
            'nome_produto' => 'required|string',
            'descricao' => 'required|string',
            'icone' =>  'required|file'
        ]);

        $filename = $request->file('icone')->getClientOriginalName();

        if ($request->file('icone')) {

            $request->file('icone')->storeAs('public/icone/image', $filename);
        }

        Produto::create(array_merge($request->all(), ['icone' => $filename]));

        flash('Produto cadastrado com sucesso.');

        return Redirect()->route('produto.index');
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
    public function edit(Produto $produto)
    {
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());

        flash('Produto atualizado com sucesso.');

        return Redirect::route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        flash('Produto deletado com sucesso');

        return Redirect()->route('produto.index');
    }
}
