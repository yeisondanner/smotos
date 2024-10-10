<?php
$peticionAjax = true;
require_once "../config/APP.php";
if (isset($_POST['token']) && isset($_POST['usuario'])) {
    require_once "../controladores/controladores.php";
    $close_session = new controladores();
    echo $close_session->controlador_que_cierra_session();
} else if (isset($_POST['newModelo'])) {
    require_once "../controladores/controladores.php";
    $registrar = new controladores();
    echo $registrar->controlador_que_registra_el_vehiculo();
} else if (isset($_POST['idMotoIMG'])) {
    require_once "../controladores/controladores.php";
    $registrar = new controladores();
    echo $registrar->controlador_que_registra_imagenes();
}
