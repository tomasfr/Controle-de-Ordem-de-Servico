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

    public static function CONSULTAR_CHAMADOS($situacao)
    {
        $sql = '';

        if ($situacao == 0) { //todos

            $sql = 'SELECT ch.id_chamado,
                           ch.data_chamado,
                           ch.hora_chamado,
                           ch.desc_problema,
                           ch.data_atendimento,
                           ch.hora_atendimento,
                           ch.data_encerramento,
                           ch.hora_encerramento,
                           ch.laudo_tecnico,
                           ch.id_equipamento,
                           ch.id_usuario_func,
                           ch.id_usuario_tec,
                           eq.ident_equip,
                           eq.desc_equip,
                           user.nome_usuario
                    from tb_chamado as ch
                        inner join tb_equipamento as eq
                            on ch.id_equipamento = eq.id_equipamento
                        inner join tb_funcionario as fu
                            on ch.id_usuario_func = fu.id_usuario_func
                        inner join tb_usuario as user
                            on fu.id_usuario_func = user.id_usuario';
        } else if ($situacao == 1) { //aguardando atendimento

            $sql = 'SELECT ch.id_chamado,
                          ch.data_chamado,
                          ch.hora_chamado,
                          ch.desc_problema,
                          ch.id_equipamento,
                          ch.id_usuario_func,
                          eq.ident_equip,
                           eq.desc_equip,
                           user.nome_usuario
                    from tb_chamado as ch
                        inner join tb_equipamento as eq
                            on ch.id_equipamento = eq.id_equipamento
                        inner join tb_funcionario as fu
                            on ch.id_usuario_func = fu.id_usuario_func
                        inner join tb_usuario as user
                            on fu.id_usuario_func = user.id_usuario
                        where data_atendimento is null';
        } else if ($situacao == 2) { //em atendimento
            $sql = 'SELECT ch.id_chamado,
                           ch.data_chamado,
                           ch.hora_chamado,
                           ch.desc_problema,
                           ch.data_atendimento,
                           ch.hora_atendimento,
                           ch.id_equipamento,
                           ch.id_usuario_func,
                           ch.id_usuario_tec,
                           eq.ident_equip,
                           eq.desc_equip,
                           user.nome_usuario
                    from tb_chamado as ch
                        inner join tb_equipamento as eq
                            on ch.id_equipamento = eq.id_equipamento
                        inner join tb_funcionario as fu
                            on ch.id_usuario_func = fu.id_usuario_func
                        inner join tb_usuario as user
                            on fu.id_usuario_func = user.id_usuario
                        where data_atendimento != null';
        } else if ($situacao == 3) { //finalizado
            $sql = 'SELECT ch.id_chamado,
                           ch.hora_chamado,
                           ch.desc_problema,
                           ch.data_chamado,
                           ch.data_atendimento,
                           ch.hora_atendimento,
                           ch.data_encerramento,
                           ch.hora_encerramento,
                           ch.laudo_tecnico,
                           ch.id_equipamento,
                           ch.id_usuario_func,
                           ch.id_usuario_tec,
                           eq.ident_equip,
                           eq.desc_equip,
                           user.nome_usuario
                    from tb_chamado as ch
                        inner join tb_equipamento as eq
                            on ch.id_equipamento = eq.id_equipamento
                        inner join tb_funcionario as fu
                            on ch.id_usuario_func = fu.id_usuario_func
                        inner join tb_usuario as user
                            on fu.id_usuario_func = user.id_usuario
                         where data_encerramento != null';
        }


        return $sql;
    }
}
