<!-- produto telegram Form Product -->

<div class="form-group @if ($errors->has('code_telegram_canal')) has-error @endif">
    {!! Form::label('code_telegram_canal', 'code_telegram_canal') !!}
    {!! Form::text('code_telegram_canal', null, ['class' => 'form-control', 'placeholder' => 'code_telegram_canal']) !!}
    @if ($errors->has('code_telegram_canal')) <p class="help-block">{{ $errors->first('code_telegram_canal') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('nome_telegram_canal')) has-error @endif">
    {!! Form::label('nome_telegram_canal', 'nome_telegram_canal') !!}
    {!! Form::text('nome_telegram_canal', null, ['class' => 'form-control', 'placeholder' => 'nome_telegram_canal']) !!}
    @if ($errors->has('nome_telegram_canal')) <p class="help-block">{{ $errors->first('nome_telegram_canal') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('convite')) has-error @endif">
    {!! Form::label('convite', 'convite') !!}
    {!! Form::text('convite', null, ['class' => 'form-control', 'placeholder' => 'convite']) !!}
    @if ($errors->has('convite')) <p class="help-block">{{ $errors->first('convite') }}</p> @endif
</div>

<!-- Product Form Select -->
<div class="form-group @if ($errors->has('id_produto')) has-error @endif">
    {!! Form::label('produto', 'Produto') !!}
    {!! Form::select('id_produto', $produtos->pluck('nome_produto', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um produto']) !!} 
    @if ($errors->has('id_produto')) <p class="help-block">{{ $errors->first('id_produto') }}</p> @endif
</div>

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush