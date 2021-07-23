<?php

require_once '../../controller/EquipamentoCTRL.php';
require_once '../../vo/SetorVO.php';

$ctrl = new EquipamentoCTRL();

if(isset($_POST['btnBuscar'])){

    $vo = new SetorVO();

    $vo->setIdSetor($_POST['nome']);

    $ret = $ctrl->RemoverEquip($vo);
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
                                <select name="nome" id="nome" class="form-control">
                                    <option value="">Selecione</option>
                                </select>
                            </div>

                            <button name="btnBuscar" onclick="return ValidarTela(1)" class="btn bg-gradient-primary">Buscar</button>

                        </form>
                    </div>

                </div>
                <!-- /.card -->
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
                                        <tr>
                                            <td>(equipamento)</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-xs">Remover</a>
                                            </td>
                                    </tbody>
                                </table>
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