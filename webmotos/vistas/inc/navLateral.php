<!--toggle-->
<div class="toggle hidden w-80 h-screen overflow-y-auto px-4 border-r bg-white absolute z-50">
    <div class="w-full flex justify-end py-2">
        <div>
            <button class="btn-close-toggle"><i class="fa fa-close text-red-500" style="font-size: 25px;" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="w-full py-1 object-center">
        <h1 class="text-4xl text-center font-bold text-red-500"><?php echo COMPANY ?></h1>
        <p class="text-xs text-center text-red-500">Tu mejor opcion en cuanto a motos se requiere</p>
        <div class="w-full flex justify-center">
            <div class="bg-red-500 pt-1 w-40 my-2 rounded-lg"></div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['SRM_idPersona'])) { ?>
        <div class="w-full flex border-b border-t py-1 bg-gray-50">
            <div class="w-20 rounded-full border">
                <img class="h-full w-full rounded-full" src="https://scontent.flim12-1.fna.fbcdn.net/v/t39.30808-6/271799887_649272906388175_4742034050625791282_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ycFpnRSswLsAX8egJsf&_nc_ht=scontent.flim12-1.fna&oh=00_AT-cBVam0JoZttgyY57001JVAPVI2dOsD4q7uGk7TkwNcw&oe=6251E3A0" alt="">
            </div>
            <div class="py-2 w-full pl-4">
                <h1 class="text-xl font-semibold text-red-500"><?php echo $_SESSION['SRM_Nombres'] ?></h1>
                <p><i class="fa fa-circle text-green-500" style="font-size: 12px;" aria-hidden="true"></i>&nbsp;&nbsp;<span class="text-red-500 text-sm">Soltero</span></p>
            </div>
        </div>
    <?php } else {
    ?>
        <div class="w-full flex border-b border-t justify-center space-x-3 py-2 text-white bg-gray-50">
            <div class="py-2">
                <a href="<?php echo SERVERURL ?>login/" class="bg-red-500 hover:bg-red-600 py-2 px-3 rounded-md"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Ingreso</a>
            </div>
            <div class="py-2">
                <a href="<?php echo SERVERURL ?>register/" class="bg-red-500 hover:bg-red-600 py-2 px-3 rounded-md"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;Registro</a>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="w-full h-auto space-y-4 py-3">
        <h1 class="text-gray-400 text-lg">Motos más vistas</h1>
        <?php echo $func->controlador_que_lista_motos_mas_vistas() ?>
       
    </div>
    <?php
    if (isset($_SESSION['SRM_idPersona'])) { ?>
        <div class="w-full bg-white py-4">
            <div class="py-2">

            </div>
            <div class="px-2 w-full">
                <button id="exit-sesion" class="bg-red-500 hover:bg-red-600 w-full text-white py-2 font-semibold rounded-md"> <i class="fa fa-close" aria-hidden="true"></i> Salir</button>
            </div>
        </div>
    <?php
        include "./vistas/inc/LogOut.php";
    }
    ?>
</div>