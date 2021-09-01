<?php

class ChamadoSQL
{

    public static function CARREGAR_EQUIPAMENTO_CHAMADO()
    {

        $sql = '';
        $sql = 'SELECT al.id_equipamento,
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
                        where id_equipamento = ?';

        return $sql;
    }
}
