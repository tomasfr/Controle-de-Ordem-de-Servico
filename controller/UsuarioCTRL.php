<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/UsuarioDAO.php';

define('CadastrarUserAdm', 'CadastrarUserAdm');
define('CadastrarUserTecnico', 'CadastrarUserTecnico');
define('CadastrarUserFuncionario', 'CadastrarUserFuncionario');
define('ExcluirUserAdm', 'ExcluirUserAdm');
define('ExcluirUserFunc', 'ExcluirUserFunc');
define('ExcluirUserTec', 'ExcluirUserTec');
define('AlterarUserAdm', 'AlterarUserAdm');
define('AlterarUserFunc', 'AlterarUserFunc');
define('AlterarUserTec', 'AlterarUserTec');


class UsuarioCTRL
{

    public function CadastrarUserAdm(UsuarioVO $vo)
    {
        if ($vo->getNomeUser() == '' || $vo->getTipo() == '' || $vo->getCpf() == '')
            return 0;

        $vo->setSenha(UtilCTRL::CriptografarSenha($vo->getCpf()));
        $vo->setStatus(1);

        $vo->setFuncaoErro(CadastrarUserAdm);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());

        $dao = new UsuarioDAO();
        return $dao->CadastrarUserAdm($vo);
    }

    public function CadastrarUserFuncionario(FuncionarioVO $vo)
    {
        if (
            $vo->getNomeUser() == '' || $vo->getTipo() == '' || $vo->getCpf() == '' || $vo->getIdSetor() == '' ||
            $vo->getEmail() == '' || $vo->getTel() == '' || $vo->getEndereco() == ''
        )
            return 0;

        $vo->setSenha(UtilCTRL::CriptografarSenha($vo->getCpf()));
        $vo->setStatus(1);

        $vo->setFuncaoErro(CadastrarUserFuncionario);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());

        $dao = new UsuarioDAO();
        return $dao->CadastrarUserFunc($vo);
    }

    public function CadastrarUserTecnico(TecnicoVO $vo)
    {
        if (
            $vo->getNomeUser() == '' || $vo->getTipo() == '' || $vo->getCpf() == '' ||
            $vo->getEmail() == '' || $vo->getTel() == '' || $vo->getEndereco() == ''
        )
            return 0;

        $vo->setSenha(UtilCTRL::CriptografarSenha($vo->getCpf()));
        $vo->setStatus(1);

        $vo->setFuncaoErro(CadastrarUserTecnico);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());

        $dao = new UsuarioDAO();
        return $dao->CadastrarUserTec($vo);
    }

    public function ExcluirUsuario(UsuarioVO $vo)
    {
        $vo->setFuncaoErro($vo->getTipo() == 1 ? ExcluirUserAdm : ($vo->getTipo() == 2 ? ExcluirUserFunc : ExcluirUserTec));
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setHoraErro(UtilCTRL::HoraAtual());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());

        $dao = new UsuarioDAO();
        return $dao->ExcluirUsuario($vo);
    }

    public function FiltrarUsuario($nome, $tipo)
    {
        $dao = new UsuarioDAO();
        return $dao->FiltrarUsuario($nome, $tipo);
    }

    public function VerificarCPF($cpf, $id)
    {
        $dao = new UsuarioDAO();
        return $dao->ValidarCPF(UtilCTRL::TirarCaracteresEspeciais($cpf), $id);
    }

    public function VerificarEmail($email, $tipo)
    {
        $dao = new UsuarioDAO();
        return $dao->ConsultarEmail($email, $tipo);
    }

    public function ConsultarUser(UsuarioVO $vo)
    {
        if ($vo->getIdUser() == '') {
            return 0;
        }
    }

    public function DetalharUsuario($idUser)
    {
        $dao = new UsuarioDAO();
        return $dao->DetalharUsuario($idUser);
    }

    public function AlterarUserAdm(UsuarioVO $vo)
    {
        if ($vo->getNomeUser() == '' || $vo->getCpf() == '')
            return 0;

        $vo->setFuncaoErro(AlterarUserAdm);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new UsuarioDAO();
        return $dao->AlterarUserAdm($vo);
    }

    public function AlterarUserFunc(FuncionarioVO $vo)
    {
        if (
            $vo->getNomeUser() == '' || $vo->getCpf() == '' || $vo->getEmail() == '' ||
            $vo->getEndereco() == '' || $vo->getTel() == '' || $vo->getIdSetor() == ''
        )
            return 0;

        $vo->setFuncaoErro(AlterarUserFunc);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new UsuarioDAO();
        return $dao->AlterarUserFunc($vo);
    }

    public function AlterarUserTec(TecnicoVO $vo)
    {
        if (
            $vo->getNomeUser() == '' || $vo->getCpf() == '' || $vo->getEmail() == '' ||
            $vo->getEndereco() == '' || $vo->getTel() == ''
        )
            return 0;

        $vo->setFuncaoErro(AlterarUserTec);
        $vo->setIdUserErro(UtilCTRL::CodigoLogado());
        $vo->setDataErro(UtilCTRL::DataAtualExibir());
        $vo->setHoraErro(UtilCTRL::HoraAtual());

        $dao = new UsuarioDAO();
        return $dao->AlterarUserTec($vo);
    }
}
