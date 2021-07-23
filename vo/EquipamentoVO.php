<?php

require_once 'SistemaVO.php';

class EquipamentoVO extends  SistemaVO
{

    private $idEquip;
    private $identEquip;
    private $descEquip;
    private $idTipoEquip;
    private $idModeloEquip;

    public function setIdEquip($id)
    {
        $this->idEquip = $id;
    }
    public function getIdEquip()
    {
        return $this->idEquip;
    }

    public function setIdentEquip($ident)
    {
        $this->identEquip = trim(ltrim($ident));
    }
    public function getIdentEquip()
    {
        return $this->identEquip;
    }

    public function setDescEquip($desc)
    {
        $this->descEquip = trim(ltrim($desc));
    }
    public function getDescEquip()
    {
        return $this->descEquip;
    }

    public function setIdTipoEquip($idtipo)
    {
        $this->idTipoEquip = $idtipo;
    }
    public function getIdTipoEquip()
    {
        return $this->idTipoEquip;
    }

    public function setIdModeloEquip($idmodelo)
    {
        $this->idModeloEquip = $idmodelo;
    }
    public function getIdModeloEquip()
    {
        return $this->idModeloEquip;
    }
}
