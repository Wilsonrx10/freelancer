<!-- codigo_produto_externo Form Product -->
<div class="form-group @if ($errors->has('codigo_produto_externo')) has-error @endif">
    {!! Form::label('codigo_produto_externo', 'codigo_produto_externo') !!}
    {!! Form::text('codigo_produto_externo', null, ['class' => 'form-control', 'placeholder' => 'codigo_produto_externo']) !!}
    @if ($errors->has('codigo_produto_externo')) <p class="help-block">{{ $errors->first('codigo_produto_externo') }}</p> @endif
</div>

<!-- nome_produto_externo Form Product -->
<div class="form-group @if ($errors->has('nome_produto_externo')) has-error @endif">
    {!! Form::label('nome_produto_externo', 'nome_produto_externo') !!}
    {!! Form::text('nome_produto_externo', null, ['class' => 'form-control', 'placeholder' => 'nome_produto_externo']) !!}
    @if ($errors->has('nome_produto_externo')) <p class="help-block">{{ $errors->first('nome_produto_externo') }}</p> @endif
</div>


<!-- Product Form Select -->
<div class="form-group @if ($errors->has('produto')) has-error @endif">
    {!! Form::label('produto', 'Produto') !!}
    {!! Form::select('produto', $produtos->pluck('nome_produto', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um produto']) !!} 
    @if ($errors->has('produto')) <p class="help-block">{{ $errors->first('produto') }}</p> @endif
</div>

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush