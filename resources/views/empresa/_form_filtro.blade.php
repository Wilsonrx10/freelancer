<!-- Nome Form Input -->
<div class="form-group @if ($errors->has('nome_empresa')) has-error @endif">
    <label for="nome_empresa">{{ __('nome da empresa') }}</label>
    <input id="nome_empresa" type="text" class="form-control @error('nome_empresa') is-invalid @enderror" name="nome_empresa" value="{{(isset($filtro->nome_empresa) ? $filtro->nome_empresa : old('nome_empresa'))}}" autocomplete="nome_empresa" autofocus>
    @if ($errors->has('nome_empresa'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nome_empresa') }}</strong>
        </span>
    @endif
</div>
<!-- CNPJ Form Input -->
<div class="form-group @if ($errors->has('inscricao_ativa')) has-error @endif">
    <label for="cnpj">{{ __('cnpj') }}</label>
    <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{(isset($filtro->cnpj) ? $filtro->cnpj : old('cnpj'))}}" autocomplete="cnpj" autofocus>
    @if ($errors->has('cnpj'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cnpj') }}</strong>
        </span>
    @endif
</div>

<!-- id Form Input -->
<div class="form-group @if ($errors->has('id_empresa')) has-error @endif">
    <label for="id_empresa">{{ __('id da empresa') }}</label>
    <input id="id_empresa" type="text" class="form-control @error('id_empresa') is-invalid @enderror" name="id" value="{{(isset($filtro->id_empresa) ? $filtro->id_empresa : old('id_empresa'))}}" autocomplete="id_empresa" autofocus>
    @if ($errors->has('id_empresa'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('id_empresa') }}</strong>
        </span>
    @endif
</div>

<!-- status Form Input -->
<div class="form-group @if ($errors->has('status')) has-error @endif">
    <label for="status">{{ __('status') }}</label>
    <select class="form-control" name="status">
        <option {{ isset($filtro->status) && $filtro->status == 1 ? "selected" : "" }} value="1">ativo</option>
        <option {{ isset($filtro->status) && $filtro->status == 0 ? "selected" : "" }} value="0">inativo</option>        
    </select>
    @if ($errors->has('status'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>