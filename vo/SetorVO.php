<?php

require_once 'SistemaVO.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/UtilCTRL.php';

class SetorVO extends SistemaVO
{

    private $idSetor;
    private $nomeSetor;

    public function setIdSetor($id)
    {
        $this->idSetor = $id;
    }
    public function getIdSetor()
    {
        return $this->idSetor;
    }

    public function setNomeSetor($nome)
    {
        $this->nomeSetor = UtilCTRL::TirarScriptsMaliciosos(trim(ltrim($nome)));
    }
    public function getNomeSetor()
    {
        return $this->nomeSetor;
    }
}
