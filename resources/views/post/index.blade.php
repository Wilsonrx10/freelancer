@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container-fluid table-responsive" style="width: max-content; min-width: 100%">
    <div class="card justify-content-center h-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">{{ $result->total() }} {{ Illuminate\Support\Str::plural('Comentários', $result->count()) }} </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_posts')
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Novo</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="data-table">
                <thead class="thead-dark">
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Autor</th>
                    <th>Data</th>
                    @can('edit_posts', 'delete_posts')
                        <th class="text-center">Ações</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($result as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->body }}</td>
                        <td>{{ $item->user['name'] }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        @can('edit_posts', 'delete_posts')
                        <td class="text-center">
                            @include('shared._actions', [
                                'entity' => 'posts',
                                'id' => $item->id
                            ])
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $result->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
