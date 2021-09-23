<?php

class ChamadoSQL
{

    public static function CARREGAR_EQUIPAMENTO_CHAMADO()
    {

        $sql = '';
        $sql = 'SELECT al.id_equipamento,
                       al.id_alocarequip,
                       eq.ident_equip,
                       eq.desc_equip
                from tb_alocarequip as al
            inner join tb_equipamento as eq
                on al.id_equipamento = eq.id_equipamento
            where al.id_setor = ?
                and al.sit_alocar = ?';

        return $sql;
    }

    public static function INSERIR_CHAMADO()
    {
        $sql = '';
        $sql = 'INSERT into tb_chamado (data_chamado,
                                        hora_chamado,
                                        desc_problema,
                                        id_equipamento,
                                        id_usuario_func)
                            values (?,?,?,?,?)';

        return $sql;
    }

    public static function ALTUALIZAR_SIT_EQUIPAMENTO()
    {
        $sql = '';
        $sql = 'UPDATE tb_alocarequip
                            set sit_alocar = ?
                        where id_alocarequip = ?';

        return $sql;
    }

    public static function FILTRAR_CHAMADO($idSetor, $situacao)
    {
        $sql = '';

        $sql = 'SELECT ch.id_chamado,
                       ch.data_chamado,
                       ch.data_atendimento,
                       ch.data_encerramento,
                       ch.hora_encerramento,
                       ch.laudo_tecnico,
                       ch.desc_problema,
                       eq.ident_equip,
                       eq.desc_equip,
                       usu_fun.nome_usuario as funcionario,
                       usu_tec.nome_usuario as tecnico
                from tb_chamado as ch
            inner join tb_equipamento as eq
                on ch.id_equipamento = eq.id_equipamento
            inner join tb_funcionario as fu
                on ch.id_usuario_func = fu.id_usuario_func
            inner join tb_usuario as usu_fun
                on fu.id_usuario_func = usu_fun.id_usuario
            inner join tb_alocarequip as al
                on eq.id_equipamento = al.id_equipamento
            left join tb_tecnico as te
                on ch.id_usuario_tec = te.id_usuario_tec
            left join tb_usuario as usu_tec
                on te.id_usuario_tec = usu_tec.id_usuario
            where al.sit_alocar <> ?
                and al.data_remover is null ';

        if ($idSetor != '') {
            $sql .= ' and al.id_setor = ?';
        }

        if ($situacao != 0) {

            switch ($situacao) {

                case 1:
                    $sql .= ' and ch.data_atendimento is null';
                    break;
                case 2:
                    $sql .= ' and ch.data_atendimento is not null
                              and ch.data_encerramento is null';
                    break;
                case 3:
                    $sql .= ' and ch.data_encerramento is not null';
                    break;
            }
        }

        return $sql;
    }

    public static function DETALHAR_CHAMADO()
    {

        $sql = '';

        $sql = 'SELECT ch.id_chamado,
                       ch.data_chamado,
                       ch.data_atendimento,
                       ch.data_encerramento,
                       ch.hora_encerramento,
                       ch.laudo_tecnico,
                       ch.desc_problema,
                       eq.ident_equip,
                       eq.desc_equip,
                       usu_fun.nome_usuario as funcionario,
                       usu_tec.nome_usuario as tecnico,
                       se.nome_setor,
                       al.id_alocarequip
                from tb_chamado as ch
            inner join tb_equipamento as eq
                on ch.id_equipamento = eq.id_equipamento
            inner join tb_funcionario as fu
                on ch.id_usuario_func = fu.id_usuario_func
            inner join tb_usuario as usu_fun
                on fu.id_usuario_func = usu_fun.id_usuario
            inner join tb_alocarequip as al
                on eq.id_equipamento = al.id_equipamento
            inner join tb_setor as se
                on al.id_setor = se.id_setor
            left join tb_tecnico as te
                on ch.id_usuario_tec = te.id_usuario_tec
            left join tb_usuario as usu_tec
                on te.id_usuario_tec = usu_tec.id_usuario
            where ch.id_chamado = ?';

        return $sql;
    }

    public static function ATENDER_CHAMADO()
    {
        $sql = '';

        $sql = 'UPDATE tb_chamado set
                            data_atendimento = ?,
                            hora_atendimento = ?,
                            id_usuario_tec = ?
                    where id_chamado = ?';

        return $sql;
    }

    public static function FINALIZAR_CHAMADO()
    {
        $sql = '';

        $sql = 'UPDATE tb_chamado set
                            data_encerramento = ?,
                            hora_encerramento = ?,
                            id_usuario_tec = ?,
                            laudo_tecnico = ?
                    where id_chamado = ?';

        return $sql;
    }

    public static function GERAR_GRAFICO()
    {
        $sql = '';

        $sql = 'SELECT
        (select count(id_chamado) from tb_chamado where data_atendimento is null) as aguardando,
        (select count(id_chamado) from tb_chamado where data_atendimento is not null and data_encerramento is null) as atendendo,
        (select count(id_chamado) from tb_chamado where data_encerramento is not null) as encerrado';

        return $sql;
    }
}
