<?php

class User
{
    public $id;
    public $nome;
    public $uriImagem;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getUriImagem()
    {
        return $this->uriImagem;
    }
    public function setUriImagem($uriImagem)
    {
        $this->uriImagem = $uriImagem;
    }
}