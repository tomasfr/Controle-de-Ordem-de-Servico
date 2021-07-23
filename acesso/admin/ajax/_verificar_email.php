<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/UsuarioCTRL.php';

if (isset($_POST['email']) && isset($_POST['tipo'])) {

    $ctrl = new UsuarioCTRL();
    $ret = $ctrl->VerificarEmail($_POST['email'], $_POST['tipo']);

    echo $ret;
}
