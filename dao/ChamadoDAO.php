<?php

require_once 'Conexao.php';
require_once 'sql/ChamadoSQL.php';

class ChamadoDAO extends Conexao
{

    /** @var PDO */
    private $conexao;

    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {
        $this->sql = $this->conexao = parent::retornarConexao();
        $this->sql = new PDOStatement();
    }

    public function FiltrarEquipamentosChamado($idSetor, $sit)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::CARREGAR_EQUIPAMENTO_CHAMADO());

        $i = 1;
        $this->sql->bindValue($i++, $idSetor);
        $this->sql->bindValue($i++, $sit);

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AbrirChamado(ChamadoVO $vo)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::INSERIR_CHAMADO());
        $i = 1;

        $this->sql->bindValue($i++, $vo->getDataChamado());
        $this->sql->bindValue($i++, $vo->getHoraChamado());
        $this->sql->bindValue($i++, $vo->getDescProblema());
        $this->sql->bindValue($i++, $vo->getIdEquipamento());
        $this->sql->bindValue($i++, $vo->getIdUsuarioFunc());

        $this->conexao->beginTransaction();

        try {

            $this->sql->execute();

            $this->sql = $this->conexao->prepare(ChamadoSQL::ALTUALIZAR_SIT_EQUIPAMENTO());
            $i = 1;

            $this->sql->bindValue($i++, 3);
            $this->sql->bindValue($i++, $vo->getIdAlocarEquip());

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

    public function ConsultarChamados($situcao)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::CONSULTAR_CHAMADOS($situcao));

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
