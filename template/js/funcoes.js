function LimparCamposUser() {

    $("#cpf").val('');
    $("#nome").val('');
    $("#setor").val('');
    $("#email").val('');
    $("#telefone").val('');
    $("#endereco").val('');

}

function MostrarCampoUser(tipo) {

    LimparCamposUser();

    switch (tipo) {

        case '1': //Administrador

            $("#div123").slideDown();

            $("#btnSalvar").slideDown();

            $("#div23").slideUp();
            $("#div2").slideUp();

            break;

        case '2': //Funcionario

            $("#div123").slideDown();
            $("#div23").slideDown();
            $("#div2").slideDown();

            $("#btnSalvar").slideDown();

            break;

        case '3': //Tecnico

            $("#div123").slideDown();
            $("#div23").slideDown();

            $("#btnSalvar").slideDown();

            $("#div2").slideUp();

            break;

        default:

            $("#div123").slideUp();
            $("#div23").slideUp();
            $("#div2").slideUp();
            $("#btnSalvar").slideUp();

            break;
    }

}

function CarregarDadosTipoEquip(id, nome) {

    $("#id_tipo_alt").val(id);
    $("#nome_tipo_alt").val(nome);
}

function CarregarDadosModeloEquip(id, nome) {

    $("#id_mod_alt").val(id);
    $("#nome_mod_alt").val(nome);
}

function CarregarDadosSetor(id, nome) {

    $("#id_setor_alt").val(id);
    $("#nome_setor_alt").val(nome);
}

function CarregarDadosExcluir(id, nome) {
    $("#id_excluir").val(id);
    $("#nome_excluir").html(nome);
}

function ValidarCPF(cpf_digitado, id_usuario) {
    if (cpf_digitado != "") {
        $.post('ajax/_verificar_cpf.php', {
            cpf: cpf_digitado,
            id_user: id_usuario
        }, function (ret) {
            if (ret == 1) {
                $("#lblCPFVal").html('O CPF: ' + cpf_digitado + ' já existe');
                $("#cpf").val('').addClass('is-invalid');
            } else {
                $("#lblCPFVal").html('');
                $("#cpf").removeClass('is-invalid');
            }
        })
    }
}

function ValidarEmail(email_digitado, tipo_escolhido) {

    if (email_digitado != "") {

        $.post('ajax/_verificar_email.php', {
            email: email_digitado,
            tipo: tipo_escolhido
        }, function (ret) {
            if (ret == 1) {
                $("#lblEmailVal").html('O Email: ' + email_digitado + ' já existe');
                $("#email").val('').addClass('is-invalid');
            } else {
                $("#lblEmailVal").html('');
                $("#email").removeClass('is-invalid');
            }
        })
    }
}

function RepetirSenha() {

    if (ValidarTela(8)) {
        //nenhum esta vazio

        if ($("#novaSenha").val() != $("#repetirSenha").val()) {

            //os campos nao estao iguais
            ExibirMsg('5');
            $("#repetirSenha").val('');

            return false;
        }
    } else {
        return false;

    }
}