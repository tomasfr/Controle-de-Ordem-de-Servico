function RetornarMsg(num) {

    var msg = "";

    switch (num) {

        case -2:
            msg = "Não foi possível excluir o registro.";
            break;

        case -1:
            msg = "Ocorreu um erro na operação. Tente novamente mais tarde.";
            break;

        case 0:
            msg = "Preencher TODOS os campos obrigatórios.";
            break;

        case 1:
            msg = "Ação realizada com sucesso.";
            break;

        case 2:
            msg = "Não foi encontrado nenhum registro para ser exibido";
            break;

    }

    return msg;
}