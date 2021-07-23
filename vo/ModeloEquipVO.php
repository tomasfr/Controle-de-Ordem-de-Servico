<?php

require_once 'SistemaVO.php';

class ModeloEquipVO extends SistemaVO{

    private $idModelo;
    private $nomeModelo;

    public function setIdModelo($idmodelo){
        $this->idModelo = $idmodelo;
    }
    public function getIdModelo(){
        return $this->idModelo;
    }
    
    public function setNomeModelo($nomemodelo){
        $this->nomeModelo = trim(ltrim($nomemodelo));
    }
    public function getNomeModelo(){
        return $this->nomeModelo;
    }

}