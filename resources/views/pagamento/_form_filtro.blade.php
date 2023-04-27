<!-- Email Form Input -->
<div class="form-group @if ($errors->has('inscricao_ativa')) has-error @endif">
    <label for="email">{{ __('Email') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{(isset($filtro->email) ? $filtro->email : old('email'))}}" autocomplete="email" autofocus>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<!-- Pagamento Form Input -->
<div class="form-group @if ($errors->has('inscricao_ativa')) has-error @endif">
    <label for="id_pagamento_externo">{{ __('Codigo Pagamento') }}</label>
    <input id="id_pagamento_externo" type="text" class="form-control @error('id_pagamento_externo') is-invalid @enderror" name="id_pagamento_externo" value="{{(isset($filtro->id_pagamento_externo) ? $filtro->id_pagamento_externo : old('id_pagamento_externo'))}}" autocomplete="id_pagamento_externo" autofocus>
    @if ($errors->has('id_pagamento_externo'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('id_pagamento_externo') }}</strong>
        </span>
    @endif
</div>

<!-- Produto Form Input -->
<div class="form-group @if ($errors->has('id_produto')) has-error @endif">
    <label for="id_produto">{{ __('Produto') }}</label>
    <select class="form-control {{ $errors->has('id_produto') ? ' is-invalid' : '' }}" id="id_produto" name="id_produto" required autofocus>
        <option selected value="-1">Todos</option>
        @foreach($produtos as $produto)
            @if(isset($filtro->id_produto))
                <option {{($filtro->id_produto == $produto->id ? "selected" : "")}} value="{{$produto->id}}">{{$produto->nome_produto}}</option>
            @else
                <option value="{{$produto->id}}">{{$produto->nome_produto}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group @if ($errors->has('inscricao_ativa')) has-error @endif">
    <label for="inscricao_ativa">Inscrição Ativa</label>
    <select class="form-control {{ $errors->has('inscricao_ativa') ? ' is-invalid' : '' }}" id="inscricao_ativa" name="inscricao_ativa" required autofocus>
        <option selected value="-1">Todos</option>
        @foreach(App\Constants::filtrosPagamento as $id => $item)
            @if(isset($filtro->inscricao_ativa))
                <option {{($filtro->inscricao_ativa == $id ? "selected" : "")}} value="{{$id}}">{{$item}}</option>
            @else
                <option value="{{$id}}">{{$item}}</option>
            @endif
        @endforeach
    </select>

    @if ($errors->has('inscricao_ativa'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('inscricao_ativa') }}</strong>
        </span>
    @endif
</div>