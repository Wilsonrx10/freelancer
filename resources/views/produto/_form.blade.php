<!-- Name Form Input -->
<div class="form-group @if ($errors->has('nome_produto')) has-error @endif">
    {!! Form::label('nome_produto', 'Nome do produto') !!}
    {!! Form::text('nome_produto', null, ['class' => 'form-control', 'placeholder' => 'Nome do Produto']) !!}
    @if ($errors->has('nome_produto')) <p class="help-block">{{ $errors->first('nome_produto') }}</p> @endif
</div>

<!-- description Form Input -->
<div class="form-group @if ($errors->has('descricao')) has-error @endif">
    {!! Form::label('descricao', 'descricao') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'descricao']) !!}
    @if ($errors->has('descricao')) <p class="help-block">{{ $errors->first('descricao') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('icone')) has-error @endif">
    <label for="icone">Icone</label>
    <input type="file" name="icone">
    @if ($errors->has('icone')) <p class="help-block">{{ $errors->first('icone') }}</p> @endif
</div>

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush