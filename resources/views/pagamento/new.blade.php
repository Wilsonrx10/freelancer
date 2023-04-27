@extends('layouts.app')

@section('title', 'Criar Usuário')

@section('content')
 <div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3>Criar Pagamento</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('pagamentos.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('pagamentos.store') }}">
                        <div class="form-group @if ($errors->has('id_pagamento_externo')) has-error @endif">
                            <label for="id_pagamento_externo">Id Pagamento</label>
                            <input id="id_pagamento_externo" type="id_pagamento_externo" class="form-control{{ $errors->has('id_pagamento_externo') ? ' is-invalid' : '' }}" name="id_pagamento_externo" value="{{(isset($pagamento->id_pagamento_externo) ? $pagamento->id_pagamento_externo : old('id_pagamento_externo'))}}" required>
                            @if ($errors->has('id_pagamento_externo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_pagamento_externo') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('data_inicio')) has-error @endif">
                            <label for="data_inicio">Data Início</label>
                            <input data-inputmask="'alias': 'datetime','inputFormat': 'dd/mm/yyyy'" class="form-control{{ $errors->has('data_inicio') ? ' is-invalid' : '' }}" data-inputmask-clearIncomplete="true" data-inputmask-autoUnmask="true" type="text" name="data_inicio" value="{{(isset($pagamento->data_inicio) ? date("d/m/Y", strtotime($pagamento->data_inicio)) : old('data_inicio'))}}" required/>
                            @if ($errors->has('data_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('data_inicio') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('data_fim')) has-error @endif">
                            <label for="data_fim">Data Fim</label>
                            <input data-inputmask="'alias': 'datetime','inputFormat': 'dd/mm/yyyy'" class="form-control{{ $errors->has('data_fim') ? ' is-invalid' : '' }}" data-inputmask-clearIncomplete="true" data-inputmask-autoUnmask="true" type="text" name="data_fim" value="{{(isset($pagamento->data_fim) ? date("d/m/Y", strtotime($pagamento->data_fim)) : old('data_fim'))}}" required/>
                            @if ($errors->has('data_fim'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('data_fim') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('id_produto_externo')) has-error @endif">
                            {!! Form::label('id_produto_externo', 'Produto Externo') !!}
                            <select class="form-control {{ $errors->has('id_produto_externo') ? ' is-invalid' : '' }}" id="id_produto_externo" name="id_produto_externo">
                                @foreach($result as $valor)
                                    <option {{((isset($pagamento->id_produto_externo) ? $pagamento->id_produto_externo : old('id_produto_externo')) == $valor->id ? "selected" : "")}} value="{{$valor->id}}">{{$valor->nome_produto_externo}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_produto_externo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_produto_externo') }}</strong>
                                </span>
                            @endif
                        </div>

                        @include('pagamento._form')
                        <button type="submit" class="btn btn-primary">
                            {{ __('Criar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection