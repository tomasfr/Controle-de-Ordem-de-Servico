<?php

require_once 'Conexao.php';
require_once 'sql/TipoEquipSQL.php';

class TipoEquipDAO extends Conexao
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

    public function CadastrarTipo(TipoEquipVO $vo)
    {

        $this->sql = $this->conexao->prepare(TipoEquipSQL::INSERIR_TIPO());
        $this->sql->bindValue(1, $vo->getNomeTipo());

        try {

            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function ConsultarTipo()
    {
        $this->sql = $this->conexao->prepare(TipoEquipSQL::CONSULTAR_TIPO());

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarTipo(TipoEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(TipoEquipSQL::ALTERAR_TIPO());

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeTipo());
        $this->sql->bindValue($i++, $vo->getIdTipo());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function ExcluirTipo(TipoEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(TipoEquipSQL::EXCLUIR_TIPO());
        $this->sql->bindValue(1, $vo->getIdTipo());

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
