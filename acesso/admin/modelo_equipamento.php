<?php

require_once '../../vo/ModeloEquipVO.php';
require_once '../../controller/ModeloCTRL.php';
require_once '../../controller/UtilCTRL.php';

UtilCTRL::ValidarTipoLogado(1);

$ctrl = new ModeloCTRL();

if (isset($_POST['btnSalvar'])) {

    $vo = new ModeloEquipVO();
    $vo->setNomeModelo($_POST['nome']);

    $ret = $ctrl->CadastrarModelo($vo);
} else if (isset($_POST['btnAlterar'])) {

    $vo = new ModeloEquipVO();
    $vo->setNomeModelo($_POST['nome_mod_alt']);
    $vo->setIdModelo($_POST['id_mod_alt']);

    $ret = $ctrl->AlterarModelo($vo);
}else if(isset($_POST['btnExcluir'])){

    $vo = new ModeloEquipVO();
    $vo->setIdModelo($_POST['id_excluir']);

    $ret = $ctrl->ExcluirModelo($vo);
}

$mods = $ctrl->ConsultarModelo();

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
                            <h1>Gerenciar Modelo de Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Modelo Equipamento</li>
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
                        <h3 class="card-title">Aqui você gerencia todos os modelos de equipamentos cadastrados</h3>
                    </div>
                    <div class="card-body">

                        <form action="modelo_equipamento.php" method="POST">

                            <div class="form-group">
                                <label>Nome do modelo</label>
                                <input name="nome" id="nome" class="form-control" placeholder="Digite aqui..." maxlength="45">
                            </div>

                            <button name="btnSalvar" onclick="return ValidarTela(1)" class="btn btn-success">Gravar</button>

                        </form>

                    </div>
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Modelos cadastrados</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome do Modelo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mods as $item) { ?>
                                            <tr>
                                                <td><?= $item['nome_modelo'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-modelo-tipo" onclick="CarregarDadosModeloEquip('<?= $item['id_modeloequip'] ?>', '<?= $item['nome_modelo'] ?>')">Alterar</a>
                                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_modeloequip'] ?>', '<?= $item['nome_modelo'] ?>')">Excluir</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <form action="modelo_equipamento.php" method="POST">
                                    <?php
                                    include_once 'modal/_alterar_modelo.php';
                                    include_once 'modal/_modal_excluir.php';
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
    include_once '../../template/_msg.php';
    ?>
</body>

</html>