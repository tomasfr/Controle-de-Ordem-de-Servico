<?

require_once '../../controller/ChamadoCTRL.php';
require_once '../../vo/ChamadoVO.php';

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
                            <h1>Meus Chamados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Funcionário</a></li>
                                <li class="breadcrumb-item active">Meus Chamados</li>
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
                        <h3 class="card-title">Consulte todos os seus chamados e acompanhe os atendimentos</h3>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Resultado Encontrado</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Equipamento</th>
                                            <th>Problema</th>
                                            <th>Data Atendimento</th>
                                            <th>Técnico</th>
                                            <th>Data Encerramento</th>
                                            <th>Laudo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>(abertura)</td>
                                            <td>(funcionario)</td>
                                            <td>(equipamento)</td>
                                            <td>(problema)</td>
                                            <td>(atendimento)</td>
                                            <td>(tecnico)</td>
                                            <td>(encerramento)</td>
                                            <td>(laudo)</td>
                                            <td>
                                                <a href="#" class="btn bg-gradient-primary btn-xs">Ver Mais</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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