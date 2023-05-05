<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use App\Models\UsuarioEmpresa;
use Illuminate\Http\Request;

class UsuarioEmpresaController extends Controller
{

    public function index($empresa)
    {
        $usuarios = User::all();

        $empresa = Empresa::findOrFail($empresa);

        if ($empresa) {
            return view('user_empresa.index', compact(['usuarios', 'empresa']));
        }
    }


    public function update(Request $request)
    {
        if ($request->selectedUsers) {
            foreach ($request->selectedUsers as $value) {
                $data = UsuarioEmpresa::where('user_id', $value)->where('empresa_id', $request->empresa_id)->first();

                if (!$data) {
                    UsuarioEmpresa::create([
                        'user_id' => $value,
                        'empresa_id' => $request->empresa_id,
                        'status' => '1'
                    ]);
                } else {
                    $data->status = '1';
                    $data->save();
                }
            }
        }

        if ($request->deselectUsers) {
            foreach ($request->deselectUsers as $value) {
                $data = UsuarioEmpresa::where('user_id', $value)->where('empresa_id', $request->empresa_id)->first();

                if ($data) {
                    $data->status = '0';
                    $data->save();
                }
            }
        }

        flash('Dados atualizado com sucesso');
    }
}