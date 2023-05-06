<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * Comentário | Exibir listagem
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Post::select(
            'posts.id',
            'posts.user_id',
            'posts.created_at',
            DB::raw("CONCAT(LEFT(body , 25), IF(LENGTH(body) > 10,'...',''))  as body"),
            DB::raw("CONCAT(LEFT(title , 25), IF(LENGTH(title) > 10,'...',''))  as title")
        );

        if (!(Auth::user()->id_tipo_usuario == Constants::tipoUsuarioAdmin)) {
            $result = $result->where('user_id', Auth::user()->id);
        }
        $result = $result->latest()->paginate();
        return view('post.index', compact('result'));
    }

    /**
     * Comentário | Exibir formulario de Criação
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Comentário | Gravar novo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'body' => 'required|min:10'
        ]);
        Post::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        flash('Comentário adicionado.');

        return \Redirect::route('posts.index');
    }

    /**
     * Comentário | Exibi usuário informado
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Comentário | Exibir formulario de edição
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);

        return view('post.edit', compact('post'));
    }

    /**
     * Comentário | Editar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);

        $me = $request->user();

        $post = Post::findOrFail($post->id);

        $post->update($request->all());

        flash()->success('Comentário atualizado.');

        return \Redirect::route('posts.index');
    }

    /**
     * Comentário | Remover
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $me = Auth::user();

        if( $me->hasRole('Admin') ) {
            $post = Post::findOrFail($post->id);
        } else {
            $post = Post::findOrFail($post->id)->where('user_id' ,Auth::user()->id);
        }

        $post->delete();

        flash()->success('Post deletado.');

        return \Redirect::route('posts.index');
    }
}
