<?php

class EquipamentoSQL{

    public static function INSERIR_EQUIPAMENTO(){

        $sql = '';

        $sql = 'INSERT into tb_equipamento (ident_equip, desc_equip, id_tipoequip, id_modeloequip)
                values (?,?,?,?)';

        return $sql;
    }


    public static function CONSULTAR_EQUIPAMENTO(){

        $sql = '';
        $sql = 'SELECT id_equip, ident_equip, desc_equip, id_tipoequip, id_modeloequip from tb_equipamento';

        return $sql;
    }
}