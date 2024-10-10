<?php session_start(['name' => 'SRMOTOS']) ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo COMPANY ?></title>
    <?php
    include "./vistas/inc/link.php";
    $peticionAjax = false;
    require_once "./controladores/vistasControlador.php";
    $IV = new vistasControlador();
    $vistas = $IV->obtener_vistas_controlador();
    require_once "./controladores/controladores.php";
    $func = new controladores();
    ?>
</head>
<style>
    .open-toggle-left-transition {
        animation: abrir 0.8s;
    }

    @keyframes abrir {
        from {
            transform: translateX(-100vh);
        }

        to {
            transform: translateX(-0vh);
        }
    }
</style>
<?php
if ($vistas == "login") {
    require_once "./vistas/contenidos/" . $vistas . "-view.php";
} else if ($vistas == "404") {
    echo "404";
} else {
    if (!isset($_SESSION['SRM_idTrabajador'])) {
        echo "Acceso Restringido";
        exit;
    }
?>
    <div class="w-full h-screen bg-white flex">
        <?php include "./vistas/inc/toggle.php"; ?>
        <!--contenedor-->
        <div class="flex flex-col h-full w-full">
            <?php include "./vistas/inc/navbar.php"; ?>
            <!--Body-->
            <main class="h-full w-full overflow-y-auto bg-gray-100">
                <?php
                include $vistas;
                ?>
            </main>
        </div>
    </div>
<?php
    include "./vistas/script/script.php";
}
?>

</html>