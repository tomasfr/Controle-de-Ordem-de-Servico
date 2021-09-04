<select name="situacao" id="situacao" class="form-control">
    <option value="0" <?= $situacao == 0 ? 'selected' : '' ?>>Todos</option>
    <option value="1" <?= $situacao == 1 ? 'selected' : '' ?>>Aguardando Atendimento</option>
    <option value="2" <?= $situacao == 2 ? 'selected' : '' ?>>Em Atendimento</option>
    <option value="3" <?= $situacao == 3 ? 'selected' : '' ?>>Finalizado</option>
</select>