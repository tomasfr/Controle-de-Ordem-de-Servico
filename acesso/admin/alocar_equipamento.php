<?php

require_once '../../controller/EquipamentoCTRL.php';
require_once '../../controller/SetorCTRL.php';
require_once '../../vo/AlocarEquipVO.php';

$ctrl_eqs = new EquipamentoCTRL();
$ctrl_set = new SetorCTRL();

if (isset($_POST['btnSalvar'])) {
    $vo = new AlocarEquipVO();

    $vo->setIdSetor($_POST['setor']);
    $vo->setIdEquip($_POST['tipo']);

    $ret = $ctrl_eqs->AlocarEquipamento($vo);
}

$eqs = $ctrl_eqs->FiltrarEquipNaoAlocados();
$sets = $ctrl_set->ConsultarSetor();

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
                            <h1>Alocar Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Alocar Equipamento</li>
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
                        <h3 class="card-title">Aqui você aloca um equipamento ao setor específico</h3>
                    </div>
                    <form action="alocar_equipamento.php" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Setor</label>
                                    <select name="setor" id="setor" class="form-control">
                                        <option value="">Selecione</option>
                                        <?php foreach ($sets as $item) { ?>
                                            <option value="<?= $item['id_setor'] ?>"><?= $item['nome_setor'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Equipamento</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="">Selecione</option>
                                        <?php foreach ($eqs as $item) { ?>
                                            <option value="<?= $item['id_equipamento'] ?>"><?= $item['nome_tipo'] . ' / ' .  $item['ident_equip'] . ' / ' . $item['desc_equip'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <center>
                                <button name="btnSalvar" class="btn btn-success">Alocar</button>
                            </center>
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
    include_once '../../template/_msg.php'; ?>
</body>

</html>