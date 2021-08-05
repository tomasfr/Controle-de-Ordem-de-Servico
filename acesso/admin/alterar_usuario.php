<?php

require_once '../../controller/UsuarioCTRL.php';
require_once '../../controller/SetorCTRL.php';
require_once '../../vo/UsuarioVO.php';
require_once '../../vo/TecnicoVO.php';
require_once '../../vo/FuncionarioVO.php';

$ctrl = new UsuarioCTRL();

if (
    isset($_GET['tipo']) && is_numeric($_GET['tipo']) &&
    isset($_GET['cod']) && is_numeric($_GET['cod'])
) {

    $tipo = $_GET['tipo'];
    $cod = $_GET['cod'];

    $dados = $ctrl->DetalharUsuario($cod);

    if (count($dados) == 0) {
        header('location: consultar_usuario.php');
        exit;
    } else {

        //verificar se usuario é um funcionario para carregar setores
        if ($dados[0]['tipo_usuario'] == 2) {
            $ctrl_set = new SetorCTRL();
            $setores = $ctrl_set->ConsultarSetor();
        }
    }
} else if (isset($_POST['btnSalvar'])) {

    $tipo = $_POST['tipo'];

    switch ($tipo) {

        case 1:

            $vo = new UsuarioVO();

            $vo->setIdUser($_POST['cod']);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);

            $ret = $ctrl->AlterarUserAdm($vo);

            break;

        case 2:

            $vo = new FuncionarioVO();

            $vo->setIdUser($_POST['cod']);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);

            $vo->setEndereco($_POST['endereco']);
            $vo->setTel($_POST['telefone']);
            $vo->setEmail($_POST['email']);
            $vo->setIdSetor($_POST['setor']);

            $ret = $ctrl->AlterarUserFunc($vo);

            break;

        case 3:

            $vo = new TecnicoVO();

            $vo->setIdUser($_POST['cod']);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);

            $vo->setEndereco($_POST['endereco']);
            $vo->setTel($_POST['telefone']);
            $vo->setEmail($_POST['email']);

            $ret = $ctrl->AlterarUserTec($vo);

            break;

        default:
            $ret = 0;
            break;
    }

    header('location: consultar_usuario.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_usuario.php');
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
                            <h1>Alterar Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Alterar Usuário</li>
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
                        <h3 class="card-title">Aqui você poderá fazer alterações nos usuários</h3>
                    </div>

                    <form action="alterar_usuario.php" method="POST">

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="tipo" value="<?= $dados[0]['tipo_usuario'] ?>">
                                <input type="hidden" name="cod" value="<?= $dados[0]['id_usuario'] ?>">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>CPF</label>
                                    <input name="cpf" onchange="ValidarCPF(this.value, '<?= $dados[0]['id_usuario'] ?>')" id="cpf" class="form-control num cpf" value="<?= $dados[0]['cpf_usuario'] ?>">
                                    <label id="lblCPFVal" style="color: red;"></label>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nome</label>
                                    <input name="nome" id="nome" class="form-control" placeholder="Digite aqui..." maxlength="50" value="<?= $dados[0]['nome_usuario'] ?>">
                                </div>
                            </div>

                            <?php if ($dados[0]['tipo_usuario'] == 2) { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Setor</label>
                                        <select name="setor" id="setor" class="form-control">
                                            <option value="">Selecione</option>
                                            <?php foreach ($setores as $item) { ?>
                                                <option value="<?= $item['id_setor'] ?>" <?= $item['id_setor'] == $dados[0]['id_setor'] ? 'selected' : '' ?>><?= $item['nome_setor'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($dados[0]['tipo_usuario'] != 1) { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input name="email" id="email" onchange='ValidarEmail(this.value, $("#tipo").val())' class="form-control" value="<?= $dados[0]['tipo_usuario'] == 2 ? $dados[0]['email_func'] : $dados[0]['email_tec'] ?>" maxlength="45">
                                        <label id="lblEmailVal" style="color: red;"></label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Telefone</label>
                                        <input name="telefone" id="telefone" class="form-control num cel" value="<?= $dados[0]['tipo_usuario'] == 2 ? $dados[0]['tel_func'] : $dados[0]['tel_tec'] ?>">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Endereço</label>
                                        <input name="endereco" id="endereco" class="form-control" value="<?= $dados[0]['tipo_usuario'] == 2 ? $dados[0]['end_func'] : $dados[0]['end_tec'] ?>" maxlength="50">
                                    </div>
                                </div>
                            <?php } ?>

                            <button id="btnSalvar" name="btnSalvar" class="btn btn-success" onclick="return ValidarTela(3)">Gravar</button>

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