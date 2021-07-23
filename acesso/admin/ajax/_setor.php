<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/SetorCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/vo/SetorVO.php';

$ctrl = new SetorCTRL();

if (isset($_POST['nome']) && $_POST['acao'] == 1) {

    $vo = new SetorVO();
    $vo->setNomeSetor($_POST['nome']);

    $ret = $ctrl->CadastrarSetor($vo);

    echo $ret;
} else if ($_POST['acao'] == 2) {

    $setores = $ctrl->ConsultarSetor(); ?>

    <table class="table table-bordered" id="resultadoTable">
        <thead>
            <tr>
                <th>Setor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($setores as $item) { ?>
                <tr>
                    <td><?= $item['nome_setor'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-setor-alterar" onclick="CarregarDadosSetor('<?= $item['id_setor'] ?>','<?= $item['nome_setor'] ?>')">Alterar</a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_setor'] ?>','<?= $item['nome_setor'] ?>')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>