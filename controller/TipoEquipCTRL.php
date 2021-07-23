<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/TipoEquipDAO.php';

define('CadastrarTipo', 'CadastrarTipo');
define('ExcluirTipo', 'ExcluirTipo');
define('AlterarTipo', 'AlterarTipo');

class TipoEquipCTRL
{
    public function CadastrarTipo(TipoEquipVO $vo)
    {
        if ($vo->getNomeTipo() == '') {
            return 0;
        }

        //Preenchimento do sistemaVO para erro

        $vo->setFuncaoErro(CadastrarTipo);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());


        $dao = new TipoEquipDAO();
        return $dao->CadastrarTipo($vo);
    }

    public function ConsultarTipo()
    {

        $dao = new TipoEquipDAO();
        return $dao->ConsultarTipo();
    }

    public function AlterarTipo(TipoEquipVO $vo)
    {
        if ($vo->getNomeTipo() == '') {
            return 0;
        }

        $vo->setFuncaoErro(AlterarTipo);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtual());
        $vo->setHoraErro(UtilCTRL::DataAtualExibir());

        $dao = new TipoEquipDAO();
        return $dao->AlterarTipo($vo);
    }

    public function ExcluirTipo(TipoEquipVO $vo)
    {

        if ($vo->getIdTipo() == '') {
            return 0;
        }

        $vo->setFuncaoErro(ExcluirTipo);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new TipoEquipDAO();
        return $dao->ExcluirTipo($vo);
    }
}
