<?php
$peticionAjax = true;
require_once "../config/APP.php";
if (isset($_POST['token']) && isset($_POST['usuario'])) {
    require_once "../controladores/controladores.php";
    $close_session = new controladores();
    echo $close_session->controlador_que_cierra_session();
} else if (isset($_POST['idCliente'])) {
    require_once "../controladores/controladores.php";
    $funcion = new controladores();
    echo $funcion->controlador_que_registra_comentarios();
} else if (isset($_POST['idClienteR'])) {
    require_once "../controladores/controladores.php";
    $funcion = new controladores();
    echo $funcion->controlador_que_registra_la_calificacion();
}
