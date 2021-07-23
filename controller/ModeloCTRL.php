<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/ModeloDAO.php';

define('CadastrarModelo', 'CadastrarModelo');
define('AlterarModelo', 'AlterarModelo');
define('ExcluirModelo', 'ExcluirModelo');

class ModeloCTRL
{
    public function CadastrarModelo(ModeloEquipVO $vo)
    {
        if ($vo->getNomeModelo() == '') {
            return 0;
        }

        //preeencher as propriedades do ERRO
        $vo->setFuncaoErro(CadastrarModelo);
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());

        $dao = new ModeloDAO();
        return $dao->CadastrarModelo($vo);
    }

    public function AlterarModelo(ModeloEquipVO $vo)
    {
        if ($vo->getNomeModelo() == '') {
            return 0;
        }

        $vo->setFuncaoErro(AlterarModelo);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new ModeloDAO();
        return $dao->AlterarModelo($vo);
    }

    public function ConsultarModelo()
    {
        $dao = new ModeloDAO();
        return $dao->ConsultarModelo();
    }

    public function ExcluirModelo(ModeloEquipVO $vo)
    {

        if ($vo->getIdModelo() == '') {
            return 0;
        }

        $vo->setFuncaoErro(ExcluirModelo);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new ModeloDAO();
        return $dao->ExcluirModelo($vo);
    }
}
