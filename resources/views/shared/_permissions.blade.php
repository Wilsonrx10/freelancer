<div class="container-fluid table-responsive" style="min-width: 100%; max-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header" id="{{ isset($title) ? Illuminate\Support\Str::slug($title) :  'permissionHeading' }}">
            <h4 class="mb-0">
                <a role="button" data-toggle="collapse" href="#dd-{{ isset($title) ? Illuminate\Support\Str::slug($title) :  'permissionHeading' }}" aria-expanded="{{ isset($closed) ? 'true' : 'false' }}" aria-controls="dd-{{ isset($title) ? Illuminate\Support\Str::slug($title) :  'permissionHeading' }}">
                    {{ $title ?? 'Sobrescrever Permissõess' }} {!! isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : '' !!}
                </a>
            </h4>
        </div>
        <div id="dd-{{ isset($title) ? Illuminate\Support\Str::slug($title) :  'permissionHeading' }}" class="card-collapse collapse {{ $closed ?? 'in' }}" role="tabcard" aria-labelledby="dd-{{ isset($title) ? Illuminate\Support\Str::slug($title) :  'permissionHeading' }}">
            <div class="card-body">
                <div class="row">
                    @foreach($permissions as $perm)
                        <?php
                            $per_found = null;

                            if( isset($role) ) {
                                $per_found = $role->hasPermissionTo($perm->name);
                            }

                            if( isset($user)) {
                                $per_found = $user->hasDirectPermission($perm->name);
                            }
                        ?>

                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="{{ Illuminate\Support\Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
