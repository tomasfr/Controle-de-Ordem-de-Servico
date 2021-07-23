<?php

require_once 'Conexao.php';
require_once 'sql/SetorSQL.php';

class SetorDAO extends Conexao
{

    /** @var PDO */
    private $conexao;

    /** @var PDOStatement  */
    private $sql;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
        $this->sql = new PDOStatement();
    }

    public function CadastrarSetor(SetorVO $vo)
    {
        $this->sql = $this->conexao->prepare(SetorSQL::INSERIR_SETOR());
        $this->sql->bindValue(1, $vo->getNomeSetor());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function ConsultarSetor()
    {
        $this->sql = $this->conexao->prepare(SetorSQL::CONSULTAR_SETOR());
        $this->sql->execute();

        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarSetor(SetorVO $vo)
    {

        $this->sql = $this->conexao->prepare(SetorSQL::ALTERAR_SETOR());

        $i = 1;
        $this->sql->bindValue($i++, $vo->getnomeSetor());
        $this->sql->bindValue($i++, $vo->getIdSetor());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);

            return -1;
        }
    }

    public function ExcluirSetor(SetorVO $vo)
    {
        $this->sql = $this->conexao->prepare(SetorSQL::EXCLUIR_SETOR());
        $this->sql->bindValue(1, $vo->getIdSetor());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);

            return -2;
        }
    }
}
