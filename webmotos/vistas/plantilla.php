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
                                <div style="width: 50%; margin: 5rem auto; " class="px-4 flex justify-center">
                                    <form action="" method="post" class="sm:w-96 w-full bg-white shadow-lg p-6 rounded-lg border">
                                        <div class="mb-4">
                                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿De qué año deseas la moto?</strong>
                                            </label>
                                            <input type="number" name="year" id="year" min="1000"
                                                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                placeholder="Ingrese el año de su preferencia">
                                        </div>
                                        <div class="mb-4">
                                            <label for="cilindraja" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿Qué capacidad de tanque deseas en litros?</strong>
                                            </label>
                                            <input type="number" name="cilindraja" id="cilindraja" min="10"
                                                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                placeholder="Ingrese un cilindraje de su preferencia">
                                        </div>
                                        <div class="mb-4">
                                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿De qué color quieres la moto?</strong>
                                            </label>
                                            <select name="color" id="color" required
                                                class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                                <option value="" disabled selected>Seleccione el color</option>
                                                <?php echo $func->controlador_para_combo_de_color(); ?>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="uso" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿Para qué uso desea la moto?</strong>
                                            </label>
                                            <select name="uso" id="uso"
                                                class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                                <option value="" disabled selected>Seleccione el uso de la moto</option>
                                                <option value="Ciudad">Para ciudad</option>
                                                <option value="Campo">Para el campo</option>
                                                <option value="Mixto">Uso mixto</option>
                                                <option value="Viajes">Para viajes</option>
                                                <option value="Deporte">Deporte</option>
                                                <option value="Delivery">Delivery</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="experiencia" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿Qué experiencia tienes en el uso de motos?</strong>
                                            </label>
                                            <select name="experiencia" id="experiencia"
                                                class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                                <option value="" disabled selected>Seleccione el nivel de experiencia</option>
                                                <option value="Experto">Experto</option>
                                                <option value="Principiante">Principiante</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">
                                                <strong>¿Con qué presupuesto cuenta? (s/.)</strong>
                                            </label>
                                            <input type="number" name="precio" id="precio" min="1000" step="0.01"
                                                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                                placeholder="Ingrese un precio">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="w-full bg-red-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-red-700 transition duration-200">
                                                Continuar
                                            </button>
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