<?php

require_once '../../controller/UsuarioCTRL.php';

if (isset($_POST['btnAcessar'])) {

    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    $ctrl = new UsuarioCTRL();
    $ret = $ctrl->ValidarLogin($senha, $cpf);
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php
    include_once '../../template/_head.php';
    ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Controle de Chamados
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Acesse sua conta</p>

                <form action="acesso.php" method="post">
                    <div class="input-group mb-3">
                        <input class="form-control num cpf" name="cpf" id="cpf" placeholder="Seu CPF" value="<?= isset($cpf) ? $cpf : '' ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="btnAcessar" onclick="return ValidarTela(6)" class="btn btn-primary btn-block">Acessar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php
    include_once '../../template/_scripts.php';
    include_once '../../template/_msg.php'
    ?>

</body>

</html>