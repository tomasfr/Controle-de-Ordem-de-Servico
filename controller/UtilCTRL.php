<?php

class UtilCTRL
{

    public static function RetornarCaminho()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/Controleos/';
    }

    public static function CodigoLogado()
    {
        return 1;
    }

    public static function TipoLogado()
    {
        return 1;
    }

    public static function SetorLogado()
    {
        return 1;
    }


    private static function SetarFusoHorario()
    {

        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function DataAtual()
    {

        self::SetarFusoHorario();
        return date('Y-m-d');
    }

    public static function DataAtualExibir()
    {

        self::SetarFusoHorario();
        return date('d/m/Y');
    }

    public static function DataExibir($data)
    {

        $data_array = explode('-', $data);

        $data_exibir = $data_array[2] . '/' . $data_array[1] . '/' . $data_array[0];

        return $data_exibir;
    }

    public static function HoraAtual()
    {

        self::SetarFusoHorario();
        return date('H:i');
    }

    public static function TirarCaracteresEspeciais($palavra)
    {
        $especiais = array('-', '.', '(', ')', ' ');
        $palavra = str_replace($especiais, '', $palavra);
        return $palavra;
    }

    public static function TirarScriptsMaliciosos($palavra)
    {
        $especiais = array('<script>', '</script>', 'alert', '*', 'table', 'select', 'insert', 'delete', 'update', '(', ')', '{', '}', "'", "'");
        $palavra = str_replace($especiais, '', $palavra);
        return $palavra;
    }

    public static function CriptografarSenha($senha)
    {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        return $senha_hash;
    }
}
