<?php

if ($tipo_tela == 'CONSULTAR_USUARIO') { ?>
    <select name="tipo" id="tipo" class="form-control">
        <option value="0" <?= isset($tipo_pesq) ? ($tipo_pesq == 0 ? 'selected' : '') : '' ?>>Todos</option>
    <?php } else if ($tipo_tela == 'NOVO_USUARIO') { ?>
        <select name="tipo" id="tipo" class="form-control" onchange="MostrarCampoUser(this.value)">
            <option value="">Selecione</option>
        <?php } ?>
        <option value="1" <?= isset($tipo_pesq) ? ($tipo_pesq == 1 ? 'selected' : '') : '' ?>>Administrador</option>
        <option value="2" <?= isset($tipo_pesq) ? ($tipo_pesq == 2 ? 'selected' : '') : '' ?>>Funcionário</option>
        <option value="3" <?= isset($tipo_pesq) ? ($tipo_pesq == 3 ? 'selected' : '') : '' ?>>Técnico</option>
        </select>