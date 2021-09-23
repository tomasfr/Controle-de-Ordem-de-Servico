// 1 - Cadastro com somente campo "nome"
// 2 - Cadastrar Equipamento

function ValidarTela(n_tela) {

    var ret = true;

    switch (n_tela) {

        case 1: //Telas: Modelo, Setor, Tipo Equipamento com (#nome)

            if ($("#nome").val().trim() == '') {
                ret = false;

            }

            break;

        case 2: //Equipamento

            if ($("#ident").val().trim() == '' || $("#desc").val().trim() == '' || $("#tipo").val() == '' || $("#modelo").val() == '') {
                ret = false;

            }
            break;

        case 3: //Usuario

            if ($("#cpf").val().trim() == '' || $("#nome").val().trim() == '') {
                ret = false;
                break;
            }

            var tipo = $("#tipo").val();

            switch (tipo) {

                case '2':
                case '3':

                    if ($("#email").val().trim() == '' || $("#telefone").val().trim() == '' || $("#endereco").val().trim() == '') {
                        ret = false;
                        break;
                    }

                    if (tipo == '2') {

                        if ($("#setor").val() == '')
                            ret = false;
                    }

                    break;
            }

            break;

        case 4: //Tela Filtrar Equipamento

            if ($("#tipo").val().trim() == '')
                ret = false;

            break;

        case 5: //

            if ($("#idSetor").val().trim() == '')
                ret = false;

            break;

        case 6: //

            if ($("#cpf").val().trim() == '' || $("#senha").val().trim() == '')
                ret = false;

            break;

        case 7: //Validar senha atual

            if ($("#senhaAtual").val().trim() == '')
                ret = false;

            break;

        case 8: //Validar nova senha e confirmaçao

            if ($("#novaSenha").val().trim() == '' || $("#repetirSenha").val().trim() == '')
                ret = false;

            break;

        case 9: //Tela abrir chamado

            if ($("#equip").val().trim() == '')
                ret = false;

            break;

        case 10: //Tela laudo

            if ($("#laudo").val().trim() == '')
                ret = false;

            break;


    }

    if (!ret)
        toastr.warning(RetornarMsg(0));

    return ret;
}