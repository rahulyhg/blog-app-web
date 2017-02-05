<?php
    /*
     * Caso queira encontrar alguns erros em sua aplicação backend,
     * descomente a linha abaixo.
     * */
    /*ini_set('display_errors', 1);*/

    include '../domain/User.php';
    include '../domain/Comentario.php';
    include '../domain/Post.php';
    include '../apl/AplPost.php';


    /*
     * A superglobal GET é para quando estiver realizando testes pelo navegador
     * para não precisar configurar toda a APP para simples testes no backend.
     * */
    $dados = isset($_POST['metodo']) ? $_POST : $_GET;


    if( strcasecmp( $dados['metodo'], 'get-posts' ) == 0 ){
        sleep(1);
        $motosJson = AplPost::getPostsComoJson();
        echo $motosJson;
    }


    else if( strcasecmp( $dados['metodo'], 'update-favorito-post' ) == 0 ){
        $post = new Post();
        $post->setId( $dados['id'] );
        $post->setEhFavorito( $dados['eh-favorito'] );

        $postJson = AplPost::updateFavoritoPost( $post );

        header('X-Blog-App: ' . $dados['metodo']);
        echo $postJson;
    }


    else if( strcasecmp( $dados['metodo'], 'novo-comentario-post' ) == 0 ){
        $user = new User();
        $user->setNome( $dados['nome'] );

        /*
         * Para não complicar ainda mais o exemplo no Android,
         * a imagem de perfil do usuário será adicionada aqui.
         * */
        $user->setUriImagem( 'https://s3-sa-east-1.amazonaws.com/gremio-prod/direct_uploads/staff/person_placeholder.png' );

        $comentario = new Comentario();
        $comentario->setMensagem( $dados['comentario'] );
        $comentario->setUser( $user );

        $post = new Post();
        $post->setId( $dados['id'] );

        $comentarioJson = AplPost::insertComentario( $post, $comentario );

        header('X-Blog-App: ' . $dados['metodo']);
        echo $comentarioJson;
    }
