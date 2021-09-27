<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/SetorCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/vo/SetorVO.php';
require_once '../../controller/UtilCTRL.php';

UtilCTRL::ValidarTipoLogado(1);

$ctrl = new SetorCTRL();

if (isset($_POST['btnSalvar'])) {

    $vo = new SetorVO();
    $vo->setNomeSetor($_POST['nome']);

    $ret = $ctrl->CadastrarSetor($vo);
} else if (isset($_POST['btnAlterar'])) {

    $vo = new SetorVO();
    $vo->setIdSetor($_POST['id_setor_alt']);
    $vo->setNomeSetor($_POST['nome_setor_alt']);

    $ret = $ctrl->AlterarSetor($vo);
} else if (isset($_POST['btnExcluir'])) {

    $vo = new SetorVO();
    $vo->setIdSetor($_POST['id_excluir']);

    $ret = $ctrl->ExcluirSetor($vo);
}

$setores = $ctrl->ConsultarSetor();

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
                            <h1>Gerenciar Setor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Setor</li>
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
                        <h3 class="card-title">Gerencie todos os setores aqui</h3>
                    </div>
                    <div class="card-body">

                        <form action="setor.php" method="post">
                            <div class="form-group">
                                <label>Cadastrar Setor</label>
                                <input name="nome" id="nome" class="form-control" placeholder="Digite aqui..." maxlength="45">
                            </div>

                            <button name="btnSalvar" onclick="return InserirSetor(1)" class="btn btn-success">Gravar</button>
                        </form>

                    </div>
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Setores cadastrados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="resultadoTable">
                                    <thead>
                                        <tr>
                                            <th>Setor</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($setores as $item) { ?>
                                            <tr>
                                                <td><?= $item['nome_setor'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-setor-alterar" onclick="CarregarDadosSetor('<?= $item['id_setor'] ?>','<?= $item['nome_setor'] ?>')">Alterar</a>
                                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_setor'] ?>','<?= $item['nome_setor'] ?>')">Excluir</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <form action="setor.php" method="POST">
                                    <?php
                                    include_once 'modal/_modal_excluir.php';
                                    include_once 'modal/_alterar_setor.php';
                                    ?>
                                </form>

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
    include_once '../../template/_msg.php'
    ?>
    <script src="../../template/js/ajax_setor.js"></script>

</body>

</html>