function ExibirMsg(tipo) {

    switch (tipo) {

        case '-2':

            toastr.error(RetornarMsg(-2))

            break;

        case '-1':

            toastr.error(RetornarMsg(-1))

            break;

        case '0':

            toastr.warning(RetornarMsg(0))

            break;

        case '1':

            toastr.success(RetornarMsg(1))

            break;

        case '2':

            toastr.info(RetornarMsg(2))

            break;
    }
}