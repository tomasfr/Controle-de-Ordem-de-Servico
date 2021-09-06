<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/ChamadoDAO.php';

define('AbrirChamado', 'AbrirChamado');

class ChamadoCRTL
{

    public function FiltrarEquipamentosChamado()
    {
        $dao = new ChamadoDAO();
        return $dao->FiltrarEquipamentosChamado(UtilCTRL::IdSetorLogado(), 1);
    }

    public function AbrirChamado(ChamadoVO $vo)
    {
        if ($vo->getIdEquipamento() == '' || $vo->getDescProblema() == '')
            return 0;

        $vo->setFuncaoErro(AbrirChamado);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $vo->setIdUsuarioFunc(UtilCTRL::CodigoLogado());
        $vo->setDataChamado(UtilCTRL::DataAtual());
        $vo->setHoraChamado(UtilCTRL::HoraAtual());

        $dao = new ChamadoDAO();
        return $dao->AbrirChamado($vo);
    }

    public function FiltrarChamados($situacao)
    {
        $dao = new ChamadoDAO();
        return $dao->FiltrarChamados($situacao);
    }
}
