<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Helper;
use App\Pagamento;
use App\Produto;
use App\ProdutoExterno;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PagamentoController extends Controller
{
    private $userController;
    public function __construct() {
        $this->userController = new UserController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->all()) {
            foreach (\request()->all() as $nome => $valor) {
                if (!empty($valor) && $nome == "email") {
                    $filtro[] = "pagamentos.email = '".$valor."'";
                } else if ($nome == "id_pagamento_externo") {
                    $filtro[] = " pagamentos.id_pagamento_externo like '%".$valor."%' ";
                } else if (is_numeric($valor) && $valor >= 0) {
                    if ($nome == "inscricao_ativa") {
                        if ($valor == Constants::sim) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid')";
                        } else if ($valor == Constants::simComUsuario) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid') AND pagamentos.id_usuario IS NOT NULL ";
                        } else if ($valor == Constants::simSemUsuario) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid') AND pagamentos.id_usuario IS NULL ";
                        }
                    } else if ($nome == "id_produto") {
                        $filtro[] = " produto_externos.id_produto = ".$valor." ";
                    }
                }
            }
        }
        if (in_array(Auth::user()->id_tipo_usuario,[Constants::tipoUsuarioAdmin, Constants::tipoUsuarioProfissional])) {
            $result = Pagamento::select(
                'pagamentos.*',
                'produto_externos.nome_produto_externo',
            );

            if (!empty(request()->all()) && !empty($filtro)) {
                foreach ($filtro as $valor) {
                    $result->whereRaw($valor);
                }
            } else{
                $filtro = [];
            }
            $result->leftJoin('produto_externos', 'produto_externos.id', '=', 'pagamentos.id_produto_externo');
            $result->where('pagamentos.status', Constants::ativo);
            $result->groupBy('pagamentos.id');
            $result->orderBy('pagamentos.data_fim','desc');
            $result = $result->paginate();

            if (!empty(request()->all()) && !empty($filtro)) {
                $filtro =  (object) request()->all();
            }
            $produtos = Produto::where('status', Constants::ativo)->get();
            return view('pagamento.index', compact('result','filtro', 'produtos'));
        }
        dd("Acesso restrito a administradores e profissionais.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = ProdutoExterno::where('status', Constants::ativo)->get();
        return view('pagamento.new', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'id_pagamento_externo' => 'required|unique:pagamentos',
            'data_fim' => 'required|date_format:d/m/Y|after_or_equal:data_inicio|after:'. date('Y-m-d'),
            'data_inicio' => 'required|date_format:d/m/Y|after_or_equal:'.date('2022-06-01'),
            'id_produto_externo' => 'required|exists:produto_externos,id',
        ]);
        if ($validator->fails()) {
            if (Helper::apiRequest()) {
                return response(["error" => $validator->errors()], 422);
            }
            return \Redirect::back()->withInput($request->all())->withErrors($validator);
        }

        $dados['data_inicio'] = DateTime::createFromFormat('d/m/Y', $request->data_inicio)->format('Y-m-d')." 00:00:00";
        $dados['data_fim'] = DateTime::createFromFormat('d/m/Y', $request->data_fim)->format('Y-m-d')." 23:59:59";
        $dados["id_usuario"] = $this->userController->getUsuarioColuna('email', $request->email)->id;
        $dados["status_pagamento"] = "paid";
        $dados["id_plataforma_pagamento"] = Constants::PlataformaManual;
        $this->insert(array_merge($request->all(), $dados));
        Alert::success("Pagamento criado.");
        return \Redirect::route('pagamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function show(Pagamento $pagamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagamento = Pagamento::find($id);
        if (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioAdmin ||
            (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioProfissional && auth()->user()->can('edit_users'))
        ) {
            return view('pagamento.edit', compact('pagamento'));
        } else {
            flash()->error('Acesso restrito.');
            return \Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            if (Helper::apiRequest()) {
                return response(["error" => $validator->errors()], 422);
            }
            return \Redirect::back()->withInput($request->all())->withErrors($validator);
        }
        // tratamento para mostrar mensagem melhor , colocando no validator fala que email é invalido
        $usuario = $this->userController->getUsuarioColuna('email', $request->email);
        Pagamento::findOrFail($id)->update([
            "id_usuario" => $usuario->id,
            "email" => $usuario->email
        ]);
        Alert::success("Pagamento atualizado.");
        return \Redirect::route('pagamentos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagamento $pagamento)
    {
        if(auth()->user()->can('delete_pagamentos') ) {
            Pagamento::findOrFail($pagamento->id)->update(['status' => Constants::inativo]);
            flash()->success('Pagamento Removido.');
            return \Redirect::route('pagamentos.index');
        } else {
            flash()->success('Sem permissão para apagar pagamentos.');
            return \Redirect::route('pagamentos.index');
        }
    }

    public function getPagamentoColuna($coluna, $valor) {
        $info = Pagamento::where($coluna, $valor);
        if ($info->count()) {
            return $info->first();
        }
        return false;
    }

    public function search($idPagamentoExterno) {
        $pagamento = Pagamento::where('id_pagamento_externo', $idPagamentoExterno);
        if ($pagamento->count()) {
            return $pagamento->first();
        }
        return false;
    }

    public function insert($dados) {
        $infoBanco = $this->search($dados['id_pagamento_externo']);
        if (empty($infoBanco)) {
            $infoBanco = Pagamento::create($dados);
        } else if (isset($infoBanco->id) &&
            ($infoBanco->updated_at_externo <= $dados["updated_at_externo"])
        ) {
            $infoBanco = $infoBanco->update($dados);
        }
        if (!empty($dados["id_usuario"])) {
            $usario = User::findOrFail($dados["id_usuario"]);
            if (!empty($usario->id_telegram)) {
                ProdutoTelegramCanaisController::convidarOuRemoverUsuarioCanaisPagamento($usario);
            }
        }
        return ($infoBanco ?: false);
    }

    public static function atualizaUsuarioPagamentoEmail($idUsuario, $email) {
        return Pagamento::where('status', Constants::ativo)
            ->where('email', $email)
            ->update(['id_usuario' => $idUsuario]);
    }

    public function getUsuariosPagamentoAtivoProduto($idProduto, $telegram = true) {
        if (in_array($idProduto, Constants::produtosFreeCornerMachine)) {
            $idProduto = Constants::tipoProdutoCornerMachine;
        }
        $usuarios =  User::select("users.id", "users.name", "users.email", "users.id_telegram" )
        ->leftJoin('pagamentos as pa', 'pa.id_usuario', '=', 'users.id')
        ->leftJoin('produto_externos as pe', 'pe.id', '=', 'pa.id_produto_externo')
        ->leftJoin('produtos as p', 'pe.id_produto', '=', 'p.id')
        ->where(function ($query) use ($idProduto, $telegram) {
            $query->where('p.id', '=', $idProduto)
            ->where('pa.status', Constants::ativo)
                ->whereRaw("('".date("Y-m-d H:i:s")."' BETWEEN pa.data_inicio AND pa.data_fim)")
                ->where('pa.status_pagamento', 'paid')
                ->where('p.status', Constants::ativo);
            if ($telegram) {
                $query->whereNotNull("users.id_telegram");
            }
        })
        ->orWhere(function ($query) use ($telegram) {
            $query->whereIn('users.id_tipo_usuario', Constants::roleAcessoSemPagamento);
            if ($telegram) {
                $query->whereNotNull("users.id_telegram");
            }
        });
        $usuarios->groupBy('users.id');
        if ($usuarios->count()) {
            return $usuarios->get();
        }
        return false;
    }

}
