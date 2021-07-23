<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/EquipamentoDAO.php';

define('CadastrarEquip', 'CadastrarEquip');

class EquipamentoCTRL
{

    public function CadastrarEquip(EquipamentoVO $vo)
    {
        if (
            $vo->getIdentEquip() == '' || $vo->getDescEquip() == '' ||
            $vo->getIdTipoEquip() == '' || $vo->getIdModeloEquip() == ''
        )
            return 0;

        $vo->setFuncaoErro(CadastrarEquip);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new EquipamentoDAO();
        return $dao->CadastrarEquip($vo);
    }

    public function ConsultarEquip(TipoEquipVO $vo)
    {
        if ($vo->getIdTipo() == '') {
            return 0;
        }
    }

    public function RemoverEquip(SetorVO $vo)
    {
        if ($vo->getNomeSetor() == '') {
            return 0;
        }
    }
}
