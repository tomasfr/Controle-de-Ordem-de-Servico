<?php

require_once '../../vo/TipoEquipVO.php';
require_once '../../controller/TipoEquipCTRL.php';

$ctrl = new TipoEquipCTRL();

if (isset($_POST['btnSalvar'])) {

    $vo = new TipoEquipVO();
    $vo->setNomeTipo($_POST['nome']);

    $ret = $ctrl->CadastrarTipo($vo);
} else if (isset($_POST['btnAlterar'])) {

    $vo = new TipoEquipVO();
    $vo->setNomeTipo($_POST['nome_tipo_alt']);
    $vo->setIdTipo($_POST['id_tipo_alt']);

    $ret = $ctrl->AlterarTipo($vo);
} else if (isset($_POST['btnExcluir'])) {

    $vo = new TipoEquipVO();
    $vo->setIdTipo($_POST['id_excluir']);

    $ret = $ctrl->ExcluirTipo($vo);
}

$tipos = $ctrl->ConsultarTipo();

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
                            <h1>Gerenciar Tipo de Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Tipo Equipamento</li>
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
                        <h3 class="card-title">Aqui você gerencia todos os tipos de equipamentos cadastrados</h3>
                    </div>
                    <div class="card-body">

                        <form action="tipo_equipamento.php" method="POST">

                            <div class="form-group">
                                <label>Nome do tipo</label>
                                <input name="nome" id="nome" class="form-control" placeholder="Digite aqui..." maxlength="45">
                            </div>

                            <button name="btnSalvar" onclick="return InserirTipo(1)" class="btn btn-success">Gravar</button>

                        </form>

                    </div>
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tipos cadastrados</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="resultadoTable">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tipos as $item) { ?>
                                            <tr>
                                                <td><?= $item['nome_tipo'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-alterar-tipo" onclick="CarregarDadosTipoEquip('<?= $item['id_tipoequip'] ?>', '<?= $item['nome_tipo'] ?>')">Alterar</a>
                                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_tipoequip'] ?>', '<?= $item['nome_tipo'] ?>')">Excluir</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <form method="post" action="tipo_equipamento.php">
                                    <?php
                                    include_once 'modal/_alterar_tipoequip.php';
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
    <script src="../../template/js/ajax_tipo.js"></script>
</body>

</html>