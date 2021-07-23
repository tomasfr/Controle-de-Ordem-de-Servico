<?php

require_once 'SistemaVO.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/UtilCTRL.php';

class TipoEquipVO extends SistemaVO
{

    private $idTipo;
    private $nomeTipo;

    public function setIdTipo($id)
    {
        $this->idTipo = $id;
    }
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function setNomeTipo($nome)
    {
        $this->nomeTipo = UtilCTRL::TirarScriptsMaliciosos(trim(ltrim($nome)));
    }
    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }
}
