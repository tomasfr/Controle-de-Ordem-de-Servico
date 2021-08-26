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

        case 3: // Novo Usuario

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

        case 5: //Tela Remover Equipamento

            if ($("#idSetor").val().trim() == '')
                ret = false;

            break;

        case 6: //Tela Remover Equipamento

            if ($("#cpf").val().trim() == '' || $("#senha").val().trim() == '')
                ret = false;

            break;

    }

    if (!ret)
        toastr.warning(RetornarMsg(0));

    return ret;
}