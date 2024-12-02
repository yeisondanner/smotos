 <?php
    $idCliente = $_SESSION['SRM_idCliente'];
    $sql = "SELECT*FROM cliente AS c WHERE c.idCliente='$idCliente';";
    $row = $func->updateInformacion($sql)->fetch();
    $_SESSION['SRM_tipoUso'] = $row['c_tipoUso'];
    $_SESSION['SRM_Experiencia'] = $row['c_Experiencia'];
    if (isset($_POST['buscador'])) {
    ?>
     <div class="px-2">
         <div>
             <h1 class="text-xl font-semibold">Resultado para "<?php echo $_POST['buscador']; ?>"</h1>
         </div>
         <div class="w-full grid">
             <?php
                echo $func->controlador_que_lista_motos_buscadas($_POST['buscador']);
                ?>
         </div>
     </div>
 <?php
        exit;
    }
    ?>
 <div>
     <div class="px-2">

     </div>
     <div class=" w-full px-2 space-y-3">
         <div class="mt-2 rounded-md bg-gray-50 border p-1">
             <h1 class="text-lg font-semibold text-red-600"><i class="fa fa-eye" aria-hidden="true"></i>
                 Vistos recientemente</h1>
             <hr>
             <div class="flex overflow-x-auto w-full">
                 <?php echo $func->controlador_que_lista_el_historial_de_motos_vistas($_SESSION['SRM_idCliente']); ?>
             </div>
         </div>
         <div class="bg-gray-50 rounded-md border mt-2 p-1">
             <h1 class="text-lg font-semibold text-red-600"> <i class="fa fa-star" aria-hidden="true"></i>
                 Recomendacion exclusiva para ti <span class="text-xs border rounded-lg text-white bg-red-500 px-2"><?php echo $_SESSION['SRM_Experiencia'] ?></span> <span class="text-xs border rounded-lg text-white bg-red-500 px-2"><?php echo $_SESSION['SRM_tipoUso'] ?></span></h1>
             <hr>
             <div class="flex overflow-x-auto w-full">
                 <?php
                    echo $func->controlador_ejecuta_calculo($_SESSION['SRM_idCliente']);
                    echo $func->controlador_que_lista_la_recomendacion();
                    ?>
             </div>
         </div>
         <div class="bg-gray-50 rounded-md border mt-2 p-1">
             <h1 class="text-lg font-semibold text-red-600"> <i class="fa fa-star" aria-hidden="true"></i>
                 Más recomendaciones para ti <span class="text-xs border rounded-lg text-white bg-red-500 px-2"><?php echo $_SESSION['SRM_Experiencia'] ?></span> <span class="text-xs border rounded-lg text-white bg-red-500 px-2"><?php echo $_SESSION['SRM_tipoUso'] ?></span></h1>
             <hr>
             <div class="flex overflow-x-auto w-full">
                 <?php
                    echo $func->controlador_ejecuta_calculo($_SESSION['SRM_idCliente']);
                    echo $func->controlador_que_lista_la_recomendacion1();
                    ?>
             </div>
         </div>
     </div>
     <div class="w-full h-80 mt-2" style="background: url('https://www.xtrafondos.com/wallpapers/resized/carrera-de-motos-2013.jpg?s=large') center top no-repeat fixed; background-size: cover;">
     </div>
     <div class="px-2 w-full space-y-3 py-2">
         <?php echo $func->controlador_que_lista_las_motocicletas(); ?>
     </div>
 </div>