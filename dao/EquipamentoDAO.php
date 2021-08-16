<?php

require_once 'Conexao.php';
require_once 'sql/EquipamentoSQL.php';

class EquipamentoDAO extends Conexao
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

    public function CadastrarEquip(EquipamentoVO $vo)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::INSERIR_EQUIPAMENTO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getIdentEquip());
        $this->sql->bindValue($i++, $vo->getDescEquip());
        $this->sql->bindValue($i++, $vo->getIdTipoEquip());
        $this->sql->bindValue($i++, $vo->getIdModeloEquip());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function AlocarEquipamento(AlocarEquipVO $vo)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::ALOCAR_EQUIPAMENTO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getSitAlocar());
        $this->sql->bindValue($i++, $vo->getDataAlocar());
        $this->sql->bindValue($i++, $vo->getIdEquip());
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

    public function AlterarEquip(EquipamentoVO $vo)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::ALTERAR_EQUIPAMENTO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getIdentEquip());
        $this->sql->bindValue($i++, $vo->getDescEquip());
        $this->sql->bindValue($i++, $vo->getIdTipoEquip());
        $this->sql->bindValue($i++, $vo->getIdModeloEquip());
        $this->sql->bindValue($i++, $vo->getIdEquip());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -1;
        }
    }

    public function ExcluirEquip(EquipamentoVO $vo)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::EXCLUIR_EQUIPAMENTO());
        $i = 1;
        $this->sql->bindValue($i++, $vo->getIdEquip());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarErro($vo);
            return -2;
        }
    }

    public function FiltrarEquip($tipo_filtro)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::FILTRAR_EQUIPAMENTO());

        $this->sql->bindValue(1, $tipo_filtro);

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarEquipNaoAlocados()
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::FILTRAR_EQUIPAMENTOS_N_ALOCADOS());

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharEquip($id)
    {
        $this->sql = $this->conexao->prepare(EquipamentoSQL::DETALHAR_EQUIPAMENTO());

        $this->sql->bindValue(1, $id);

        $this->sql->execute();
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
