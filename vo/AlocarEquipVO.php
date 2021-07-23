<?php

class AlocarEquipVO{

    private $idAlocarEquip;
    private $sitAlocar;
    private $dataAlocar;
    private $dataRemover;
    private $idEquipamento;
    private $idSetor;

    public function setIdAlocarEquip($id){
        $this->idAlocarEquip = $id;
    }
    public function getIdAlocarEquip(){
        return $this->idAlocarEquip;
    }
    
    public function setSitAlocar($sitalocar){
        $this->sitAlocar = $sitalocar;
    }
    public function getSitAlocar(){
        return $this->sitAlocar;
    }
    
    public function setDataAlocar($dataalocar){
        $this->dataAlocar = $dataalocar;
    }
    public function getDataAlocar(){
        return $this->dataAlocar;
    }
    
    public function setDataRemover($dataremover){
        $this->dataRemover = $dataremover;
    }
    public function getDataRemover(){
        return $this->dataRemover;
    }
    
    public function setIdEquip($idequip){
        $this->idEquipamento = $idequip;
    }
    public function getIdEquip(){
        return $this->idEquipamento;
    }
    
    public function setIdSetor($idsetor){
        $this->idSetor = $idsetor;
    }
    public function getIdSetor(){
        return $this->idSetor;
    }

}