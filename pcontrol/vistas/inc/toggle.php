    <!--toggle-->
    <div class="hidden h-full grid sm:flex sm:flex-wrap toggle-menu
                border-r-2 w-96 absolute z-50 sm:relative bg-white shadow-lg">
        <div class="h-11 w-full my-0">
            <div class="flex justify-between h-full w-full bg-cyan-700
                        px-8">
                <div>

                </div>
                <div>
                    <h1 class="text-center text-white font-bold py-1
                                text-base md:text-lg"><?php echo COMPANY ?></h1>
                </div>
                <div>
                    <button title="Cerrar" class="sm:hidden text-xl py-1
                                close-toggle
                                shadow-inner font-bold text-white hover:text-red-600">
                        x
                    </button>
                </div>
            </div>
        </div>
        <div class="h-24 w-full my-0 py-4">
            <div class="w-full flex justify-between">
                <div class="w-32">
                    <img class="rounded-full h-full w-full" src="https://cdn.dribbble.com/users/2313212/screenshots/11256142/media/27b57b3ee2ac221dc8c616d02161d96b.jpg?compress=1&resize=400x300" alt="" srcset="">
                </div>
                <div class="w-full pl-6">
                    <h1 class="font-semibold text-lg my-2"><?php echo $_SESSION['SRM_Nombres']; ?>&nbsp;<span class="text-xs">(<?php echo $_SESSION['SRM_Usuario'] ?>)</span></h1>
                    <h3 class="text-xs"><i class="fa fa-circle
                                    text-green-600" aria-hidden="true"></i>&nbsp;&nbsp;<span>Online</span></h3>
                </div>
            </div>
        </div>
        <!---toggle-->
        <div class="bg-gray-50 rounded-md border-t-2 border-b-2
                    shadow-sm py-1 flex flex-col px-1 space-y-2 w-full
                    overflow-y-auto" style="height: 27rem ;">
            <!--items de toggle-->
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1">
                    <a href="<?php echo SERVERURL; ?>home"> <i class="fa fa-th-large"></i> Home
                    </a>
                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        Vehiculos
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="<?php echo SERVERURL ?>vehicle-new" class="text-gray-500">
                            <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Nuevo Vehiculo
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="<?php echo SERVERURL ?>vehicle-list" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Lista Vehiculo
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="deletearea.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar
                            Area
                        </a>
                    </div>
                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <i class="fa fas fa-th-list" aria-hidden="true"></i>
                        Estante
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="createstante.html
                            " class="text-gray-500">
                            <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Crear Estante
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="modifystante.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Modificar
                            Estante
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="deletestante.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar
                            Estante
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="asignarseccion.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Asignar seccion a
                            Estante
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="deleteasignacion.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar Asignacion
                        </a>
                    </div>

                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <i class="fa fa-folder text-gray-600" aria-hidden="true"></i> Carpetas
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="createfolder.html" class="text-gray-500"> <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Crear Carpeta
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="modifyfolder.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Modificar
                            Carpeta
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="deletefolder.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar
                            Carpeta
                        </a>
                    </div>
                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <p class="text-gray-600"><i class="fa fa-file" aria-hidden="true"></i> Archivos</p>
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="uploadfile.html" class="text-gray-500">
                            <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Subir Archivo
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <p class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Modificar Archivo
                        </p>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <p class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar Archivo
                        </p>
                    </div>
                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <p class="text-gray-600"><i class="fa fa-user" aria-hidden="true"></i> Perfil</p>
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="profile.html" class="text-gray-500"> <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Ver biografia
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="editprofile.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Editar perfil
                        </a>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <a href="desactiveAcount.html" class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Desactivar Cuenta
                        </a>
                    </div>
                </div>
            </div>
            <div class="drop-shadow-md w-full border rounded-sm
                        bg-gray-200">
                <div class="hover:bg-cyan-50 hover:rounded-sm
                            cursor-pointer w-full px-1 item">
                    <button class="">
                        <p class="text-gray-600"><i class="fa fa-gear" aria-hidden="true"></i> Configuracion</p>
                    </button>
                </div>
                <div class="group-item hidden transition-opacity border
                            rounded-sm bg-gray-100">
                    <div class="hover:bg-gray-50 pl-2">
                        <p class="text-gray-500"> <i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Seguridad</p>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <p class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Inicios de sesion</p>
                    </div>
                    <div class="hover:bg-gray-50 pl-2">
                        <p class="text-gray-500"><i class="fa
                                        fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Sistema</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hover:bg-red-700 cursor-pointer flex bg-red-600
                    justify-end px-4 h-12 w-full">
            <button class="text-white py-2" id="exit-sesion" title="Cerrar sesion del
                        sistema">
                <span>Cerrar Sesion</span> &nbsp;&nbsp;&nbsp;
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </button>
        </div>

    </div>

    <script>
        document.getElementById('exit-sesion').addEventListener('click', closeSesion)

        function closeSesion() {
            Swal.fire({
                title: '¿Estás seguro de cerrar la sesión?',
                text: "Está a punto de cerrar la sesión y salir del sistema.",
                type: 'question',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, salir!',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.value) {
                    let url = '<?php echo SERVERURL; ?>/ajax/ajax.php';
                    let token = '<?php echo $func->encryption($_SESSION['SRM_Token']) ?>';
                    let usuario = '<?php echo $func->encryption($_SESSION['SRM_Usuario']) ?>';
                    let datos = new FormData();
                    datos.append('token', token);
                    datos.append('usuario', usuario);
                    fetch(url, {
                            method: 'POST',
                            body: datos
                        })
                        .then(respuesta => respuesta.json())
                        .then(respuesta => {
                            return alertas_ajax(respuesta);
                        });
                }
            });
        }
        // document.getElementById("#closeSession").onclick(closeSesion(e));
    </script>