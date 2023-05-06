@extends('layouts.app')

@section('title', 'Empresa')

@section('content')
<div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">{{ Illuminate\Support\Str::plural('Empresas', $company->count()) }} </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('empresa.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Novo</a>
                </div>
            </div>
        </div>

        <div class="card-body" style="overflow-y:scroll">
            <form method="GET" action="{{ route('empresa.index') }}">
                @include('empresa._form_filtro')
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
                    <th>nome_empresa</th>
                    <th>cnpj</th>
                    <th>status</th>
                    <th>Data</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company as $item)
                    <tr>
                        <td>{{ $item->nome_empresa }}</td>
                        <td>{{ $item->cnpj }}</td>
                        <td>{{ $item->status == 1 ? 'ativo' : 'inativo'}}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            @include('shared._actions', [
                                'entity' => 'empresa',
                                'id' => $item->id
                            ])
                            <a href="{{ route('userEmpresa', ['empresa' => $item->id]) }}">Vincular usuário</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $company->links() }}
            </div>
        </div>
    </div>
</div>
@endsection