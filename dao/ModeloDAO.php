<?php

require_once 'Conexao.php';
require_once 'sql/ModeloSQL.php';

class ModeloDAO extends Conexao
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

    public function CadastrarModelo(ModeloEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(ModeloSQL::INSERIR_MODELO());
        $this->sql->bindValue(1, $vo->getNomeModelo());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);

            return -1;
        }
    }

    public function AlterarModelo(ModeloEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(ModeloSQL::ALTERAR_MODELO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeModelo());
        $this->sql->bindValue($i++, $vo->getIdModelo());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);

            return -1;
        }
    }

    public function ConsultarModelo()
    {
        $this->sql = $this->conexao->prepare(ModeloSQL::CONSULTAR_MODELO());
        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ExcluirModelo(ModeloEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(ModeloSQL::EXCLUIR_MODELO());
        $this->sql->bindValue(1, $vo->getIdModelo());

        try{
            $this->sql->execute();
            return 1;
        }catch(Exception $ex){
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);

            return -2;
        }
    }
}
