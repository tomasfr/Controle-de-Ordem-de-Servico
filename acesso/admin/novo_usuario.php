<?php

$tipo_tela = 'NOVO_USUARIO';

require_once '../../controller/UsuarioCTRL.php';
require_once '../../vo/UsuarioVO.php';
require_once '../../vo/TecnicoVO.php';
require_once '../../vo/FuncionarioVO.php';
require_once '../../controller/SetorCTRL.php';

$setores = new SetorCTRL();


if (isset($_POST['btnSalvar'])) {

    $tipo = $_POST['tipo'];

    $ctrl = new UsuarioCTRL();

    switch ($tipo) {

        case 1:

            $vo = new UsuarioVO();

            $vo->setTipo($tipo);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);

            $ret = $ctrl->CadastrarUserAdm($vo);

            break;

        case 2:

            $vo = new FuncionarioVO();

            $vo->setTipo($tipo);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);
            $vo->setIdSetor($_POST['setor']);
            $vo->setEmail($_POST['email']);
            $vo->setTel($_POST['telefone']);
            $vo->setEndereco($_POST['endereco']);

            $ret = $ctrl->CadastrarUserFuncionario($vo);

            break;

        case 3:

            $vo = new TecnicoVO();

            $vo->setTipo($tipo);
            $vo->setNomeUser($_POST['nome']);
            $vo->setCpf($_POST['cpf']);
            $vo->setEmail($_POST['email']);
            $vo->setTel($_POST['telefone']);
            $vo->setEndereco($_POST['endereco']);

            $ret = $ctrl->CadastrarUserTecnico($vo);

            break;

        default:
            $ret = 0;
            break;
    }
}

$setor = $setores->ConsultarSetor();

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
                            <h1>Novo Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Novo Usuário</li>
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
                        <h3 class="card-title">Aqui você poderá cadastrar todos os seus usuários</h3>
                    </div>

                    <form action="novo_usuario.php" method="POST">

                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Tipo</label>
                                    <?php include_once '../../template/combos/_combo_tipouser.php' ?>
                                </div>

                            </div>

                            <div id="div123" style="display: none">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>CPF</label>
                                        <input name="cpf" onchange="ValidarCPF(this.value)" id="cpf" class="form-control num cpf" placeholder="Digite aqui...">
                                        <label id="lblCPFVal" style="color: red;"></label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input name="nome" id="nome" class="form-control" placeholder="Digite aqui..." maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div id="div2" style="display: none">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Setor</label>
                                        <select name="setor" id="setor" class="form-control">
                                            <option value="">Selecione</option>
                                            <?php foreach ($setor as $item) { ?>
                                                <option value="<?= $item['id_setor'] ?>"><?= $item['nome_setor'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="div23" style="display: none">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input name="email" id="email" onchange='ValidarEmail(this.value, $("#tipo").val())' class="form-control" placeholder="Digite aqui..." maxlength="45">
                                        <label id="lblEmailVal" style="color: red;"></label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Telefone</label>
                                        <input name="telefone" id="telefone" class="form-control num cel" placeholder="Digite aqui...">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Endereço</label>
                                        <input name="endereco" id="endereco" class="form-control" placeholder="Digite aqui..." maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <button id="btnSalvar" name="btnSalvar" class="btn btn-success" style="display: none;" onclick="return ValidarTela(3)">Gravar</button>

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