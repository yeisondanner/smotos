<div class="flex justify-center w-full" style="background: url('https://www.xtrafondos.com/wallpapers/motocicleta-1492.jpg') center top fixed;">
    <div class="">
        <div class="bg-white w-80 sm:w-96 my-32 rounded-md shadow-2xl border justify-center">
            <h1 class="text-center text-4xl font-bold text-red-500"><?php echo COMPANY ?></h1>
            <div class="flex justify-center -mt-5">
                <img src="motorbike.png" class="w-20" alt="">
            </div>
            <h1 class="text-center text-xl text-red-500 font-semibold py-4">Registro de cuenta</h1>
            <div class="w-full flex justify-center -mt-4">
                <div class="bg-red-500 pt-1 rounded-lg w-20 shadow-lg">
                </div>
            </div>
            <form action="" method="POST" class="w-full py-4">
                <fieldset>
                    <legend class="text-red-500 font-bold">Datos personales</legend>
                    <hr>
                    <div class="grid px-1 py-1">
                        <label for="nombreCliente" class="text-red-500 font-semibold">Nombre</label>
                        <input type="text" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="nombreCliente" id="nombreCliente">
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="apelllidosCliente" class="text-red-500 font-semibold">Apellidos</label>
                        <input type="text" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="apelllidosCliente" id="apelllidosCliente">
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="emailCliente" class="text-red-500 font-semibold">Correo Electronico</label>
                        <input type="email" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="emailCliente" id="emailCliente">
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="fechaNacimientoCliente" class="text-red-500 font-semibold">Fecha Nacimiento</label>
                        <input type="date" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="fechaNacimientoCliente" id="fechaNacimientoCliente">
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="sexoCliente" class="text-red-500 font-semibold">Sexo</label>
                        <select name="sexoCliente" id="sexoCliente" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400">
                            <option value="" disabled selected>Seleccione su sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="estadoCivilCliente" class="text-red-500 font-semibold">Estado Civil</label>
                        <select name="estadoCivilCliente" id="estadoCivilCliente" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400">
                            <option value="" disabled selected>Seleccione su estado civil</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-red-500 font-bold">Datos de cuenta</legend>
                    <hr>
                    <div class="grid px-1 py-1">
                        <label for="usuarioCliente" class="text-red-500 font-semibold">Usuario</label>
                        <input type="text" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="usuarioCliente" id="usuarioCliente">
                    </div>
                    <div class="grid px-1 py-1">
                        <label for="passwordCliente" class="text-red-500 font-semibold">Contraseña</label>
                        <input type="text" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400" name="passwordCliente" id="passwordCliente">
                    </div>
                </fieldset>
                <div class="grid px-1 py-1 mt-2">
                    <button class="bg-red-500 rounded-lg hover:bg-red-600 py-1 text-white font-semibold">Crear
                        Cuenta</button>
                </div>
                <div class="flex px-1 py-2">
                    <div><span class="text-sm text-gray-500">¿Ya tienes una cuenta?</span> <a href="<?php echo SERVERURL ?>login/" class="text-sm text-red-500 font-bold">Inicia Sesion</a>
                    </div>
                </div>
            </form>
            <div class="w-full bg-red-500 py-2 mt-2 rounded-b-md">
            </div>
        </div>
    </div>
</div>
<?php
if (($_POST)) {
    echo $func->controlador_que_registra_al_cliente();
}

?>