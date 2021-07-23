<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {

        case -2:
            echo '<script>
                    toastr.error(RetornarMsg(-2))
                  </script>';
            break;

        case -1:
            echo '<script>
                    toastr.error(RetornarMsg(-1))
                  </script>';
            break;

        case 0:
            echo '<script>
                    toastr.warning(RetornarMsg(0))
                  </script>';
            break;

        case 1:
            echo '<script>
                     toastr.success(RetornarMsg(1))
                 </script>';
            break;
    }
}
