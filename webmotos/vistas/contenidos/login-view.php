<div class="flex justify-center w-full" style="background: url('https://www.xtrafondos.com/wallpapers/motocicleta-1492.jpg') center top fixed;">
    <div class="">
        <div class="bg-white w-80 sm:w-96 my-32 rounded-md shadow-2xl border justify-center">
            <h1 class="text-center text-4xl font-bold text-red-500"><?php echo COMPANY ?></h1>
            <div class="flex justify-center -mt-5">
                <img src="motorbike.png" class="w-20" alt="">
            </div>
            <h1 class="text-center text-xl text-red-500 font-semibold py-4">Inicio de sesion</h1>
            <div class="w-full flex justify-center -mt-4">
                <div class="bg-red-500 pt-1 rounded-lg w-20 shadow-lg">
                </div>
            </div>
            <form method="POST" class="w-full py-4" autocomplete="off">
                <div class="grid px-1 py-1">
                    <label for="user" class="text-red-500 font-semibold">Usuario</label>
                    <input name="user" id="user" required type="text" class="w-full outline-none bg-gray-50 hover:bg-gray-100 h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400">
                </div>
                <div class="grid px-1 py-1">
                    <label for="password" class="text-red-500 font-semibold">Contraseña</label>
                    <input name="password" id="password" required type="password" class="w-full bg-gray-50 hover:bg-gray-100 outline-none h-8 rounded-lg px-2 focus:shadow-md focus:shadow-red-400">
                </div>
                <div class="flex justify-end px-1">
                    <label for=""><input type="checkbox" name="" id="">&nbsp;<span class="text-sm text-red-500">Recuerdame</span></label>
                </div>
                <div class="grid px-1 py-1 mt-2">
                    <button class="bg-red-500 rounded-lg hover:bg-red-600 py-1 text-white font-semibold">Iniciar
                        Session</button>
                </div>
                <div class="flex px-1 py-2">
                    <div><span class="text-sm text-gray-500">¿Necesistas una cuenta?</span> <a href="<?php echo SERVERURL ?>register/" class="text-sm text-red-500 font-bold">Registrate</a>
                    </div>
                </div>
            </form>
            <div class="w-full bg-red-500 py-2 mt-2 rounded-b-md">
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['user'])) {
    echo $func->controlador_que_inicia_session();
}
?>