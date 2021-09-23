<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/UtilCTRL.php';

if (isset($_GET['close']) && $_GET['close'] == 1) {
    UtilCTRL::Deslogar();
}

$tipo = UtilCTRL::TipoLogado();
$nome = UtilCTRL::NomeLogado();

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <center>
            <span class="brand-text font-weight-light">Gerenciador de Chamados</span>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">
                <a href="#" class="d-block"><?= $nome . ' | ' . UtilCTRL::NomeTipoUser($tipo) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php if ($tipo == 1) { ?>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Gerenciar Usuários
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="novo_usuario.php" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>
                                        Novo Usuário
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="consultar_usuario.php" class="nav-link">
                                    <i class="nav-icon fas fa-user-tag"></i>
                                    <p>
                                        Consultar Usuário
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Gerenciar Equipamentos
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="equipamento.php" class="nav-link">
                                    <i class="nav-icon far fa-plus-square"></i>
                                    <p>
                                        Novo Equipamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tipo_equipamento.php" class="nav-link">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Tipo de Equipamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="modelo_equipamento.php" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>
                                        Modelo de Equipamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="alocar_equipamento.php" class="nav-link">
                                    <i class="nav-icon fas fa-sign-in-alt"></i>
                                    <p>
                                        Alocar Equipamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="consultar_equipamento.php" class="nav-link">
                                    <i class="nav-icon fas fa-search"></i>
                                    <p>
                                        Consultar Equipamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="remover_equipamento.php" class="nav-link">
                                    <i class="nav-icon fas fa-minus-circle"></i>
                                    <p>
                                        Remover Equipamento
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="setor.php" class="nav-link">
                            <i class="nav-icon fas fa-bezier-curve"></i>
                            <p>
                                Setor
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="adm_rel_chamados.php" class="nav-link">
                            <i class="nav-icon fas fa-bezier-curve"></i>
                            <p>
                                Relatório Chamados
                            </p>
                        </a>
                    </li>
                <?php } else if ($tipo == 2) { ?>
                    <!-- Menu Funcionários -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Chamado
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="novo_chamado.php" class="nav-link">
                                    <i class="nav-icon far fa-plus-square"></i>
                                    <p>
                                        Novo Chamado
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="consultar_chamados.php" class="nav-link">
                                    <i class="nav-icon fas fa-search"></i>
                                    <p>
                                        Consultar Chamados
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>
                                Meu Acesso
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="meus_dados.php" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Meus Dados
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="alterar_senha.php" class="nav-link">
                                    <i class="nav-icon fas fa-lock"></i>
                                    <p>
                                        Alterar Senha
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Fim Menu Funcionários -->
                <?php } else if ($tipo == 3) { ?>
                    <!-- Menu Técnicos -->
                    <li class="nav-item">
                        <a href="consultar_chamados.php" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Consultar Chamados
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>
                                Meu Acesso
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="meus_dados.php" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Meus Dados
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="alterar_senha.php" class="nav-link">
                                    <i class="nav-icon fas fa-lock"></i>
                                    <p>
                                        Alterar Senha
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Fim Menu Técnicos -->

                <?php } ?>
                <li class="nav-item">
                    <a href="http://localhost/controleos/template/_menu.php?close=1" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sair
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>