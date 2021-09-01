<?php

require_once '../../controller/UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/TipoEquipDAO.php';
require_once 'SistemaVO.php';

class ChamadoVO extends SistemaVO
{

    private $idChamado;
    private $dataChamado;
    private $horaChamado;
    private $descProblema;
    private $dataAtendimento;
    private $horaAtendimento;
    private $dataEncerramento;
    private $horaEncerramento;
    private $laudoTecnico;
    private $idEquipamento;
    private $idUsuarioFunc;
    private $idUsuarioTec;

    public function setIdChamado($idchamado)
    {
        $this->idChamado = $idchamado;
    }
    public function getIdChamado()
    {
        return $this->idChamado;
    }

    public function setDataChamado($datachamado)
    {
        $this->dataChamado = $datachamado;
    }
    public function getDataChamado()
    {
        return $this->dataChamado;
    }

    public function setHoraChamado($horachamado)
    {
        $this->horaChamado = $horachamado;
    }
    public function getHoraChamado()
    {
        return $this->horaChamado;
    }

    public function setDescProblema($descproblema)
    {
        $this->descProblema = UtilCTRL::TirarCaracteresEspeciais(trim(ltrim($descproblema)));
    }
    public function getDescProblema()
    {
        return $this->descProblema;
    }

    public function setDataAtendimento($dataatendimento)
    {
        $this->dataAtendimento = $dataatendimento;
    }
    public function getDataAtendimento()
    {
        return $this->dataAtendimento;
    }

    public function setHoraAtendimento($horaatendimento)
    {
        $this->horaAtendimento = $horaatendimento;
    }
    public function getHoraAtendimento()
    {
        return $this->horaAtendimento;
    }

    public function setDataEncerramento($dataencerramento)
    {
        $this->dataEncerramento = $dataencerramento;
    }
    public function getDataEncerramento()
    {
        return $this->dataEncerramento;
    }

    public function setHoraEncerramento($horaencerramento)
    {
        $this->horaEncerramento = $horaencerramento;
    }
    public function getHoraEncerramento()
    {
        return $this->horaEncerramento;
    }

    public function setLaudoTecnico($laudotecnico)
    {
        $this->laudoTecnico = trim(ltrim($laudotecnico));
    }
    public function getLaudoTecnico()
    {
        return $this->laudoTecnico;
    }

    public function setIdEquipamento($idequipamento)
    {
        $this->idEquipamento = $idequipamento;
    }
    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }

    public function setIdUsuarioFunc($usuariofunc)
    {
        $this->idUsuarioFunc = $usuariofunc;
    }
    public function getIdUsuarioFunc()
    {
        return $this->idUsuarioFunc;
    }

    public function setUsuarioTec($usuariotec)
    {
        $this->idUsuarioTec = $usuariotec;
    }
    public function getIdUsuarioTec()
    {
        return $this->idUsuarioTec;
    }
}
