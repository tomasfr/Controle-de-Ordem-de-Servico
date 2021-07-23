<?php

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', null); //Senha
define('DB', 'db_os'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, WMBarros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new PDO($dsn, USER, PASS, null);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return  self::$Connect;
    }

    public static function retornarConexao()
    {
        return  self::Conectar();
    }

    public static function GravarErro(SistemaVO $vo)
    {
        $arquivo = $_SERVER['DOCUMENT_ROOT'] . '/Controleos/dao/erro/log_erro.txt';

        //verifica se existe o arquivo
        if(!file_exists($arquivo)){
            $arquivo = fopen($arquivo, 'w');
        }else{
            //abrir o arquivo deixando o cursor no final
            $arquivo = fopen($arquivo, 'a+');
        }

        $texto_msg = '--------------------------------------------------------' . PHP_EOL;
        $texto_msg .= '- DATA DO ERRO: ' . $vo->getDataErro() . PHP_EOL;
        $texto_msg .= '- HORÁRIO DO ERRO: ' . $vo->getHoraErro() . PHP_EOL;
        $texto_msg .= '- CÓDIGO DO LOGADO: ' . $vo->getIdUserErro() . PHP_EOL;
        $texto_msg .= '- FUNÇÃO DO ERRO: ' . $vo->getFuncaoErro() . PHP_EOL;
        $texto_msg .= '- MENSAGEM DE ERRO: ' . $vo->getMsgErro() . PHP_EOL;

        //escreve no arquivo
        fwrite($arquivo, $texto_msg);
        //fecha o arquivo
        fclose($arquivo);
        
    }
}