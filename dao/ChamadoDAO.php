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

    public function FiltrarChamado($idSetor, $situcao, $alocar)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO($idSetor, $situcao));

        $i = 1;
        $this->sql->bindValue($i++, $alocar);

        if ($idSetor != '') {

            $this->sql->bindValue($i++, $idSetor);
        }

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharChamado($id)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::DETALHAR_CHAMADO());

        $i = 1;
        $this->sql->bindValue($i++, $id);

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AtenderChamado(ChamadoVO $vo)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::ATENDER_CHAMADO());
        $i = 1;

        $this->sql->bindValue($i++, $vo->getDataAtendimento());
        $this->sql->bindValue($i++, $vo->getHoraAtendimento());
        $this->sql->bindValue($i++, $vo->getIdUsuarioTec());
        $this->sql->bindValue($i++, $vo->getIdChamado());

        try {

            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function FinalizarChamado(ChamadoVO $vo)
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::FINALIZAR_CHAMADO());
        $i = 1;

        $this->sql->bindValue($i++, $vo->getDataEncerramento());
        $this->sql->bindValue($i++, $vo->getHoraEncerramento());
        $this->sql->bindValue($i++, $vo->getIdUsuarioTec());
        $this->sql->bindValue($i++, $vo->getLaudoTecnico());
        $this->sql->bindValue($i++, $vo->getIdChamado());

        $this->conexao->beginTransaction();

        try {

            $this->sql->execute();

            $this->sql = $this->conexao->prepare(ChamadoSQL::ALTUALIZAR_SIT_EQUIPAMENTO());
            $i = 1;

            $this->sql->bindValue($i++, 1);
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

    public function GerarGrafico()
    {
        $this->sql = $this->conexao->prepare(ChamadoSQL::GERAR_GRAFICO());
        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
