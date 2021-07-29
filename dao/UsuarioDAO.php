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

    public function ExcluirUsuario(UsuarioVO $vo)
    {
        //é adm, portanto nao precisa de transação porque é so uma tabela
        if ($vo->getTipo() == 1) {
            $this->sql = $this->conexao->prepare(UsuarioSQL::EXCLUIR_USUARIO());
            $this->sql->bindValue(1, $vo->getIdUser());

            try {
                $this->sql->execute();
                return 1;
            } catch (Exception $ex) {
                $vo->setMsgErro($ex->getMessage());
                parent::GravarErro($vo);
                return -1;
            }
        } else {
            $this->conexao->beginTransaction();

            $this->sql = $this->conexao->prepare($vo->getTipo() == 2 ? UsuarioSQL::EXCLUIR_FUNCIONARIO() : UsuarioSQL::EXCLUIR_TECNICO());
            $this->sql->bindValue(1, $vo->getIdUser());

            try {
                //excluiu na tabela filha
                $this->sql->execute();

                $this->sql = $this->conexao->prepare(UsuarioSQL::EXCLUIR_USUARIO());
                $this->sql->bindValue(1, $vo->getIdUser());

                //excluiu na tb_usuario
                $this->sql->execute();

                $this->conexao->commit();
                return 1;
            } catch (Exception $ex) {
                $this->conexao->rollBack();
                $vo->setMsgErro($ex->getMessage());
                parent::GravarErro($vo);
                return -1;
            }
        }
    }

    public function FiltrarUsuario($nome, $tipo)
    {
        $this->sql = $this->conexao->prepare(UsuarioSQL::FILTRAR_USUARIO($tipo, $nome));

        if ($tipo == 0 && $nome != '') {

            $this->sql->bindValue(1, '%' . $nome . '%');
        } else if ($tipo != 0 && $nome == '') {

            $this->sql->bindValue(1, $tipo);
        } else if ($tipo != 0 && $nome != '') {

            $this->sql->bindValue(1, $tipo);
            $this->sql->bindValue(2, '%' . $nome . '%');
        }

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharUsuario($idUser)
    {
        $this->sql = $this->conexao->prepare(UsuarioSQL::DETALHAR_USUARIO());
        $this->sql->bindValue(1, $idUser);
        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
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
