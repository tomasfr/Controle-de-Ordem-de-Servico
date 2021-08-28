function ValidarSenhaAtual() {

    if (ValidarTela(7)) {

        var senha_digitada = $("#senhaAtual").val();

        $.post('ajax/_senha.php', {
            senha: senha_digitada
        }, function (ret) {

            if (ret) {
                $("#divSenhaAtual").hide();
                $("#divNovaSenha").show();

            } else if (!ret) {
                ExibirMsg('4');
                $("#senhaAtual").val('').addClass('is-invalid');

            }
        });
    }

    return false;

}

