<!--Header-->
<header class="flex justify-between space-x-1 py-2 bg-white border-b w-full">
    <!--toggle-->
    <div class="flex justify-between space-x-4 px-2 py-1">
        <div class="px-2 py-1">
            <button class="btn-open-toggle"><i class="fa fa-align-justify text-red-500 font-bold" aria-hidden="true"></i></button>
        </div>
        <a href="<?php echo SERVERURL ?>home/">
            <div class="flex motocicleta">
                <img src="<?php echo SERVERURL ?>vistas/assets/icons/motorbike.png" class="w-10" alt="">
                &nbsp;
                <h1 class="text-xl font-bold text-red-500 hidden sm:inline py-2"><?php echo COMPANY ?></h1>
            </div>
        </a>
    </div>
    <!--Search input-->
    <div class="w-48 md:w-96">
        <form action="" method="POST" class="bg-gray-100 px-2 rounded-md py-1 flex">
            <input type="search" name="buscador" placeholder="Busca motos en San Luis Motors" id="" class="bg-gray-100 h-full outline-none text-xs md:text-base w-full py-2 ">
            <button type="submit" class="bg-red-500 px-2 py-1 rounded-lg"><i class="fa fa-search text-white" aria-hidden="true"></i></button>
        </form>
    </div>
    <!--btn login-->
    <div class="px-4 py-1">
        <?php
        if (!isset($_SESSION['SRM_idPersona'])) { ?>
            <div class="py-1 bg-red-500 px-2 rounded-lg cursor-pointer">
                <a href="<?php echo SERVERURL ?>login/" title="Inicio de session al sistema" class="text-white font-semibold"> <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="hidden md:inline"> Ingreso</span></a>
            </div>
    </div>
<?php } ?>
</header>