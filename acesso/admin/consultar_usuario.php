<?php

$tipo_tela = 'CONSULTAR_USUARIO';

require_once '../../controller/UsuarioCTRL.php';
require_once '../../vo/UsuarioVO.php';

$ctrl = new UsuarioCTRL();

if (isset($_POST['btnBuscar'])) {


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
                            <h1>Consultar Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consultar Usuário</li>
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
                        <h3 class="card-title">Aqui você faz a consulta de todos os seus usuários</h3>
                    </div>
                    <div class="card-body">

                        <form action="consultar_usuario.php" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pesquisar pelo Tipo</label>
                                    <?php include_once '../../template/combos/_combo_tipouser.php' ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Pesquisar por Nome</label>
                                    <input class="form-control" name="nome_pesq" id="id_pesq" >
                                </div>
                            </div>

                            <button name="btnBuscar" onclick="return ValidarTela(1)" class="btn bg-gradient-primary">Buscar</button>

                        </form>

                    </div>
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Usuários cadastrados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Tipo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>(nome)</td>
                                            <td>(tipo)</td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                                            </td>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

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
</body>

</html>