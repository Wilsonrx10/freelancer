<!-- Form Input name_empresa -->
<div class="form-group @if ($errors->has('nome_empresa')) has-error @endif">
    {!! Form::label('nome_empresa', 'Nome da Empresa') !!}
    {!! Form::text('nome_empresa', null, ['class' => 'form-control', 'placeholder' => 'Nome da Empresa']) !!}
    @if ($errors->has('nome_empresa')) <p class="help-block">{{ $errors->first('nome_empresa') }}</p> @endif
</div>

<!-- Form Input cnpj -->
<div class="form-group @if ($errors->has('cnpj')) has-error @endif">
    {!! Form::label('cnpj', 'Cnpj') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control', 'placeholder' => 'cnpj']) !!}
    @if ($errors->has('cnpj')) <p class="help-block">{{ $errors->first('cnpj') }}</p> @endif
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

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush