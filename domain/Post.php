<?php

class Post
{
    public $id;
    public $titulo;
    public $uriImagem;
    public $uriImagemBanner;
    public $sumario;
    public $conteudo;
    public $ehFavorito;
    public $comentarios = [];


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }


    public function getUriImagem()
    {
        return $this->uriImagem;
    }
    public function setUriImagem($uriImagem)
    {
        $this->uriImagem = $uriImagem;
    }


    public function getUriImagemBanner()
    {
        return $this->uriImagemBanner;
    }
    public function setUriImagemBanner($uriImagemBanner)
    {
        $this->uriImagemBanner = $uriImagemBanner;
    }


    public function getSumario()
    {
        return $this->sumario;
    }
    public function setSumario($sumario)
    {
        $this->sumario = $sumario;
    }


    public function getConteudo()
    {
        return $this->conteudo;
    }
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }


    public function getEhFavorito()
    {
        return $this->ehFavorito;
    }
    public function setEhFavorito($ehFavorito)
    {
        if( $ehFavorito === 'true' || $ehFavorito === true || $ehFavorito === 1 ){
            $this->ehFavorito = true;
        }
        else{
            $this->ehFavorito = false;
        }
    }


    public function getComentarios()
    {
        return $this->comentarios;
    }
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }
}