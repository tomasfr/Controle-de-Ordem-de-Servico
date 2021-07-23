<?php

class SetorSQL
{
    public static function INSERIR_SETOR()
    {

        $sql = '';
        $sql = 'INSERT into tb_setor (nome_setor) values (?)';

        return $sql;
    }

    public static function ALTERAR_SETOR()
    {

        $sql = '';
        $sql = 'UPDATE tb_setor set nome_setor = ? where id_setor = ?';
        
        return $sql;
    }

    public static function CONSULTAR_SETOR()
    {

        $sql = '';
        $sql = 'SELECT nome_setor, id_setor from tb_setor';

        return $sql;
    }

    public static function EXCLUIR_SETOR()
    {
        $sql = '';
        $sql = 'DELETE from tb_setor where id_setor = ?';

        return $sql;
    }
}
