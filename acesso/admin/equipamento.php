<?php

require_once '../../controller/EquipamentoCTRL.php';
require_once '../../vo/EquipamentoVO.php';
require_once '../../controller/TipoEquipCTRL.php';
require_once '../../controller/ModeloCTRL.php';

$ctrl_tipo = new TipoEquipCTRL;
$ctrl_modelo = new ModeloCTRL;

if (isset($_POST['btnSalvar'])) {

    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setIdentEquip($_POST['ident']);
    $vo->setDescEquip($_POST['desc']);
    $vo->setIdTipoEquip($_POST['tipo']);
    $vo->setIdModeloEquip($_POST['modelo']);

    $ret = $ctrl->CadastrarEquip($vo);
}

$tipos = $ctrl_tipo->ConsultarTipo();
$modelos = $ctrl_modelo->ConsultarModelo();

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
                            <h1>Novo Equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Novo Equipamento</li>
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
                        <h3 class="card-title">Aqui você poderá cadastrar todos os seus equipametos</h3>
                    </div>

                    <form action="equipamento.php" method="POST">

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="">Selecione...</option>
                                        <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                                            <option value="<?= $tipos[$i]['id_tipoequip'] ?>"><?= $tipos[$i]['nome_tipo'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Modelo</label>
                                    <select name="modelo" id="modelo" class="form-control">
                                        <option value="">Selecione...</option>
                                        <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                            <option value="<?= $modelos[$i]['id_modeloequip'] ?>"><?= $modelos[$i]['nome_modelo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Identificação</label>
                                <input name="ident" id="ident" class="form-control" placeholder="Digite aqui..." maxlength="10">
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="desc" id="desc" class="form-control" placeholder="Digite aqui..." maxlength="30"></textarea>
                            </div>

                            <button name="btnSalvar" onclick="return ValidarTela(2)" class="btn btn-success">Gravar</button>

                        </div>

                    </form>

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