<div class="row">
        <div class="col-xs-12 col-md-12 flex">
    <a href="{{ route($entity.'.edit', [Illuminate\Support\Str::singular($entity) => $id])  }}" class="btn btn-sm btn-secondary mb-2 w-100 d-block">
        ✏️</a>
        </div>
        <div class="col-xs-12 col-md-12">
        {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', [Illuminate\Support\Str::singular($entity) => $id]), 'onSubmit' => 'return confirm("Deseja deletar este registro ?")']) !!}
            <button type="submit" class="btn btn-sm btn-outline-danger mb-2 w-100 d-block">
                ❌
            </button>
        {!! Form::close() !!}
        </div>
</div>
