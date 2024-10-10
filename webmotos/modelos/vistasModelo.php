<?php
class vistasModelo
{
    protected static function obtener_vistas_modelo($vistas)
    {
        $listaBlanca = ["home","moto"];
        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./vistas/contenidos/" . $vistas . "-view.php")) {
                $contenido = "./vistas/contenidos/" . $vistas . "-view.php";
            } else {
                $contenido = "404";
            }
        } else if ($vistas == "login" || $vistas == "index") {
            $contenido = "login";
        } else if ($vistas == "register") {
            $contenido = "register";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
