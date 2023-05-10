<!-- codigo_produto_externo Form Input -->
<div class="form-group @if ($errors->has('codigo_produto_externo')) has-error @endif">
    <label for="codigo_produto_externo">{{ __('codigo_produto_externo') }}</label>
    <input id="codigo_produto_externo" type="text" class="form-control @error('codigo_produto_externo') is-invalid @enderror" name="codigo_produto_externo" value="{{(isset($filtro->codigo_produto_externo) ? $filtro->codigo_produto_externo : old('codigo_produto_externo') )}}" autocomplete="codigo_produto_externo" autofocus>
    @if ($errors->has('codigo_produto_externo'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('codigo_produto_externo') }}</strong>
        </span>
    @endif
</div>

<!-- nome_produto_externo Form Input -->
<div class="form-group @if ($errors->has('nome_produto_externo')) has-error @endif">
    <label for="nome_produto_externo">{{ __('nome_produto_externo') }}</label>
    <input id="nome_produto_externo" type="text" class="form-control @error('nome_produto_externo') is-invalid @enderror" name="nome_produto_externo" value="{{(isset($filtro->nome_produto_externo) ? $filtro->nome_produto_externo : old('nome_produto_externo') )}}" autocomplete="nome_produto_externo" autofocus>
    @if ($errors->has('nome_produto_externo'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nome_produto_externo') }}</strong>
        </span>
    @endif
</div>

<!-- id Form Input -->
<div class="form-group @if ($errors->has('id')) has-error @endif">
    <label for="id">{{ __('id do produto') }}</label>
    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id_produto" value="{{(isset($filtro->id) ? $filtro->id : old('id') )}}" autocomplete="id" autofocus>
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
        <option {{ isset($filtro->status) && $filtro->status == 1 ? "selected" : "" }} value="1">ativo</option>
        <option {{ isset($filtro->status) && $filtro->status == 0 ? "selected" : "" }} value="0">inativo</option>
    </select>
    @if ($errors->has('status'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>