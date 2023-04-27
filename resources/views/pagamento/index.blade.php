@extends('layouts.app')

@section('title', 'pagamentos')
@section('content')
 <div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">{{ $result->total() }} {{ Illuminate\Support\Str::plural('Pagamento', $result->count()) }} </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                        <a href="{{ route('pagamentos.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Novo</a>
                </div>
            </div>
        </div>

        <div class="card-body" style="overflow-y:scroll">
            <form method="GET" action="{{ route('pagamentos.index') }}">
                @include('pagamento._form_filtro')
                <div class="row">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Buscar') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="data-table">
                <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>ID Usuário</th>
                    <th>Email</th>
                    <th>Produto Externo</th>
                    <th>Código Pagamento</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Status</th>
                    @if(\Auth::user()->id_tipo_usuario == \App\Constants::tipoUsuarioAdmin)
                    <th class="text-center">Ações</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($result as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->id_usuario }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nome_produto_externo }}</td>
                        <td>{{ $item->id_pagamento_externo }}</td>
                        <td>{{ (\App\Helper::validarData($item->data_inicio,"Y-m-d H:i:s") ? DateTime::createFromFormat("Y-m-d H:i:s" , $item->data_inicio)->format('d/m/Y H:i:s') : "" )}}</td>
                        <td>{{ (\App\Helper::validarData($item->data_fim,"Y-m-d H:i:s") ? DateTime::createFromFormat("Y-m-d H:i:s" , $item->data_fim)->format('d/m/Y H:i:s') : "" )}}</td>
                        <td>{{ $item->status_pagamento}}</td>

                        @if(\Auth::user()->id_tipo_usuario == \App\Constants::tipoUsuarioAdmin)
                        <td class="text-center">
                            @include('shared._actions', [
                                'entity' => 'pagamentos',
                                'id' => $item->id
                            ])
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $result->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
