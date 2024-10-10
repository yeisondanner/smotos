<?php session_start(['name' => 'SRMOTOS']) ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo COMPANY ?></title>
    <?php include "./vistas/inc/link.php"; ?>
    <?php
    $peticionAjax = false;
    require_once "./controladores/vistasControlador.php";
    $IV = new vistasControlador();
    $vistas = $IV->obtener_vistas_controlador();
    require_once "./controladores/controladores.php";
    $func = new controladores();
    ?>
</head>

<body class="bg-gray-300">
    <div class="w-full h-screen flex">
        <?php include "./vistas/inc/navLateral.php"; ?>
        <div class="h-full w-full flex flex-col">
            <?php include "./vistas/inc/navSuperior.php"; ?>
            <main class="h-full overflow-y-auto">
                <?php
                if ($vistas == "login") {
                    require_once "./vistas/contenidos/" . $vistas . "-view.php";
                } else if ($vistas == "register") {
                    require_once "./vistas/contenidos/" . $vistas . "-view.php";
                } else {
                    if (!isset($_SESSION['SRM_idPersona'])) {
                        require_once "./vistas/contenidos/access-restring-view.php";
                    } else {
                        if ($_SESSION['SRM_primeraVez'] == "Si") {
                ?>
                            <div class="w-full">
                                <h1 class="text-xl font-bold text-red-600">Primera vez que inicias sesion</h1>
                                <p>Este formulario te aparecera solo una ves, el motivo es porque se necesita recolectar cierto tipo de informacion para realizar la recomendacion personalidad de motocicleta para ti</p>
                                <div class="w-full px-2">
                                    <form action="" method="post" class="sm:w-96 w-full border px-2 rounded-lg">
                                        <div class="my-1">
                                            <label for="year"><strong>¿De que año deseas la moto?</strong></label>
                                            <br>
                                            <input type="number" name="year" id="year" min="1000" class="w-full rounded-lg" placeholder="Ingrese el año de su preferencia">
                                        </div>
                                        <div class="my-1">
                                            <label for="cilindraja"><strong>¿Que capacidad de tanque deseas en litros?</strong></label>
                                            <br>
                                            <input type="number" name="cilindraja" id="cilindraja" min="10" class="w-full rounded-lg" placeholder="Ingrese un cilindraje de su preferencia">
                                        </div>
                                        <div class="my-1">
                                            <label for="color"><strong>¿De que color quieres la moto?</strong></label>
                                            <br>
                                            <select name="color" id="color" required class="w-full rounded-lg">
                                                <option value="" disabled selected>Seleccione el color</option>
                                                <?php echo $func->controlador_para_combo_de_color(); ?>
                                            </select>
                                        </div>
                                        <div class="my-1">
                                            <label for="uso"><strong>¿Para que uso desea la moto?</strong></label>
                                            <br>
                                            <select name="uso" id="uso" class="w-full rounded-lg">
                                                <option value="" disabled selected>Seleccione el uso de la moto</option>
                                                <option value="Ciudad">Para ciudad</option>
                                                <option value="Campo">Para el campo</option>
                                                <option value="Mixto">Uso mixto</option>
                                                <option value="Viajes">Para viajes</option>
                                                <option value="Deporte">Deporte</option>
                                                <option value="Delivery">Delivery</option>
                                            </select>
                                        </div>
                                        <div class="my-1">
                                            <label for="experiencia"><strong>¿Qué experiencia tienes en el uso de motos?</strong></label>
                                            <br>
                                            <select name="experiencia" id="experiencia" class="w-full rounded-lg">
                                                <option value="" disabled selected>Seleccione el nivel de experiencia</option>
                                                <option value="Experto">Experto</option>
                                                <option value="Principiante">Principiante</option>
                                            </select>
                                        </div>
                                        <div class="my-1">
                                            <label for="precio"><strong>¿Con que presupuesto cuenta? (s/.)</strong></label>
                                            <br>
                                            <input type="number" name="precio" id="precio" min="1000" step="0.01" class="w-full rounded-lg" placeholder="Ingrese un precio">
                                        </div>
                                        <div class="my-1">
                                            <button type="submit" class="text-white rounded-full w-full bg-red-600 px-2 font-semibold">Continuar</button>
                                        </div>
                                    </form>
                                </div>

                    <?php
                            if (isset($_POST['year'])) {
                                echo $func->controlador_que_registra_variables_iniciales();
                            }
                        } else {
                            include $vistas;
                        }
                    }
                }
                include "./vistas/inc/footer.php";
                    ?>
            </main>
        </div>
    </div>
    <?php include "./vistas/inc/script.php"; ?>
</body>

</html>