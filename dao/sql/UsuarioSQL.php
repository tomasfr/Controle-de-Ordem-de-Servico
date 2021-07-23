<?php

class UsuarioSQL
{

    public static function INSERIR_USUARIO()
    {

        $sql = '';
        $sql = 'INSERT into tb_usuario 
                (nome_usuario, tipo_usuario, cpf_usuario, senha_usuario, status_usuario) 
                values (?,?,?,?,?)';

        return $sql;
    }

    public static function INSERIR_TECNICO()
    {

        $sql = '';
        $sql = 'INSERT into tb_tecnico
                (id_usuario_tec, tel_tec, end_tec, email_tec) 
                values (?,?,?,?)';

        return $sql;
    }

    public static function INSERIR_FUNCIONARIO()
    {
        $sql = '';
        $sql = 'INSERT into tb_funcionario
                (id_usuario_func, tel_func, end_func, email_func, id_setor)
                values (?,?,?,?,?)';

        return $sql;
    }

    public static function CONSULTAR_CPF()
    {

        $sql = '';
        $sql = 'SELECT count(cpf_usuario) as contar
                from tb_usuario where cpf_usuario = ?';

        return $sql;
    }

    public static function CONSULTAR_EMAIL($tipo)
    {
        $sql = '';

        if ($tipo == 2) {
            $sql = 'SELECT count(email_func) as contar
                from tb_funcionario where email_func = ?';
        } else if ($tipo == 3) {
            $sql = 'SELECT count(email_tec) as contar
                from tb_tecnico where email_tec = ?';
        }

        return $sql;
    }
}
