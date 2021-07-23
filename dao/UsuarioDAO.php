<?php

require_once 'sql/UsuarioSQL.php';
require_once 'Conexao.php';

class UsuarioDAO extends Conexao
{

    /** @var PDO */
    private $conexao;

    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
        $this->sql = new PDOStatement();
    }

    public function CadastrarUserAdm(UsuarioVO $vo)
    {

        $this->sql = $this->conexao->prepare(UsuarioSQL::INSERIR_USUARIO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeUser());
        $this->sql->bindValue($i++, $vo->getTipo());
        $this->sql->bindValue($i++, $vo->getCpf());
        $this->sql->bindValue($i++, $vo->getSenha());
        $this->sql->bindValue($i++, $vo->getStatus());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function CadastrarUserTec(TecnicoVO $vo)
    {
        $this->sql = $this->conexao->prepare(UsuarioSQL::INSERIR_USUARIO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeUser());
        $this->sql->bindValue($i++, $vo->getTipo());
        $this->sql->bindValue($i++, $vo->getCpf());
        $this->sql->bindValue($i++, $vo->getSenha());
        $this->sql->bindValue($i++, $vo->getStatus());

        $this->conexao->beginTransaction();

        try {
            //insere na tb_usuario
            $this->sql->execute();

            //recupera o id do recém cadastrado usuario
            $id_user = $this->conexao->lastInsertId();

            $this->sql = $this->conexao->prepare(UsuarioSQL::INSERIR_TECNICO());
            $i = 1;
            $this->sql->bindValue($i++, $id_user);
            $this->sql->bindValue($i++, $vo->getTel());
            $this->sql->bindValue($i++, $vo->getEndereco());
            $this->sql->bindValue($i++, $vo->getEmail());

            //insere na tb_tecnico
            $this->sql->execute();

            $this->conexao->commit();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function CadastrarUserFunc(FuncionarioVO $vo)
    {

        $this->sql = $this->conexao->prepare(UsuarioSQL::INSERIR_USUARIO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeUser());
        $this->sql->bindValue($i++, $vo->getTipo());
        $this->sql->bindValue($i++, $vo->getCpf());
        $this->sql->bindValue($i++, $vo->getSenha());
        $this->sql->bindValue($i++, $vo->getStatus());

        $this->conexao->beginTransaction();

        try {

            $this->sql->execute();

            $id_user = $this->conexao->lastInsertId();
            $this->sql = $this->conexao->prepare(UsuarioSQL::INSERIR_FUNCIONARIO());
            $i = 1;
            $this->sql->bindValue($i++, $id_user);
            $this->sql->bindValue($i++, $vo->getTel());
            $this->sql->bindValue($i++, $vo->getEndereco());
            $this->sql->bindValue($i++, $vo->getEmail());
            $this->sql->bindValue($i++, $vo->getIdSetor());

            $this->sql->execute();

            $this->conexao->commit();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function ConsultarCPF($cpf)
    {
        $this->sql = $this->conexao->prepare(UsuarioSQL::CONSULTAR_CPF());
        $this->sql->bindValue(1, $cpf);
        $this->sql->execute();
        $ret = $this->sql->fetchAll(PDO::FETCH_ASSOC);
        return $ret[0]['contar'];
    }

    public function ConsultarEmail($email, $tipo)
    {
        $this->sql = $this->conexao->prepare(UsuarioSQL::CONSULTAR_EMAIL($tipo));
        $this->sql->bindValue(1, $email);
        $this->sql->execute();
        $ret = $this->sql->fetchAll(PDO::FETCH_ASSOC);
        return $ret[0]['contar'];
    }
}
