<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/UsuarioCTRL.php';

if (isset($_POST['cpf'])) {

    $ctrl = new UsuarioCTRL();
    $ret = $ctrl->VerificarCPF($_POST['cpf']);

    echo $ret;
}
