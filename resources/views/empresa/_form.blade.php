<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('nome_empresa')) has-error @endif">
    {!! Form::label('nome_empresa', 'Nome da Empresa') !!}
    {!! Form::text('nome_empresa', null, ['class' => 'form-control', 'placeholder' => 'Nome da Empresa']) !!}
    @if ($errors->has('nome_empresa')) <p class="help-block">{{ $errors->first('nome_empresa') }}</p> @endif
</div>

<!-- Text Comentário Form Input -->
<div class="form-group @if ($errors->has('cnpj')) has-error @endif">
    {!! Form::label('cnpj', 'Cnpj') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control', 'placeholder' => 'cnpj']) !!}
    @if ($errors->has('cnpj')) <p class="help-block">{{ $errors->first('cnpj') }}</p> @endif
</div>

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush