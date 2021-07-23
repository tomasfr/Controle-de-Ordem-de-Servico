<?php

require_once 'UsuarioVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/UtilCTRL.php';

class TecnicoVO extends UsuarioVO
{

    private $email;
    private $endereco;
    private $tel;

    public function setEmail($email)
    {
        $this->email = trim(ltrim($email));
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = trim(ltrim($endereco));
    }
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setTel($tel)
    {
        $this->tel = UtilCTRL::TirarCaracteresEspeciais(trim(ltrim($tel)));
    }
    public function getTel()
    {
        return $this->tel;
    }
}
