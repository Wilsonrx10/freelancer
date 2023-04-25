<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Helper;
use App\Http\Controllers\API\AuthController;
use App\User;
use App\Role;
use App\Authorizable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;

class UserController extends Controller implements MustVerifyEmail
{
    use Authorizable;

    private $produtoController;

    public function __construct() {
        $this->produtoController = new ProdutoController();
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
                if (!empty($valor) && in_array($nome, ["id_tipo_usuario", "email"])) {
                    $filtro[] = "users.".$nome." = '" . $valor . "'";
                } else if (is_numeric($valor) && $valor >= 0) {
                    if ($nome == "inscricao_ativa") {
                        if ($valor == Constants::sim) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid')";
                        } else if ($valor == Constants::simComUsuario) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid') AND pagamentos.id_usuario IS NOT NULL ";
                        } else if ($valor == Constants::simSemUsuario) {
                            $filtro[] = "('".date("Y-m-d H:i:s")."' BETWEEN pagamentos.data_inicio AND pagamentos.data_fim AND pagamentos.status_pagamento = 'paid') AND pagamentos.id_usuario IS NULL ";
                        }
                    }
                }
            }
        }
        dd("Acesso restrito, apenas administradores.");
    }

    /**
     * Usuário | Exibir formulario de Criação
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.new');
    }

    /**
     * Usuário | Gravar novo usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // passsar validação campo status , not required 0 ou 1
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            "telefone" => "required|string|min:13|max:14|unique:users",
            'id_tipo_usuario' => 'required|int|exists:roles,id',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        if ($validator->fails()) {
            if (Helper::apiRequest()) {
                return response(["error" => $validator->errors()], 422);
            }
            return \Redirect::back()->withInput($request->all())->withErrors($validator);
        }

        // grava password encriptado e data do período de free
        $request->merge([
            'password' => bcrypt($request->get('password'))
        ]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {
            $mensagem ="Usuário criado com sucesso";
            if (Helper::apiRequest()) {
                return response(["message" => $mensagem , "redirectTo" => $request->redirect ?: "users.index"], 200);
            }
            flash()->success($mensagem);
            if (!empty($request->redirect)) {
                return \Redirect::route($request->redirect);
            }
            return \Redirect::route('users.index');
        } else {
            $mensagem ="Não foi possível criar o usuário. Tente novamente";
            flash()->error($mensagem);
            return response(["message" => $mensagem, "redirectTo" => $request->redirect ?: "users.index"], 500);
        }
    }

    /**
     * Usuário | Exibe apenas o usuario informado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Usuário | Exibir formulario de Edição
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioAdmin ||
            (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioProfissional
                && auth()->user()->can('edit_users')
                && $user->id_tipo_usuario == Constants::tipoUsuarioCliente
            )
            || Auth::user()->id == $id) {
            $roles = RoleController::getRolesUser();
            $permissions = RoleController::getPermissionsUser();
            return view('user.edit', compact('user', 'roles', 'permissions'));
        } else {
            flash()->error('Acesso restrito.');
            return \Redirect::back();
        }
    }

    public function atualizarUsuario(User $user, $dadosAtualizar) {
        $email = !empty($dadosAtualizar["email"]) ? $dadosAtualizar["email"] : $user->email;
        PagamentoController::atualizaUsuarioPagamentoEmail((empty($dadosAtualizar["id_telegram"])? null : $user->id), $email);
        return $user->update($dadosAtualizar);
    }

    /**
     * Usuário | Atualizar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->all() as $campo => $valor) {
            if (empty($valor)) {
                $request->request->remove($campo);
            }
        }
        if (empty($request->all())) {
            return response(["error" => ["error" => "Nenhum campo alterado."]], 422);
        }
        try {
            $emailAlterado = false;
            $user = User::findOrFail($id);
            if (!in_array(Auth::user()->id, Constants::idUsuariosAdm)) {
                $dados['id_tipo_usuario'] = $user->id_tipo_usuario;
            } else if (in_array($id, Constants::idUsuariosAdm)) {
                $dados['id_tipo_usuario'] = Constants::tipoUsuarioAdmin;
            } else if (Auth::user()->id == $id) {
                $dados['id_tipo_usuario'] = $user->id_tipo_usuario;
            } else if (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioProfissional) {
                $dados['id_tipo_usuario'] = $user->id_tipo_usuario;
            } else {
                $dados['id_tipo_usuario'] = $request->id_tipo_usuario;
            }

            if (!empty($request->email) && $user->email != $request->email) {
                $dados['email_verified_at'] = null;
                $emailAlterado = true;
            }

            if (!(auth()->user()->can('edit_users')) && Auth::user()->id != $id) {
                $mensagem = "Você não tem permissão para alterar este usuário";
                flash()->error($mensagem);
                if (Helper::apiRequest()) {
                    return response(["error" => $mensagem], 403);
                }
                return \Redirect::route('home');
            }

            $dados['roles'][] = $dados['id_tipo_usuario'];
            $request->merge($dados);
            $validacoes = ([
                'name' => 'bail|min:2',
                'email' => 'email|unique:users,email,' . $id,
                "telefone" => 'string|min:13|max:14|unique:users,telefone,' . $id,
                "codigo_indicacao" => 'string|min:6|max:100|unique:users,codigo_indicacao,' . $id,
                'password' => 'min:6',
                'id_tipo_usuario' => 'required|int|exists:roles,id',
                'roles' => 'required|min:1|max:1' // atualmente limitado para mesma role do tipo
            ]);

            $validator = Validator::make($request->all(), $validacoes);
            if ($validator->fails()) {
                if (Helper::apiRequest()) {
                    return response(["error" => $validator->errors()], 422);
                }
                return \Redirect::back()->withInput($request->all())->withErrors($validator);
            }

            if ($user->id_tipo_usuario != $request->id_tipo_usuario
                && !in_array(Auth::user()->id, Constants::idUsuariosAdm)) {
                $mensagem = "Você não tem permissão para alterar o tipo do usuário";
                flash()->error($mensagem);
                if (Helper::apiRequest()) {
                    return response(["error" => $mensagem], 403);
                }
                return \Redirect::route('home');
            } else if(!in_array($user->id, Constants::idUsuariosAdm) && $request->id_tipo_usuario == Constants::tipoUsuarioAdmin) {
                $mensagem = "Atualizações de usuário administrador não pode ser feita via sistema";
                flash()->error($mensagem);
                if (Helper::apiRequest()) {
                    return response(["error" => $mensagem], 403);
                }
                return \Redirect::route('home');
            }

            $user->fill($request->except('roles', 'permissions', 'password'));

            // check for password change
            if($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }

            // Handle the user roles
            $this->syncPermissions($request, $user);

            $user->save();
            if ($emailAlterado) {
                $user->sendEmailVerificationNotification();
            }
            PagamentoController::atualizaUsuarioPagamentoEmail($user->id, $user->email);
            $mensagem ="Usuario atualizado";
            flash()->success($mensagem);
            if (Helper::apiRequest()) {
                return response(["message" => $mensagem], 200);
            } else if (Auth::user() && Auth::user()->id_tipo_usuario == Constants::tipoUsuarioAdmin) {
                return \Redirect::route('users.index');
            } else {
                return \Redirect::route('home');
            }
        } catch (\Exception $e){
            $mensagem = "Falha ao atualizar o usuário";
            flash()->error($mensagem);
            if (Helper::apiRequest()) {
                return response(["message" => $e->getMessage()], 500);
            }
            return \Redirect::route('home');
        }
    }

    /**
     * Usuario | Remover
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function destroy($id)
    {
        if (Auth::user()->id_tipo_usuario == Constants::tipoUsuarioAdmin || Auth::user()->id == $id) {
            if(User::findOrFail($id)->update(['status' => 0])) {
                if(Auth::user()->id == $id) {
                    if (Helper::apiRequest()) {
                        (new AuthController())->logout(\request());
                    } else {
                        Auth::logout();
                    }
                }
                flash()->success('Usuário deletado');
            } else {
                flash()->warning('Faha ao deletar usuário');
            }
        } else {
            flash()->error('Acesso Restrito.');
        }

        return \Redirect::back();
    }

    /**
     * Usuário | Sincronizar permissões
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }
    public function getUsuario(Request $request){
        return $request->user();
    }

    public static function validarUsuarioAssinatura() {
        if (in_array(Auth::user()->id_tipo_usuario, Constants::roleAcessoSemPagamento)) {
            return true;
        } else if (UserController::getDiasRestantesAssinatura() >= 0) {
            return true;
        }
        return false;
    }

    public static function getDiasRestantesAssinatura() {
        $dataFim = PagamentoController::getDataFimPagamentoUsuario();
        if (!empty($dataFim)) {
            return Helper::diferencaDatas($dataFim, date('Y-m-d'), "dias");
        }
        return -1;
    }

    public function hasVerifiedEmail()
    {
        // TODO: Implement hasVerifiedEmail() method.
    }

    public function markEmailAsVerified()
    {
        // TODO: Implement markEmailAsVerified() method.
    }

    public function sendEmailVerificationNotification()
    {
        // TODO: Implement sendEmailVerificationNotification() method.
    }

    public function getEmailForVerification()
    {
        // TODO: Implement getEmailForVerification() method.
    }
    public function getUsuarioColuna($coluna, $valor) {
        $produto = User::where($coluna, $valor);
        if ($produto->count()) {
            return $produto->first();
        }
        return null;
    }
}
