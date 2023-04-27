@extends('layouts.app')

@section('title', 'Editar Usuário ' . $pagamento->id)

@section('content')
<div class="container-fluid table-responsive" style="min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3>Editando {{ $pagamento->id_pagamento_externo }}</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    <a href="{{ (isset($pagamento) && Auth::user()->id_tipo_usuario == App\Constants::tipoUsuarioAdmin ? route('pagamentos.index') : route('home'))  }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::model($pagamento, ['method' => 'PUT', 'route' => ['pagamentos.update',  $pagamento->id ] ]) !!}
                        @include('pagamento._form')
                        <!-- Form Button Submit -->
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        @if(\Auth::user()->id_tipo_usuario == \App\Constants::tipoUsuarioAdmin)
                            <!-- Form Button Cancelar -->
                            <a href="{{ route('pagamentos.index') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>Cancelar</a>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection