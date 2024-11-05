<?php
$peticionAjax = true;
require_once "../config/APP.php";
if ($_POST) {
    require_once "../controladores/controladores.php";
    $eliminar = new controladores();
    echo $eliminar->controlador_actualiza_estadoo_moto();
}
