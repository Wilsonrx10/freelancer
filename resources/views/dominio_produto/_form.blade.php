<!-- Url Form Product -->
<div class="form-group @if ($errors->has('url')) has-error @endif">
    {!! Form::label('url', 'url do produto') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'url do produto']) !!}
    @if ($errors->has('url')) <p class="help-block">{{ $errors->first('url') }}</p> @endif
</div>

<!-- Status Form select -->
<div class="form-group @if ($errors->has('status')) has-error @endif">
    {!! Form::label('status', 'status') !!}
    {!! Form::select('status', [
        '1' => 'Ativo',
        '0' => 'Inativo'
    ], null, ['class' => 'form-control', 'placeholder' => 'Selecione um status']) !!}    
    @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
</div>

<!-- Product Form select -->
<div class="form-group @if ($errors->has('id_produto')) has-error @endif">
    {!! Form::label('produto', 'Produto') !!}
    {!! Form::select('id_produto', $produtos->pluck('nome_produto', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um produto']) !!} 
    @if ($errors->has('id_produto')) <p class="help-block">{{ $errors->first('id_produto') }}</p> @endif
</div>
@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush