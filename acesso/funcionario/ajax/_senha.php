<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/UsuarioCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/vo/UsuarioVO.php';

if (isset($_POST['senha'])) {

    $ctrl = new UsuarioCTRL();
    $ret = $ctrl->ValidarSenhaAtual($_POST['senha']);
    echo $ret;
}
