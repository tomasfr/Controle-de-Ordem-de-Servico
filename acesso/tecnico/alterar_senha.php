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
                            <h1>Alterar Senha</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                                <li class="breadcrumb-item active">Mudar Senha</li>
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
                        <h3 class="card-title">Aqui você poderá alterar sua senha</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label>Senha Atual</label>
                            <input name="senhaatual" id="senhaatual" class="form-control" maxlength="60">

                        </div>
                        <div class="form-group">
                            <label>Nova Senha</label>
                            <input name="novasenha" id="novasenha" class="form-control" placeholder="Digite aqui..." maxlength="60">

                        </div>
                        <div class="form-group">
                            <label>Repetir Senha</label>
                            <input name="repetirsenha" id="repetirsenha" class="form-control" placeholder="Digite aqui..." maxlength="60">

                        </div>

                        <button name="btnSalvar" class="btn btn-success">Gravar</button>
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