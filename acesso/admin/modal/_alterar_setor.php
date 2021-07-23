<div class="modal fade" id="modal-setor-alterar">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Setor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="id_setor_alt" id="id_setor_alt">
                <div class="form-group">
                <label>Nome do Setor</label>
                    <input  type="text" name="nome_setor_alt" id="nome_setor_alt" class="form-control" value="">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-outline-dark" name="btnAlterar">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->