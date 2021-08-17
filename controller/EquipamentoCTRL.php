<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/EquipamentoDAO.php';

define('CadastrarEquip', 'CadastrarEquip');
define('ExcluirEquip', 'ExcluirEquip');
define('AlocarEquipamento', 'AlocarEquipamento');
define('RemoverEquipamento', 'RemoverEquipamento');

class EquipamentoCTRL
{

    public function GravarEquip(EquipamentoVO $vo)
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
        return $vo->getIdEquip() != '' ? $dao->AlterarEquip($vo) : $dao->CadastrarEquip($vo);
    }

    public function AlocarEquipamento(AlocarEquipVO $vo)
    {

        if ($vo->getIdEquip() == '' || $vo->getIdSetor() == '')
            return 0;

        $vo->setDataAlocar(UtilCTRL::DataAtual());
        $vo->setSitAlocar(1); //1 = Alocar

        $vo->setFuncaoErro(AlocarEquipamento);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new EquipamentoDAO();
        return $dao->AlocarEquipamento($vo);
    }

    public function FiltrarEquip($tipo_filtro)
    {
        $dao = new EquipamentoDAO();
        return $dao->FiltrarEquip($tipo_filtro);
    }

    public function FiltrarEquipNaoAlocados()
    {
        $dao = new EquipamentoDAO();
        return $dao->FiltrarEquipNaoAlocados();
    }

    public function DetalharEquip($id)
    {
        $dao = new EquipamentoDAO();
        return $dao->DetalharEquip($id);
    }

    public function ExcluirEquip(EquipamentoVO $vo)
    {
        $vo->setFuncaoErro(ExcluirEquip);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new EquipamentoDAO();
        return $dao->ExcluirEquip($vo);
    }

    public function DetalharEquipamentoSetor($idSetor)
    {
        $dao = new EquipamentoDAO();
        return $dao->DetalharEquipamentoSetor($idSetor);
    }

    public function RemoverEquipamentoSetor(AlocarEquipVO $vo)
    {

        $vo->setSitAlocar(2);
        $vo->setDataRemover(UtilCTRL::DataAtual());

        $vo->setFuncaoErro(RemoverEquipamento);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new EquipamentoDAO();
        return $dao->RemoverEquipamentoSetor($vo);
    }
}
