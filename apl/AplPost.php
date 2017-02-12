<?php

include '../data/Database.php';

class AplPost
{
    public static function getPostsComoJson(){
        $posts = Database::getPosts( '../data/posts.json' );

        /*
         * Somente posts são retornados, comentários são
         * retornados em uma requisição específica e AplPost.
         * */
        foreach($posts as $post){
            $post->comentarios = [];
        }
        return json_encode( $posts );
    }

    public static function updateFavoritoPost( Post $post ){
        $posts = Database::getPosts( '../data/posts.json' );

        foreach( $posts as $p ){
            if( $p->id == $post->getId() ){
                $p->ehFavorito = $post->getEhFavorito();
                Database::saveDatabase( '../data/posts.json', $posts );
                break;
            }
        }
        return json_encode( $post );
    }

    public static function getComentariosComoJson( Post $post ){
        $posts = Database::getPosts( '../data/posts.json' );
        $comentarios = [];

        foreach($posts as $p){
            if( $p->id == $post->getId() ){
                $comentarios = $p->comentarios;
                break;
            }
        }
        foreach($comentarios as $c){
            $c->post = $post;
        }

        return json_encode( $comentarios );
    }

    public static function insertComentario( Post $post, Comentario $comentario ){
        $posts = Database::getPosts( '../data/posts.json' );

        self::retrieveMaxId( $comentario );

        foreach( $posts as $p ){
            if( $p->id == $post->getId() ){
                array_unshift( $p->comentarios, $comentario );
                Database::saveDatabase( '../data/posts.json', $posts );
                break;
            }
        }
        return json_encode( $comentario );
    }

    private static function retrieveMaxId( Comentario $comentario ){
        $posts = Database::getPosts( '../data/posts.json' );
        $maxComentarioId = 1;
        $maxUserId = 1;

        foreach( $posts as $p ){
            foreach( $p->comentarios as $c ){
                if( $maxComentarioId <= $c->id ){
                    $maxComentarioId = $c->id + 1;
                }
                if( $maxUserId <= $c->user->id ){
                    $maxUserId = $c->user->id + 1;
                }
            }
        }

        $comentario->setId( $maxComentarioId );
        $comentario->getUser()->setId( $maxUserId );
    }
}