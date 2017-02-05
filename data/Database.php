<?php

class Database
{
    public static function saveDatabase( $database, $posts ){
        $database = fopen( $database, 'w' );
        fwrite( $database, json_encode($posts) );
        fclose( $database );
    }


    public static function getPosts( $database ){
        $dadosString = file_get_contents( $database );
        $posts = json_decode($dadosString);
        return $posts;
    }
}