<?php

require_once '../../controller/SetorCTRL.php';
require_once '../../controller/EquipamentoCTRL.php';
require_once '../../vo/AlocarEquipVO.php';

$ctrl_sets = new SetorCTRL();
$idSetor = '';

if (isset($_POST['btnExcluir'])) {

    $vo = new AlocarEquipVO();
    $ctrl_eq = new EquipamentoCTRL();

    $vo->setIdAlocarEquip($_POST['id_excluir']);

    $ret = $ctrl_eq->RemoverEquipamentoSetor($vo);
} else if (isset($_POST['btnBuscar'])) {

    $ctrl_eq = new EquipamentoCTRL();
    $idSetor = $_POST['idSetor'];
    $eqs = $ctrl_eq->DetalharEquipamentoSetor($idSetor);

    if (count($eqs) == 0) {
        $ret = 2;
    }
}

$setores =  $ctrl_sets->ConsultarSetor();

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
                            <h1>Remover Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Remover Equipamento</li>
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
                        <h3 class="card-title">Aqui você poderá remover seus equipamentos</h3>
                    </div>
                    <div class="card-body">
                        <form action="remover_equipamento.php" method="POST">
                            <div class="form-group">
                                <label>Setor</label>
                                <select name="idSetor" id="idSetor" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($setores as $item) { ?>
                                        <option value="<?= $item['id_setor'] ?>" <?= $item['id_setor'] == $idSetor ? 'selected' : '' ?>><?= $item['nome_setor'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button name="btnBuscar" onclick="return ValidarTela(5)" class="btn bg-gradient-primary">Buscar</button>

                        </form>
                    </div>

                </div>
                <!-- /.card -->
                <?php if (isset($eqs) && count($eqs) > 0) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Lista de Equipamentos desse setor</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Equipamento</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($eqs as $item) { ?>
                                                <tr>
                                                    <td><?= $item['nome_tipo'] . ' / ' . $item['nome_modelo'] . ' / ' . $item['ident_equip'] ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_alocarequip'] ?>','<?= $item['nome_tipo'] . ' / ' . $item['nome_modelo'] . ' / ' . $item['ident_equip'] ?>')">Remover</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <form action="remover_equipamento.php" method="POST">
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
                <?php  } ?>

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