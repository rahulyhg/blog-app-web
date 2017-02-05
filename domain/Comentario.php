<?php

class Comentario
{
    public $id;
    public $user;
    public $mensagem;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }


    public function getMensagem()
    {
        return $this->mensagem;
    }
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }
}