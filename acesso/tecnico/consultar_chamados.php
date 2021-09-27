<?php

require_once '../../controller/ChamadoCTRL.php';
require_once '../../vo/ChamadoVO.php';
require_once '../../controller/UtilCTRL.php';

UtilCTRL::ValidarTipoLogado(3);

if (isset($_POST['btnBuscar'])) {

    $ctrl = new ChamadoCTRL();

    $situacao = $_POST['situacao'];
    $dados = $ctrl->FiltrarChamado($situacao, UtilCTRL::IdSetorLogado());

    if (count($dados) == 0) {
        $ret = 2;
    }
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
                            <h1>Chamados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                                <li class="breadcrumb-item active">Chamados</li>
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
                        <h3 class="card-title">Consulte todos o seu chamados do seu setor e acompanhe os atendimentos</h3>
                    </div>
                    <div class="card-body">
                        <form action="consultar_chamados.php" method="POST">

                            <div class="form-group">
                                <label>Escolha a situação</label>
                                <?php include_once '../../template/combos/_combo_situacao.php' ?>
                            </div>

                            <button name="btnBuscar" class="btn bg-gradient-primary">Buscar</button>
                        </form>
                    </div>

                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <?php if (isset($dados) && count($dados) > 0) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Resultado Encontrado</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered naoQuebraTable">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Data Abertura</th>
                                                <th>Situação</th>
                                                <th>Equipamento</th>
                                                <th>Problema</th>
                                                <th>Funcionário</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dados as $item) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="atender_chamado.php?id=<?= $item['id_chamado'] ?>" class="btn bg-gradient-primary btn-xs">Ver Mais</a>
                                                    </td>
                                                    <td><?= UtilCTRL::DataExibir($item['data_chamado']) ?></td>
                                                    <td><?= UtilCTRL::SituacaoChamado($item['data_atendimento'], $item['data_encerramento']) ?></td>
                                                    <td><?= $item['desc_equip'] . ' / ' . $item['ident_equip'] ?></td>
                                                    <td><?= $item['desc_problema'] ?></td>
                                                    <td><?= $item['funcionario'] ?></td>
                                                <?php } ?>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
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