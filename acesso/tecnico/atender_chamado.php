<?php

require_once '../../controller/ChamadoCTRL.php';
require_once '../../vo/ChamadoVO.php';
require_once '../../controller/UtilCTRL.php';

UtilCTRL::ValidarTipoLogado(3);

$ctrl = new ChamadoCTRL();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $dados = $ctrl->DetalharChamado($_GET['id']);

    if (count($dados) == 0) {
        header('location: consultar_chamados.php');
        exit;
    }
} else if (isset($_POST['btnAtender'])) {

    $vo = new ChamadoVO();
    $vo->setIdChamado($_POST['id']);
    $ret = $ctrl->AtenderChamado($vo);

    header('location: atender_chamado.php?id=' . $_POST['id'] . '&ret=' . $ret);
} else if (isset($_POST['btnFinalizar'])) {

    $vo = new ChamadoVO();

    $vo->setIdChamado($_POST['id']);
    $vo->setLaudoTecnico($_POST['laudo']);
    $vo->setIdAlocarEquip($_POST['idAlocarEquip']);
    $ret = $ctrl->FinalizarChamado($vo);

    header('location: atender_chamado.php?id=' . $_POST['id'] . '&ret=' . $ret);
} else {

    header('location: consultar_chamados.php');
    exit;
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
                            <h1>Atender Chamado</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                                <li class="breadcrumb-item active">Atender Chamado</li>
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
                        <h3 class="card-title">Faça os atendimentos aqui</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Data</label>
                                <input name="data" id="data" class="form-control" disabled value="<?= UtilCTRL::DataExibir($dados[0]['data_chamado']) ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Funcionario</label>
                                <input name="funcionario" id="funcionario" class="form-control" disabled value="<?= $dados[0]['funcionario'] ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Setor</label>
                                <input name="setor" id="setor" class="form-control" disabled value="<?= $dados[0]['nome_setor'] ?>">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Equipamento</label>
                                <input name="equipamento" id="equipamento" class="form-control" disabled value="<?= $dados[0]['ident_equip'] . ' / ' . $dados[0]['desc_equip'] ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name="desc" id="desc" class="form-control" disabled><?= $dados[0]['desc_problema'] ?></textarea>
                        </div>

                        <form method="post" action="atender_chamado.php">

                            <input type="hidden" name="id" value="<?= $dados[0]['id_chamado'] ?>">
                            <input type="hidden" name="idAlocarEquip" value="<?= $dados[0]['id_alocarequip'] ?>">

                            <?php if ($dados[0]['data_atendimento'] != '') { ?>
                                <div class="form-group">
                                    <label>Laudo</label>
                                    <textarea name="laudo" id="laudo" class="form-control" placeholder="Digite aqui..." maxlength="200" <?= $dados[0]['data_encerramento'] != '' ? 'readonly' : '' ?>><?= $dados[0]['laudo_tecnico'] ?></textarea>
                                </div>

                            <?php }
                            if ($dados[0]['data_atendimento'] == '') { ?>

                                <button name="btnAtender" class="btn btn-success">Atender</button>

                            <?php } else if ($dados[0]['data_atendimento'] != '' && $dados[0]['data_encerramento'] == '') { ?>

                                <button name="btnFinalizar" onclick="return ValidarTela(10)" class="btn btn-success">Finalizar</button>

                            <?php } else { ?>
                                <span>Finalizado em <?= UtilCTRL::DataExibir($dados[0]['data_encerramento']) ?> às <?= $dados[0]['hora_encerramento'] ?>.</span>
                            <?php } ?>
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