<!-- Url Form Product -->
<div class="form-group @if ($errors->has('url')) has-error @endif">
    {!! Form::label('url', 'url do produto') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'url do produto']) !!}
    @if ($errors->has('url')) <p class="help-block">{{ $errors->first('url') }}</p> @endif
</div>

<!-- Product Form Input -->
<div class="form-group @if ($errors->has('produto')) has-error @endif">
    {!! Form::label('produto', 'Produto') !!}
    {!! Form::select('produto', $produtos->pluck('nome_produto', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um produto']) !!} 
    @if ($errors->has('produto')) <p class="help-block">{{ $errors->first('produto') }}</p> @endif
</div>
@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush