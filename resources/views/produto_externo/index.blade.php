@extends('layouts.app')

@section('title', 'Produto Externo')

@section('content')
<div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">{{ Illuminate\Support\Str::plural('Produto Externo', $produtoExterno->count()) }} </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('ProdutoExterno.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Novo</a>
                </div>
            </div>
        </div>

        <div class="card-body" style="overflow-y:scroll">
            <form method="GET" action="{{ route('ProdutoExterno.index') }}">
                @include('produto_externo._form_filtro')
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
                    <th>codigo_produto_externo</th>
                    <th>nome_produto_externo</th>
                    <th>id_produto</th>
                    <th>status</th>
                    <th>Data</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtoExterno as $item)
                    <tr>
                        <td>{{ $item->codigo_produto_externo }}</td>
                        <td>{{ $item->nome_produto_externo}}</td>
                        <td>{{ $item->produto->nome_produto}}</td>
                        <td>{{ $item->status == 1 ? 'ativo' : 'inativo'}}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            @include('shared._actions', [
                                'entity' => 'ProdutoExterno',
                                'id' => $item->id
                            ])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $produtoExterno->links() }}
            </div>
        </div>
    </div>
</div>
@endsection