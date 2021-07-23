<?php

require_once 'SistemaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/UtilCTRL.php';

class UsuarioVO extends SistemaVO
{

    private $idUser;
    private $nomeUser;
    private $cpf;
    private $senhaUser;
    private $tipoUser;
    private $statusUser;

    public function setIdUser($id)
    {
        $this->idUser = $id;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setNomeUser($nome)
    {
        $this->nomeUser = trim(ltrim($nome));
    }
    public function getNomeUser()
    {
        return $this->nomeUser;
    }

    public function setCpf($cpf)
    {
        $this->cpf = UtilCTRL::TirarCaracteresEspeciais(trim(ltrim($cpf)));
    }
    public function getCpf()
    {
        return $this->cpf;
    }

    public function setSenha($senha)
    {
        $this->senhaUser = trim(ltrim($senha));
    }
    public function getSenha()
    {
        return $this->senhaUser;
    }

    public function setTipo($tipo)
    {
        $this->tipoUser = $tipo;
    }
    public function getTipo()
    {
        return $this->tipoUser;
    }

    public function setStatus($status)
    {
        $this->statusUser = trim(ltrim($status));
    }
    public function getStatus()
    {
        return $this->statusUser;
    }
}
