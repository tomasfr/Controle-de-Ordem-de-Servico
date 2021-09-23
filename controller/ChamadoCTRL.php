<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/ChamadoDAO.php';

define('AbrirChamado', 'AbrirChamado');
define('AtenderChamado', 'AtenderChamado');
define('FinalizarChamado', 'FinalizarChamado');

class ChamadoCTRL
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

    public function FiltrarChamado($situacao, $idSetor)
    {
        $dao = new ChamadoDAO();
        return $dao->FiltrarChamado($idSetor, $situacao, 2);
    }

    public function DetalharChamado($id)
    {
        $dao = new ChamadoDAO();
        return $dao->DetalharChamado($id);
    }

    public function AtenderChamado(ChamadoVO $vo)
    {
        $vo->setDataAtendimento(UtilCTRL::DataAtual());
        $vo->setHoraAtendimento(UtilCTRL::HoraAtual());
        $vo->setIdUsuarioTec(UtilCTRL::CodigoLogado());

        $vo->setFuncaoErro(AtenderChamado);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new ChamadoDAO();
        return $dao->AtenderChamado($vo);
    }

    public function FinalizarChamado(ChamadoVO $vo)
    {
        $vo->setDataEncerramento(UtilCTRL::DataAtual());
        $vo->setHoraEncerramento(UtilCTRL::HoraAtual());
        $vo->setIdUsuarioTec(UtilCTRL::CodigoLogado());

        $vo->setFuncaoErro(FinalizarChamado);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new ChamadoDAO();
        return $dao->FinalizarChamado($vo);
    }

    public function GerarGrafico()
    {
        $dao = new ChamadoDAO();
        return $dao->GerarGrafico();
    }
}
