<?php

require_once '../../vo/ChamadoVO.php';
require_once '../../controller/ChamadoCTRL.php';

$ctrl = new ChamadoCRTL();

if (isset($_POST['btnSalvar'])) {

    $vo = new ChamadoVO();

    $ids = explode('-', $_POST['equip']);

    $vo->setIdEquipamento($ids[0]);
    $vo->setIdAlocarEquip($ids[1]);
    $vo->setDescProblema($_POST['desc']);

    $ret = $ctrl->AbrirChamado($vo);
}

$eqs = $ctrl->FiltrarEquipamentosChamado();

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
                            <h1>Novo Chamado</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Funcionário</a></li>
                                <li class="breadcrumb-item active">Novo Chamado</li>
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
                        <h3 class="card-title">Realize aberturas de chamados nesta página</h3>
                    </div>
                    <div class="card-body">
                        <form action="novo_chamado.php" method="post">

                            <div class="form-group">
                                <label>Equipamentos</label>
                                <select name="equip" id="equip" class="form-control">
                                    <option value="">Selecione...</option>
                                    <?php for ($i = 0; $i < count($eqs); $i++) { ?>
                                        <option value="<?= $eqs[$i]['id_equipamento'] . '-' . $eqs[$i]['id_alocarequip'] ?>"><?= $eqs[$i]['ident_equip'] . ' / ' . $eqs[$i]['desc_equip'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="desc" id="desc" class="form-control" placeholder="Digite aqui..." maxlength="200"></textarea>
                            </div>

                            <button name="btnSalvar" onclick="return ValidarTela(9)" class="btn btn-success">Gravar</button>

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
</body>

</html>