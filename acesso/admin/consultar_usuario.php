<?php

require_once '../../controller/UtilCTRL.php';
require_once '../../controller/UsuarioCTRL.php';
require_once '../../vo/UsuarioVO.php';

$tipo_tela = 'CONSULTAR_USUARIO';
$tipo_pesq = '';
$nome_pesq = '';

if (isset($_POST['btnBuscar'])) {
    $tipo_pesq = $_POST['tipo'];
    $nome_pesq = $_POST['nome_pesq'];

    $ctrl = new UsuarioCTRL();
    $users = $ctrl->FiltrarUsuario($nome_pesq, $tipo_pesq);
    if (count($users) == 0) {
        $ret = 2;
    }
} else if (isset($_POST['btnExcluir'])) {

    $dados = explode('-', $_POST['id_excluir']);

    $id = $dados[0];
    $tipo = $dados[1];

    $vo = new UsuarioVO();

    $vo->setIdUser($id);
    $vo->setTipo($tipo);

    $ctrl = new UsuarioCTRL();

    $ret = $ctrl->ExcluirUsuario($vo);
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
                                    <input class="form-control" name="nome_pesq" id="id_pesq" value="<?= $nome_pesq ?>">
                                </div>
                            </div>

                            <button name="btnBuscar" onclick="return ValidarTela(1)" class="btn bg-gradient-primary">Buscar</button>

                        </form>

                    </div>
                </div>
                <!-- /.card -->
                <?php if (isset($users) && count($users) > 0) { ?>
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
                                            <?php foreach ($users as $item) { ?>
                                                <tr>
                                                    <td><?= $item['nome_usuario'] ?></td>
                                                    <td><?= UtilCTRL::NomeTipoUser($item['tipo_usuario']) ?></td>
                                                    <td>
                                                        <a href="alterar_usuario.php?tipo=<?= $item['tipo_usuario'] ?>&cod=<?= $item['id_usuario'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_usuario'] . '-' . $item['tipo_usuario'] ?>', '<?= $item['nome_usuario'] ?>')">Excluir</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form method="post" action="consultar_usuario.php">
                                        <?php
                                        include_once 'modal/_modal_excluir.php';
                                        ?>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                <?php } ?>

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