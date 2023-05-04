@extends('layouts.app')

@section('title', 'Usuario Empresa')

@section('content')
 <div class="container-fluid table-responsive" style="min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3>Vincular novo Usuario</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('userEmpresa.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['route' => ['userEmpresa.store'] ]) !!}
                        @include('userEmpresa._form')
                        <!-- Submit Form Button -->
                        {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection