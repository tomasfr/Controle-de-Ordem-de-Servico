<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/SetorDAO.php';

define('CadastrarSetor', 'CadastrarSetor');
define('AlterarSetor', 'AlterarSetor');
define('ExcluirSetor', 'ExcluirSetor');

class SetorCTRL
{

    public function CadastrarSetor(SetorVO $vo)
    {

        if ($vo->getNomeSetor() == '') {
            return 0;
        }

        $vo->setFuncaoErro(CadastrarSetor);
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());

        $dao = new SetorDAO();
        return $dao->CadastrarSetor($vo);
    }

    public function ConsultarSetor()
    {

        $dao = new SetorDAO();
        return $dao->ConsultarSetor();
    }

    public function AlterarSetor(SetorVO $vo)
    {

        if ($vo->getNomeSetor() == '') {

            return 0;
        }

        $vo->setFuncaoErro(AlterarSetor);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new SetorDAO();
        return $dao->AlterarSetor($vo);
    }

    public function ExcluirSetor(SetorVO $vo)
    {

        if ($vo->getIdSetor() == '') {
            return 0;
        }

        $vo->setFuncaoErro(ExcluirSetor);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new SetorDAO();
        return $dao->ExcluirSetor($vo);
    }
}
