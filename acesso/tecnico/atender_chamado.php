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
                                <input name="data" id="data" class="form-control" placeholder="Digite aqui..." disabled>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Funcionario</label>
                                <input name="funcionario" id="funcionario" class="form-control" placeholder="Digite aqui..." disabled>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Setor</label>
                                <input name="setor" id="setor" class="form-control" placeholder="Digite aqui..." disabled>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Equipamento</label>
                                <input name="equipamento" id="equipamento" class="form-control" placeholder="Digite aqui..." disabled>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name="desc" id="desc" class="form-control" placeholder="Digite aqui..." disabled></textarea>

                        </div>
                        <div class="form-group">
                            <label>Laudo</label>
                            <textarea name="laudo" id="laudo" class="form-control" placeholder="Digite aqui..." maxlength="200"></textarea>

                        </div>

                        <button name="btnAtender" class="btn btn-success">Atender</button>
                        <button name="btnFinalizar" class="btn btn-success">Finalizar</button>

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
    ?>
</body>

</html>