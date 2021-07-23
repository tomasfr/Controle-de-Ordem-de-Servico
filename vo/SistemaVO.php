<?php

class SistemaVO
{

    private $idUserLogado;
    private $dataErro;
    private $horaErro;
    private $funcaoErro;
    private $msgErro;

    public function setIdUserErro($id)
    {
        $this->idUserLogado = $id;
    }
    public function getIdUserErro()
    {
        return $this->idUserLogado;
    }

    public function setDataErro($data)
    {
        $this->dataErro = $data;
    }
    public function getDataErro()
    {
        return $this->dataErro;
    }

    public function setHoraErro($hora)
    {
        $this->horaErro = $hora;
    }
    public function getHoraErro()
    {
        return $this->horaErro;
    }

    public function setFuncaoErro($funcao)
    {
        $this->funcaoErro = $funcao;
    }
    public function getFuncaoErro()
    {
        return $this->funcaoErro;
    }

    public function setMsgErro($msg)
    {
        $this->msgErro = $msg;
    }
    public function getMsgErro()
    {
        return $this->msgErro;
    }
}
