<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Produto;
use App\Models\ProdutoTelegramCanais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoTelegramCanaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ProdutoTelegram = ProdutoTelegramCanais::paginate();

        if (!empty(request()->all())) {

            $query = ProdutoTelegramCanais::query();

            $camposPesquisa = array_keys(array_filter($request->only(['nome_telegram_canal', 'code_telegram_canal', 'convite','canal_admin','status']), function ($value, $key) {
                return filled($value);
            }, ARRAY_FILTER_USE_BOTH));

            foreach ($camposPesquisa as $campo) {
                $valor = $request->input($campo);
                if ($campo == 'nome_telegram_canal' || $campo == 'code_telegram_canal' || $campo == 'convite') {
                    $query->where($campo, 'like', '%' . $valor . '%');
                } else {
                    $query->where($campo, $valor);
                }
            }
            $ProdutoTelegram = $query->paginate();
        }
        
        return view('Produto_telegram.index',compact('ProdutoTelegram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        
        return view('produto_telegram.new',compact('produtos'));
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
            'code_telegram_canal' => 'required|numeric',
            'id_produto' => 'required',
            'nome_telegram_canal' => 'required|string',
            'convite'=> 'required|string',
            'status' => 'required'
        ]);

        $canal_admin = $request->user()->id_tipo_usuario == Constants::tipoUsuarioAdmin ? 1 : 0;

        ProdutoTelegramCanais::create(array_merge($request->all(),[
            'canal_admin' => $canal_admin
        ]));

        flash('Produto telegram Adicionado');

        return Redirect::route('ProdutoTelegram.index');
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
    public function edit($id)
    {
        $produtos = Produto::all();

        $ProdutoTelegramCanais = ProdutoTelegramCanais::findOrFail($id);

        return view('produto_telegram.edit',compact(['ProdutoTelegramCanais','produtos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_telegram_canal' => 'required|numeric',
            'id_produto' => 'required',
            'nome_telegram_canal' => 'required|string',
            'convite'=> 'required|string',
            'status' => 'required'
        ]);

        $ProdutoTelegramCanais = ProdutoTelegramCanais::findOrFail($id);

        $ProdutoTelegramCanais->update($request->all());

        flash('Produto telegram Atualizado');

        return Redirect::route('ProdutoTelegram.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProdutoTelegramCanais = ProdutoTelegramCanais::findOrFail($id);

        $ProdutoTelegramCanais->delete();

        flash('Produto telegram deletado');

        return Redirect::route('ProdutoTelegram.index');
    }
}