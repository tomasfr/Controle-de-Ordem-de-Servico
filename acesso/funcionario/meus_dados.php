<?php
require_once '../../controller/UtilCTRL.php';
require_once '../../vo/FuncionarioVO.php';
require_once '../../controller/UsuarioCTRL.php';

$ctrl = new UsuarioCTRL();

if (isset($_POST['btnSalvar'])) {

    $vo = new FuncionarioVO();

    $vo->setIdUser(UtilCTRL::CodigoLogado());
    $vo->setNomeUser($_POST['nome']);
    $vo->setCpf($_POST['cpf']);
    $vo->setEmail($_POST['email']);
    $vo->setTel($_POST['telefone']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setIdSetor($_POST['setor']);

    $ret = $ctrl->AlterarUserFunc($vo);
}

$dados = $ctrl->DetalharUsuario(UtilCTRL::CodigoLogado());

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
                            <h1>Meus Dados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Funcionário</a></li>
                                <li class="breadcrumb-item active">Meus Dados</li>
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
                        <h3 class="card-title">Aqui você poderá alterar seus dados</h3>
                    </div>
                    <div class="card-body">
                        <form action="meus_dados.php" method="POST">
                            <div class="row">

                                <input type="hidden" name="setor" id="setor" value="<?= $dados[0]['id_setor'] ?>">
                                <input type="hidden" name="tipo" id="tipo" value="<?= $dados[0]['tipo_usuario'] ?>">

                                <div class="form-group col-md-6">
                                    <label>Nome</label>
                                    <input readonly name="nome" id="nome" class="form-control" value="<?= $dados[0]['nome_usuario'] ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>CPF</label>
                                    <input readonly name="cpf" id="cpf" class="form-control" value="<?= $dados[0]['cpf_usuario'] ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>E-mail</label>
                                    <input name="email" id="email" class="form-control" placeholder="Digite aqui..." maxlength="45" value="<?= $dados[0]['email_func'] ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Telefone</label>
                                    <input name="telefone" id="telefone" class="form-control num tel" placeholder="Digite aqui..." value="<?= $dados[0]['tel_func'] ?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Endereço</label>
                                    <input name="endereco" id="endereco" class="form-control" placeholder="Digite aqui..." maxlength="50" value="<?= $dados[0]['end_func'] ?>">
                                </div>

                            </div>

                            <button name="btnSalvar" onclick="return ValidarTela(3)" class="btn btn-success">Gravar</button>
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