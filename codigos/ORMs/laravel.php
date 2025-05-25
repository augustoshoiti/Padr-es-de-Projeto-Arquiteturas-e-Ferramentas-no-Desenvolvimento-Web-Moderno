<!-- CÓDIGO NÃO TESTADO --> 

<?php
    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {
        protected $fillable = ['title', 'content'];
    }


    // OPERAÇÕES CRUD

    // Criar um novo post
    Post::create([
        'title' => 'Título do Post',
        'content' => 'Conteúdo do post...',
    ]);

    // Buscar todos os posts
    $posts = Post::all();

    // Atualizar um post
    $post = Post::find(1);
    $post->title = 'Novo Título';
    $post->save();

    // Deletar um post
    Post::destroy(1);
?>

