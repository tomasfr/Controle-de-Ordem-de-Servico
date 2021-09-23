<?php

require_once '../../controller/UsuarioCTRL.php';
require_once '../../vo/UsuarioVO.php';

$ctrl = new UsuarioCTRL();

if (isset($_POST['btnSalvar']) && $_POST['repetirSenha'] != '') {

    $vo = new UsuarioVO();
    $vo->setSenha($_POST['novaSenha']);

    $ret = $ctrl->AlterarSenha($vo);
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once '../../template/_head.php';
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once '../../template/_topo.php';
        include_once '../../template/_menu.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Alterar Senha</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                                <li class="breadcrumb-item active">Mudar Senha</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aqui você poderá alterar sua senha</h3>
                    </div>
                    <div class="card-body">

                        <div class="" id="divSenhaAtual">
                            <div class="form-group">
                                <label>Senha Atual</label>
                                <input type="password" name="senhaAtual" id="senhaAtual" class="form-control" maxlength="60">
                            </div>

                            <button name="btnVerificar" onclick="ValidarSenhaAtual()" class="btn btn-success">Verificar</button>
                        </div>

                        <form action="alterar_senha.php" method="POST">

                            <div class="" id="divNovaSenha" style="display: none">
                                <div class="form-group">
                                    <label>Nova Senha</label>
                                    <input type="password" name="novaSenha" id="novaSenha" class="form-control" placeholder="Digite aqui..." maxlength="60">
                                </div>

                                <div class="form-group">
                                    <label>Repetir Senha</label>
                                    <input type="password" name="repetirSenha" id="repetirSenha" class="form-control" placeholder="Digite aqui..." maxlength="60">
                                </div>

                                <button name="btnSalvar" onclick="return RepetirSenha()" class="btn btn-success">Gravar</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        include_once '../../template/_footer.php';
        ?>
    </div>
    <!-- ./wrapper -->

    <?php
    include_once '../../template/_scripts.php';
    include_once '../../template/_msg.php';
    ?>
    <script src="../../template/js/ajax_senha.js"></script>
</body>

</html>