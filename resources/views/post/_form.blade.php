<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Titulo') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
</div>

<!-- Text Comentário Form Input -->
<div class="form-group @if ($errors->has('body')) has-error @endif">
    {!! Form::label('body', 'Comentário') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Conteúdo']) !!}
    @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
</div>

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush