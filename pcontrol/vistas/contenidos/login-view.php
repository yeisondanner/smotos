<body class="bg-gray-200 pt-7">
    <!-- component -->
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-2xl rounded-2xl px-12 pt-6 pb-8 mb-4" autocomplete="off" method="POST">
                <div class="w-full h-40 shadow-lg">
                    <img loading="lazy" class="h-full w-full rounded-t-lg" src="https://fondosmil.com/fondo/17010.jpg" alt="">
                </div>
                <!-- @csrf -->
                <div class="text-gray-800 uppercase font-bold text-2xl flex justify-center border-b-2 py-2 mb-4">
                    Inicio de Sesion
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="user">Usuario</label>
                    <input class="hover:bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="user" id="user" v-model="form.email" type="text" required autofocus placeholder="Usuario" />
                </div>
                <div class="">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">Password</label>
                    <input class="hover:bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="form.password" type="password" placeholder="Password" name="password" required id="password" autocomplete="current-password" />
                </div>
                <div class="mb-6 flex">
                    <label for="" class="text-blue-600 text-sm">
                        <input class="" type="checkbox" name="" id="">
                        <span class="align-baseline">Recuerdame</span>
                    </label>
                </div>
                <div class="flex items-center justify-between">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Ingresar <i class="fas fa-door-open h-5 w-5"></i></button>
                    <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="#">Olvidaste tu contraseña?</a>
                </div>
                <div class="w-full h-12 shadow-xl mt-2">
                    <img loading="lazy" class="h-full w-full rounded-b-lg" src="https://revistaroomin.com/wp-content/uploads/2017/09/footer-fondo-pie.jpg" alt="">
                </div>
            </form>
        </div>
    </div>
    <footer class="fixed bottom-0 bg-gray-400 w-full py-1">
        <p class="text-center text-gray-100 text-xs">
            &copy;2022 Yeison Carhuapoma. All rights reserved.
        </p>
    </footer>
</body>
<?php
if (isset($_POST['user'])) {
    echo $func->controlador_que_inicia_session();
}
?>