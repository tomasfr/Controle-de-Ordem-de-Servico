<?php if ($tipo_tela == 'CONSULTAR_USUARIO') { ?>
    <select name="tipo" id="tipo" class="form-control">
        <option value="0">Todos</option>
    <?php } else if ($tipo_tela == 'NOVO_USUARIO') { ?>
        <select name="tipo" id="tipo" class="form-control" onchange="MostrarCampoUser(this.value)">
            <option value="">Selecione</option>
        <?php } ?>
        <option value="1">Administrador</option>
        <option value="2">Funcionário</option>
        <option value="3">Técnico</option>
        </select>