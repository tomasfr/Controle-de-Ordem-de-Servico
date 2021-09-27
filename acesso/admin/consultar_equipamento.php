<?php

require_once '../../controller/TipoEquipCTRL.php';
require_once '../../controller/EquipamentoCTRL.php';
require_once '../../vo/EquipamentoVO.php';
require_once '../../controller/UtilCTRL.php';

UtilCTRL::ValidarTipoLogado(1);

$tipo_filtro = '';
$ctrl_tipo = new TipoEquipCTRL();

if (isset($_GET['tipo']) && is_numeric($_GET['tipo'])) {

    $ctrl_equi = new EquipamentoCTRL();
    $tipo_filtro = $_GET['tipo'];
    $equipamentos = $ctrl_equi->FiltrarEquip($tipo_filtro);
}

if (isset($_POST['btnBuscar'])) {
    $tipo_filtro = $_POST['tipo'];

    $ctrl_equi = new EquipamentoCTRL();
    $equipamentos = $ctrl_equi->FiltrarEquip($tipo_filtro);
    if (count($equipamentos) == 0) {
        $ret = 2;
    }
} else if (isset($_POST['btnExcluir'])) {

    $ctrl_equi = new EquipamentoCTRL();

    $vo = new EquipamentoVO();
    $vo->setIdEquip($_POST['id_excluir']);

    $ret = $ctrl_equi->ExcluirEquip($vo);

    $tipo_filtro = $_POST['tipo_filtro'];
    $equipamentos = $ctrl_equi->FiltrarEquip($tipo_filtro);
}

$tipos = $ctrl_tipo->ConsultarTipo();


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
                            <h1>Consultar Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consultar Equipamento</li>
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
                        <h3 class="card-title">Aqui você faz a consulta dos seus equipamentos</h3>
                    </div>
                    <div class="card-body">
                        <form action="consultar_equipamento.php" method="POST">
                            <div class="form-group">
                                <label>Pesquisar por Tipo</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($tipos as $item) { ?>
                                        <option value="<?= $item['id_tipoequip'] ?>" <?= $item['id_tipoequip'] == $tipo_filtro ? 'selected' : '' ?>><?= $item['nome_tipo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button name="btnBuscar" onclick="return ValidarTela(4)" class="btn bg-gradient-primary">Buscar</button>
                        </form>
                    </div>

                </div>

                <!-- /.card -->
                <?php if (isset($equipamentos) && count($equipamentos) > 0) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Equipamentos cadastrados</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tipo</th>
                                                <th>Modelo</th>
                                                <th>Identificação</th>
                                                <th>Descrição</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($equipamentos as $item) { ?>
                                                <tr>
                                                    <td><?= $item['nome_tipo'] ?></td>
                                                    <td><?= $item['nome_modelo'] ?></td>
                                                    <td><?= $item['ident_equip'] ?></td>
                                                    <td><?= $item['desc_equip'] ?></td>
                                                    <td>
                                                        <a href="equipamento.php?cod=<?= $item['id_equipamento'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_equipamento'] ?>','<?= $item['ident_equip'] . ' / ' . $item['desc_equip'] ?>')">Excluir</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form action="consultar_equipamento.php" method="POST">
                                        <input type="hidden" name="tipo_filtro" value="<?= $tipo_filtro ?>">
                                        <?php
                                        include_once 'modal/_modal_excluir.php';
                                        ?>
                                    </form>
                                </div>

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