<?php

class ModeloSQL
{

    public static function INSERIR_MODELO()
    {

        $sql = '';
        $sql = 'INSERT into tb_modeloequip (nome_modelo) value (?)';

        return $sql;
    }

    public static function ALTERAR_MODELO()
    {

        $sql = '';
        $sql = 'UPDATE tb_modeloequip set nome_modelo = ? where id_modeloequip = ?';

        return $sql;
    }

    public static function CONSULTAR_MODELO()
    {

        $sql = '';
        $sql = 'SELECT nome_modelo, id_modeloequip from tb_modeloequip';

        return $sql;
    }

    public static function EXCLUIR_MODELO(){

        $sql = '';
        $sql = 'DELETE from tb_modeloequip where id_modeloequip = ?';

        return $sql;
    }
}
