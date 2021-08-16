<?php

class EquipamentoSQL
{

    public static function INSERIR_EQUIPAMENTO()
    {

        $sql = '';

        $sql = 'INSERT into tb_equipamento (ident_equip, desc_equip, id_tipoequip, id_modeloequip)
                values (?,?,?,?)';

        return $sql;
    }
    public static function ALOCAR_EQUIPAMENTO()
    {

        $sql = '';

        $sql = 'INSERT into tb_alocarequip (sit_alocar, data_alocar, id_equipamento, id_setor)
                values (?,?,?,?)';

        return $sql;
    }

    public static function ALTERAR_EQUIPAMENTO()
    {

        $sql = '';

        $sql = 'UPDATE tb_equipamento set ident_equip = ?, desc_equip = ?, id_tipoequip = ?, id_modeloequip = ?
                where id_equipamento = ?';

        return $sql;
    }


    public static function FILTRAR_EQUIPAMENTO()
    {

        $sql = '';
        $sql = 'SELECT eq.id_equipamento, 
                       ti.nome_tipo, 
                       mo.nome_modelo, 
                       eq.ident_equip, 
                       eq.desc_equip 
                from tb_equipamento as eq
            inner join tb_tipoequip as ti
                    on eq.id_tipoequip = ti.id_tipoequip
            inner join tb_modeloequip as mo
                    on eq.id_modeloequip = mo.id_modeloequip
                where eq.id_tipoequip = ?';

        return $sql;
    }

    public static function FILTRAR_EQUIPAMENTOS_N_ALOCADOS()
    {

        $sql = '';
        $sql = 'SELECT eq.id_equipamento, 
                       ti.nome_tipo, 
                       mo.nome_modelo, 
                       eq.ident_equip, 
                       eq.desc_equip 
                from tb_equipamento as eq
            inner join tb_tipoequip as ti
                    on eq.id_tipoequip = ti.id_tipoequip
            inner join tb_modeloequip as mo
                    on eq.id_modeloequip = mo.id_modeloequip
                where eq.id_equipamento not in (select al.id_equipamento
                                                    from tb_alocarequip as al
                                                    where al.sit_alocar != 2)';

        return $sql;
    }

    public static function DETALHAR_EQUIPAMENTO()
    {

        $sql = '';
        $sql = 'SELECT eq.id_equipamento, 
                       eq.id_tipoequip, 
                       eq.id_modeloequip, 
                       eq.ident_equip, 
                       eq.desc_equip 
                from tb_equipamento as eq
                where eq.id_equipamento = ?';

        return $sql;
    }

    public static function EXCLUIR_EQUIPAMENTO()
    {

        $sql = '';
        $sql = 'DELETE from tb_equipamento
                where id_equipamento = ?';

        return $sql;
    }
}
