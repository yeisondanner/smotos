<?php
$url = explode('/', $_GET['views']);
$idMotos = $url[1];
if ($idMotos != null) {
    echo $func->controlador_que_registra_la_vista_de_la_moto($_SESSION['SRM_idCliente'], $idMotos);
}
?>
<div style="padding-left: 2rem; padding-right: 2rem;">
    <div class="absolute z-50 mt-4 ml-4">
        <h1 class="text-white font-semibold text-3xl" style="text-shadow: 0 0 10px black;"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Modelo'] ?></h1>
        <h6 class="text-sm text-white" style="text-shadow: 0
        0 10px black;"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Year'] ?></h6>
    </div>

    <div class="owl-carousel owl-theme">
        <?php echo $func->controlador_que_obtiene_las_imagenes_de_la_moto($idMotos) ?>
    </div>
    <div class="w-full bg-white py-2  flex space-x-2 justify-between overflow-x-auto  px-4" style="gap: 1rem;">
        <div>
            <h1 class="text-center text-xl w-full
            text-red-600 font-semibold" style="font-size: 1.5rem; margin-bottom: 1rem;">Informacion
                del
                vehiculo</h1>
            <div class="w-96 border rounded-md grid
            grid-cols-2">
                <div class="w-full text-left px-1 border-b bg-gray-100">
                    <h1 class="text-sm">Modelo</h1>
                </div>
                <div class="w-auto text-right px-1 border-b bg-gray-100">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Modelo'] ?></h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Año</h1>
                </div>
                <div class="w-auto text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Year'] ?></h5>
                </div>
                <div class="w-full text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Marca</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Marca'] ?></h5>
                </div>
                <div class="w-full text-left px-1 ">
                    <h1 class="text-sm">Color</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['c_Color'] ?></h5>
                </div>
                <div class="w-full text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Cilindrada</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Cilindrada'] ?> L</h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Tipo Transmision</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['tt_tipoTransmicion'] ?></h5>
                </div>
                <div class="w-full text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Prendido Electrico</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php if ($func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_encendidoElectrico'] > 0) {
                                            echo "Sí";
                                        } else {
                                            echo "No";
                                        } ?></h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Prendido Manual</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php if ($func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_encendidoManual'] > 0) {
                                            echo "Sí";
                                        } else {
                                            echo "No";
                                        } ?></h5>
                </div>
                <div class="w-auto text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Tipo Motor</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['tm_tipoMotor'] ?></h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Freno Delantero</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)[30] ?></h5>
                </div>
                <div class="w-full text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Freno Trasero</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)[32] ?></h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Peso</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Peso'] ?> kg</h5>
                </div>
                <div class="w-full text-left px-1 bg-gray-100">
                    <h1 class="text-sm">Velocidad maxima</h1>
                </div>
                <div class="w-full text-right px-1 border-b">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_velocidadMaxima'] ?> km</h5>
                </div>
                <div class="w-full text-left px-1">
                    <h1 class="text-sm">Aceleracion</h1>
                </div>
                <div class="w-full text-right px-1">
                    <h5 class="text-xs"><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Aceleracion'] ?> segundos de 0 a 100 km</h5>
                </div>
            </div>
        </div>
        <div>
            <h1 class="font-semibold text-xl text-red-600" style="font-size: 1.5rem; margin-bottom: 1rem;">Descripcion</h1>
            <p><?php echo $func->controlador_que_obtiene_informacion_de_la_moto($idMotos)['m_Descripcion'] ?></p>
        </div>
    </div>
    <div class="w-full grid md:flex justify-between px-4
                            py-2">

        <div>
            <h1><span class="text-black text-lg font-semibold">Calificar
                    : </span><span class="text-yellow-500 text-2xl" id="Estrellas"></span></h1>
        </div>
        <div class="flex space-x-2 rounded-lg bg-white
                                px-4">
            <h1 class="text-lg text-gray-800 font-semibold">Compartir</h1>
            <span>|</span>
            <a href="http://" target="_blank" rel="noopener
                                    noreferrer" class="text-xl px-1"><i class="fa
                                        fa-whatsapp text-green-500" aria-hidden="true"></i></a>
            <a href="http://" target="_blank" rel="noopener
                                    noreferrer" class="text-xl px-1"><i class="fa
                                        fa-facebook text-blue-500" aria-hidden="true"></i></a>
            <a href="http://" target="_blank" rel="noopener
                                    noreferrer" class="text-xl px-1"><i class="fa
                                        fa-telegram text-blue-500" aria-hidden="true"></i></a>
        </div>
    </div>
    <div id="mensaje">

    </div>
    <div class="w-full px-2">
        <div class="w-full">
            <div class="bg-red-600 w-full py-2
                                    rounded-t-lg">
            </div>
            <form action="<?php echo SERVERURL; ?>ajax/ajax.php" method="POST" data-form="save" class="FormularioAjax grid">
                <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $_SESSION['SRM_idCliente']; ?>">
                <input type="hidden" name="idMotos" id="idMotos" value="<?php echo $idMotos; ?>">
                <input type="hidden" name="idGustos" id="idGustos" value="<?php echo $_SESSION['SRM_idGustos']; ?>">
                <div class="w-full">
                    <textarea name="comentario" required placeholder="Escribe un comentario" class="text-sm w-full
                                            rounded-b-lg px-2 py-1" id="" rows="4"></textarea>
                </div>
                <div class="w-full flex justify-end">
                    <button type="submit" class="bg-blue-600 px-2 py-1
                                            rounded-lg text-white
                                            font-semibold">Publicar comentario</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-full px-2 my-1">

        <?php echo $func->controlador_que_obtiene_los_comentarios($idMotos) ?>
    </div>
</div>
<script>
    $('#Estrellas').starrr({
        rating: <?php echo $func->controlador_que_obtiene_valor_calificacion($_SESSION['SRM_idCliente'], $idMotos) ?>,
        change: function(e, valor) {
            idCliente = document.getElementById('idCliente').value
            idMotos = document.getElementById('idMotos').value
            idGustos = document.getElementById('idGustos').value
            var parametros = {
                "idClienteR": idCliente,
                "idMotosR": idMotos,
                "idGustos": idGustos,
                "ValoracionR": valor
            };
            $.ajax({
                data: parametros,
                url: '../ajax/ajax.php',
                type: 'POST',
                beforesend: function() {
                    $('#mensaje').html('Carganado información, espere un momento');
                },
                success: function(mensaje) {
                    $('#mensaje').html(mensaje)
                }
            });
        }

    });
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navRewind: true,
        slideBy: true,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    })
</script>