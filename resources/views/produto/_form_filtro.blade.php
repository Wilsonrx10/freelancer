<!-- Nome Form Input -->
<div class="form-group @if ($errors->has('nome_produto')) has-error @endif">
    <label for="nome_produto">{{ __('nome do produto') }}</label>
    <input id="nome_produto" type="text" class="form-control @error('nome_produto') is-invalid @enderror" name="nome_produto" value="{{(isset($filtro->nome_produto) ? $filtro->nome_produto : old('nome_produto'))}}" autocomplete="nome_produto" autofocus>
    @if ($errors->has('nome_produto'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nome_produto') }}</strong>
        </span>
    @endif
</div>

<!-- id Form Input -->
<div class="form-group @if ($errors->has('id')) has-error @endif">
    <label for="id">{{ __('id do produto') }}</label>
    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{(isset($filtro->id) ? $filtro->id : old('id'))}}" autocomplete="id" autofocus>
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