<?php
$peticionAjax = true;
require_once "../config/APP.php";
if ($_POST) {
    require_once "../controladores/controladores.php";
    $actualizar = new controladores();
    echo $actualizar->controlador_actualiza_moto();
}
