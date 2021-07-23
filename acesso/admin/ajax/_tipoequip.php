<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/controller/TipoEquipCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controleos/vo/TipoEquipVO.php';

$ctrl = new TipoEquipCTRL();

if (isset($_POST['nome']) && $_POST['acao'] == 1) {

    $vo = new TipoEquipVO();
    $vo->setNomeTipo($_POST['nome']);

    $ret = $ctrl->CadastrarTipo($vo);

    echo $ret;
} else if ($_POST['acao'] == 2) {

    $tipos = $ctrl->ConsultarTipo(); ?>

    <table class="table table-bordered" id="resultadoTable">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipos as $item) { ?>
                <tr>
                    <td><?= $item['nome_tipo'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-alterar-tipo" onclick="CarregarDadosTipoEquip('<?= $item['id_tipoequip'] ?>', '<?= $item['nome_tipo'] ?>')">Alterar</a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $item['id_tipoequip'] ?>', '<?= $item['nome_tipo'] ?>')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>