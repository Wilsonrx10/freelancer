<!-- code_telegram_canal Form Input -->
<div class="form-group @if ($errors->has('code_telegram_canal')) has-error @endif">
    <label for="code_telegram_canal">{{ __('code_telegram_canal') }}</label>
    <input id="code_telegram_canal" type="text" class="form-control @error('code_telegram_canal') is-invalid @enderror" name="code_telegram_canal" value="{{(old('code_telegram_canal'))}}" autocomplete="code_telegram_canal" autofocus>
    @if ($errors->has('code_telegram_canal'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('code_telegram_canal') }}</strong>
        </span>
    @endif
</div>

<!-- nome_telegram_canal Form Input -->
<div class="form-group @if ($errors->has('nome_telegram_canal')) has-error @endif">
    <label for="nome_telegram_canal">{{ __('nome_telegram_canal') }}</label>
    <input id="nome_telegram_canal" type="text" class="form-control @error('nome_telegram_canal') is-invalid @enderror" name="nome_telegram_canal" value="{{(old('nome_telegram_canal'))}}" autocomplete="nome_telegram_canal" autofocus>
    @if ($errors->has('nome_telegram_canal'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nome_telegram_canal') }}</strong>
        </span>
    @endif
</div>

<!-- convite Form Input -->
<div class="form-group @if ($errors->has('convite')) has-error @endif">
    <label for="convite">{{ __('convite') }}</label>
    <input id="convite" type="text" class="form-control @error('convite') is-invalid @enderror" name="convite" value="{{(old('convite'))}}" autocomplete="convite" autofocus>
    @if ($errors->has('convite'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('convite') }}</strong>
        </span>
    @endif
</div>

<!-- id Form Input -->
<div class="form-group @if ($errors->has('id')) has-error @endif">
    <label for="id">{{ __('id do produto') }}</label>
    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id_produto" value="{{(old('id'))}}" autocomplete="id" autofocus>
    @if ($errors->has('id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('id') }}</strong>
        </span>
    @endif
</div>

<!-- status Form Input -->
<div class="form-group @if ($errors->has('status')) has-error @endif">
    <label for="status">{{ __('status') }}</label>
    <select class="form-control" name="status" id="status">
        <option value="1">ativo</option>
        <option value="0">inativo</option>
    </select>
    @if ($errors->has('status'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>


<!-- canal_admin Form Input -->
<div class="form-group @if ($errors->has('canal_admin')) has-error @endif">
    <label for="canal_admin">{{ __('canal_admin') }}</label>
    <select class="form-control" name="canal_admin" id="canal_admin">
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select>
    @if ($errors->has('canal_admin'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('canal_admin') }}</strong>
        </span>
    @endif
</div>