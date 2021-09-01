<?php

class UtilCTRL
{

    public static function RetornarCaminho()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/Controleos/';
    }

    public static function NomeTipoUser($tipo)
    {
        switch ($tipo) {

            case 1:
                $nome = 'Administrador';
                break;
            case 2:
                $nome = 'Funcionário';
                break;
            case 3:
                $nome = 'Técnico';
                break;
        }

        return $nome;
    }

    public static function IniciarSessao()
    {
        if (!isset($_SESSION))
            session_start();
    }

    public static function CriarSessao($idUser, $nome, $tipo, $idSetor)
    {
        self::IniciarSessao();

        $_SESSION['codUser'] = $idUser;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['setor'] = $idSetor;
    }

    public static function CodigoLogado()
    {
        self::IniciarSessao();
        return $_SESSION['codUser'];
    }

    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function TipoLogado()
    {
        self::IniciarSessao();
        return $_SESSION['tipo'];
    }

    public static function IdSetorLogado()
    {
        self::IniciarSessao();
        return $_SESSION['setor'];
    }

    public static function Deslogar()
    {
        self::IniciarSessao();

        unset($_SESSION['codUser']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
        unset($_SESSION['setor']);

        self::PaginaLogar();
    }

    public static function VerificarLogado()
    {
        self::IniciarSessao();

        if (!isset($_SESSION['codUser'])) {
            self::PaginaLogar();
        }
    }

    public static function ValidarTipoLogado($tipo)
    {
        if (self::TipoLogado() != $tipo);
        self::Deslogar();
    }

    private static function PaginaLogar()
    {
        header('location: http://localhost/controleos/acesso/login/acesso.php');
        exit;
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
