<?php

require_once 'UtilCTRL.php';
require_once UtilCTRL::RetornarCaminho() . 'dao/UsuarioDAO.php';

define('CadastrarUserAdm', 'CadastrarUserAdm');
define('CadastrarUserTecnico', 'CadastrarUserTecnico');
define('CadastrarUserFuncionario', 'CadastrarUserFuncionario');

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

    public function FiltrarUsuario($nome, $tipo)
    {
        $dao = new UsuarioDAO();
        return $dao->FiltrarUsuario($nome, $tipo);
    }

    public function VerificarCPF($cpf)
    {
        $dao = new UsuarioDAO();
        return $dao->ConsultarCPF(UtilCTRL::TirarCaracteresEspeciais($cpf));
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

    public function AlterarDadosFunc(FuncionarioVO $vo)
    {
        if ($vo->getEmail() == '' || $vo->getEndereco() == '' || $vo->getTel() == '') {
            return 0;
        }
    }

    public function AlterarDadosTec(TecnicoVO $vo)
    {
        if ($vo->getEmail() == '' || $vo->getEndereco() == '' || $vo->getTel() == '') {
            return 0;
        }
    }
}
