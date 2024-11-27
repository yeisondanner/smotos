<?php

use Mpdf\Tag\Main;

if ($peticionAjax) {
    require_once '../modelos/modelos.php';
} else {
    require_once './modelos/modelos.php';
}
class controladores extends modelos
{
    public function controlador_que_inicia_session()
    {
        $user = mainModel::limpiar_cadena($_POST['user']);
        $password = mainModel::limpiar_cadena($_POST['password']);
        if ($user == "" || $password == "") {
            $alerta = "
            <script>
                Swal.fire({
                    title: 'Ocurrio un error inesperado',
                    text: 'No a llenado todos los campos correctamente',
                    type: 'error',
                    icon:'error',
                    confirmButtonText: 'Aceptar'
                });
            </script>";
        } else {
            if (modelos::modelo_que_inicia_session($user, $password)->rowCount() > 0) {
                $row = modelos::modelo_que_inicia_session($user, $password)->fetch();
                $_SESSION['SRM_idPersona'] = $row['idPersona'];
                $_SESSION['SRM_idCliente'] = $row['idCliente'];
                $_SESSION['SRM_tipoUso'] = $row['c_tipoUso'];
                $_SESSION['SRM_Experiencia'] = $row['c_Experiencia'];
                $_SESSION['SRM_Nombres'] = $row['p_Nombres'];
                $_SESSION['SRM_Usuario'] = $row['cu_Usuario'];
                $_SESSION['SRM_primeraVez'] = $row['cu_primeraVez'];
                $ic = $row['idCliente'];;
                $consulta = "SELECT * FROM `gustos` as g where g.idCliente='$ic';";
                $idgustos = mainModel::ejecutar_consulta_simple($consulta)->fetch()['idGustos'];
                $_SESSION['SRM_idGustos'] = $idgustos;
                $_SESSION['SRM_Token'] = md5(uniqid(mt_rand(), true));
                $alerta = "<script>
                                window.location.href='" . SERVERURL . "home/'
                           </script>";
            } else {
                $alerta = "
                <script>
                    Swal.fire({
                        title: 'Ocurrio un error inesperado',
                        text: 'Usuario y contraseña incorrectos, intentelo nuevamente',
                        type: 'error',
                        icon:'error',
                        confirmButtonText: 'Aceptar'
                    });
                </script>";
            }
        }
        return $alerta;
    }
    public function controlador_que_cierra_session()
    {
        session_start(['name' => 'SRMOTOS']);
        $token = mainModel::decryption($_POST['token']);
        $usuario = mainModel::decryption($_POST['usuario']);
        if ($token == $_SESSION['SRM_Token'] && $usuario == $_SESSION['SRM_Usuario']) {
            session_unset();
            session_destroy();
            $alerta = [
                "Alerta" => "redireccionar",
                "URL" => SERVERURL . "login/"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "No se pudo cerrar la sesion en el Sistema",
                "Tipo" => "error",
                "Icon" => "error"
            ];
        }
        echo json_encode($alerta);
    }
    public function controlador_que_lista_el_historial_de_motos_vistas($idCliente)
    {
        $consulta = "SELECT * FROM vista as v 
        inner join motos as m on m.idMotos=v.idMotos
        left join imagen as i on i.idMotos=m.idMotos
        where v.idCliente='$idCliente' 
         group by m.idMotos order by m.m_fechaRegistro DESC  limit 20 ;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                if ($row['i_Imagen'] != null) {
                    $img = SERVERURL . 'vistas/assets/motos/' . $row['i_Imagen'];
                    $url = 'href="' . SERVERURL . 'moto/' . mainModel::encryption($row['idMotos']) . '"';
                } else {
                    $img = SERVERURL . 'vistas/assets/img/sinimagen.jpg';
                    $url = '';
                }
                $cadena .= ' <div class="px-2 py-2">
                <div class="w-96 sm:w-72 hover:shadow-xl bg-white rounded-lg shadow-md">
                    <div class="w-full p-1">
                        <a ' . $url . '">
                            <img class="w-full" src="' . $img . '" alt="">
                        </a>
                    </div>
                    <div class="px-2 py-2">
                        <h1 class="text-lg font-bold text-red-500">' . $row['m_Modelo'] . '</h1>
                        <h5 class="text-sm text-gray-600">' . $row['m_Marca'] . '</h5>
                        <h6 class="text-right text-base text-red-500 font-bold">' . MONEDA . ' ' . $row['m_Precio'] . '</h6>
                        <div class="w-full flex justify-between py-2 border-t mt-2">
                            <div class="py-1">
                                <p class="text-xs text-gray-500">Comparte o reacciona</p>
                            </div>
                            <div class="flex space-x-2">
                                <div class="px-1">
                                    <button class="text-lg text-blue-500"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                                </div>
                                <div class="px-1">
                                    <button class="text-lg text-blue-600"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                </div>
                                <div class="px-1">
                                    <button class="text-lg text-sky-500"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                                </div>
                                <div class="px-1">
                                    <button class="text-lg text-green-500"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                                </div>
                                &nbsp;|
                                <div class="px-1 text-center">
                                    <button class="text-lg text-red-500"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                                    <p class="text-xs text-red-500 font-semibold"> ' . self::controlador_que_obtiene_total_calificacion($row['idMotos']) . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            return $cadena;
        } else {
            return "<h1 class='py-10 px-2 text-center text-xl text-red-500'>Sin Historial</h1>";
        }
    }
    public function controlador_que_registra_la_vista_de_la_moto($idCliente, $idMotos)
    {
        $idMotos = mainModel::decryption($idMotos);
        $fecha = date("Y-m-d");
        $consulta = "SELECT * FROM `vista` as v where v.v_fechaRegistro like '%$fecha%' and v.idCliente='$idCliente' and v.idMotos='$idMotos';";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
        } else {
            if (modelos::modelo_que_registra_la_vista_del_atractivo_turistico($idCliente, $idMotos)->rowCount() > 0) {
            }
        }
    }
    public function controlador_que_obtiene_informacion_de_la_moto($idMoto)
    {
        $idMoto = mainModel::decryption($idMoto);
        $consulta = "SELECT * FROM `motos` as mo 
        inner join categoria as ca on ca.idCategoria=mo.idCategoria
        inner join color as co on co.idColor=mo.idColor
        inner join tipotransmision as ti on ti.idTipoTransmision=mo.idTipoTransmision
        inner join tipomotor as tm on tm.idTipoMotor=mo.idTipoMotor
        inner join tipofreno as tfd on tfd.idTipoFreno=mo.idTipoFrenoDelantero
        inner join tipofreno as tft on tft.idTipoFreno=mo.idTipoFrenoTrasero
        where mo.idMotos='$idMoto';";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $row = mainModel::ejecutar_consulta_simple($consulta)->fetch();
            return $row;
        }
    }
    public function controlador_que_obtiene_las_imagenes_de_la_moto($idMoto)
    {
        $idMoto = mainModel::decryption($idMoto);
        $consulta = "SELECT * FROM `imagen` as i WHERE i.idMotos='$idMoto';";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="bg-white item w-full h-72 sm:h-80
                md:h-screen">
                    <img class="h-full w-full" src="' . SERVERURL . 'vistas/assets/motos/' . $row['i_Imagen'] . '" alt="" srcset="">
                </div>';
            }
            return $cadena;
        } else {
            return "Sin imagenes";
        }
    }
    public function controlador_que_obtiene_los_comentarios($idMoto)
    {
        $idMoto = mainModel::limpiar_cadena(mainModel::decryption($idMoto));
        $consulta = "SELECT * FROM comentarios as c inner join cliente as cl on cl.idCliente=c.idCliente
        inner join persona as per on per.idPersona=cl.idPersona where c.idMotos='$idMoto' ORDER BY c.c_fechaRegistro DESC;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= ' <div class="w-full rounded-lg bg-white shadow-lg
                my-2">
                <h1 class="text-sm px-2 font-semibold">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                ' . $row['p_Nombres'] . '
                </h1>
                <div class="w-full px-1 border-t">
                <p>' . $row['c_Comentarios'] . '</p>
                </div>
                <div class="w-full flex justify-end">
                <div class="px-2 py-1">
                    <p class="text-xs
                                            font-semibold text-gray-600">' . $row['c_fechaRegistro'] . '</p>
                </div>
                </div>
                </div>';
            }
            return $cadena;
        } else {
            return "Sin comentarios";
        }
    }
    public function controlador_que_registra_comentarios()
    {
        $idCliente = mainModel::limpiar_cadena($_POST['idCliente']);
        $idMotos = mainModel::limpiar_cadena(mainModel::decryption($_POST['idMotos']));
        $comentario = mainModel::limpiar_cadena($_POST['comentario']);
        if ($idCliente == "" || $idMotos == "" || $comentario == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Se envio campos vacios",
                "Tipo" => "error",
                "Icon" => "error"
            ];
            echo json_encode($alerta);
        }
        if (modelos::modelo_que_registra_comentarios($idCliente, $idMotos, $comentario)->rowCount() > 0) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Completo",
                "Texto" => "Se registro de manera correcta el comentario",
                "Tipo" => "success",
                "Icon" => "success"
            ];
            echo json_encode($alerta);
        }
    }
    public function controlador_que_registra_la_calificacion()
    {
        $idCliente = mainModel::limpiar_cadena($_POST['idClienteR']);
        $idMotos = mainModel::limpiar_cadena($_POST['idMotosR']);
        $idMotos = mainModel::decryption($idMotos);
        $c_numeroEstrellas = mainModel::limpiar_cadena($_POST['ValoracionR']);
        $idGustos = mainModel::limpiar_cadena($_POST['idGustos']);
        $consulta = "SELECT * FROM `calificacion` as c where c.idCliente='$idCliente' and c.idMotos='$idMotos';";
        $consultaMoto = "SELECT * FROM `motos` WHERE idMotos='$idMotos';";
        $rg = mainModel::ejecutar_consulta_simple($consultaMoto)->fetch();
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            if (modelos::modelo_que_actualiza_la_calificacion($idCliente, $idMotos, $c_numeroEstrellas)) {
                if (modelos::modelo_que_actualiza_los_gustos($rg['m_Year'], $rg['idCategoria'], $rg['idColor'], $rg['m_Cilindrada'], $rg['idTipoTransmision'], $rg['m_encendidoElectrico'], $rg['m_encendidoManual'], $rg['idTipoMotor'], $rg['idTipoFrenoDelantero'], $rg['idTipoFrenoTrasero'], $rg['m_Peso'], $rg['m_velocidadMaxima'], $rg['m_Aceleracion'], $rg['m_Precio'], $c_numeroEstrellas, '0', $idGustos)->rowCount() > 0) {

                    return "Calificacion actualizada";
                }
            }
        } else {
            if (modelos::modelo_que_registra_la_calificacion($idCliente, $idMotos, $c_numeroEstrellas)->rowCount() > 0) {
                if (modelos::modelo_que_actualiza_los_gustos($rg['m_Year'], $rg['idCategoria'], $rg['idColor'], $rg['m_Cilindrada'], $rg['idTipoTransmision'], $rg['m_encendidoElectrico'], $rg['m_encendidoManual'], $rg['idTipoMotor'], $rg['idTipoFrenoDelantero'], $rg['idTipoFrenoTrasero'], $rg['m_Peso'], $rg['m_velocidadMaxima'], $rg['m_Aceleracion'], $rg['m_Precio'], $c_numeroEstrellas, '0', $idGustos)->rowCount() > 0) {

                    return "Calificacion registrada";
                }
            } else {
                return "Calificacion registrada";
            }
        }
    }
    public function controlador_que_obtiene_valor_calificacion($idCliente, $idMotos)
    {
        $idMotos = mainModel::limpiar_cadena(mainModel::decryption($idMotos));
        $consulta = "SELECT * FROM `calificacion` as c where c.idCliente='$idCliente' and c.idMotos='$idMotos';";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $row = mainModel::ejecutar_consulta_simple($consulta)->fetch();
            return $row['c_numeroEstrellas'];
        } else {
            return 0;
        }
    }
    public function controlador_que_obtiene_total_calificacion($idMotos)
    {
        // $idMotos = mainModel::decryption($idMotos);
        $consulta = "select AVG(c.c_numeroEstrellas) from calificacion as c where c.idMotos='$idMotos' GROUP by c.idMotos;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $row = mainModel::ejecutar_consulta_simple($consulta)->fetch();
            return $row[0];
        }
    }
    /**Algoritmo KNN */
    public function controlador_que_calcula_la_distancia(
        $year,
        $yearG,
        $cat,
        $catG,
        $col,
        $colG,
        $cil,
        $cilG,
        $trans,
        $transG,
        $ee,
        $eeG,
        $em,
        $emG,
        $tm,
        $tmG,
        $fd,
        $fdG,
        $ft,
        $ftG,
        $pes,
        $pesG,
        $vm,
        $vmG,
        $acel,
        $acelG,
        $prec,
        $precG
    ) {
        $resultado = sqrt(pow($yearG - $year, 2) + pow($catG - $cat,  2) +
            pow($colG - $col,  2) + pow($cilG - $cil,  2) + pow($transG - $trans,  2) + pow($eeG - $ee,  2) + pow($emG - $em,  2) +
            pow($tmG - $tm,  2) + pow($fdG - $fd,  2) + pow($ftG - $ft,  2) + pow($pesG - $pes,  2) + pow($vmG - $vm,  2) +
            pow($acelG - $acel,  2) + pow($precG - $prec,  2));
        return $resultado;
    }
    public function controlador_ejecuta_calculo($idCliente)
    {
        $BDGustos = "SELECT * FROM `gustos` AS g where g.idCliente='$idCliente';";
        if (mainModel::ejecutar_consulta_simple($BDGustos)->rowCount() > 0) {
            $var = mainModel::ejecutar_consulta_simple($BDGustos)->fetch();
            if ($_SESSION['SRM_Experiencia'] == "Experto") {
                $cat1 = "Todo Terreno";
            } else if ($_SESSION['SRM_Experiencia'] == "Principiante") {
                $cat1 = "SCOOTER Y SEMIAUTOMÁTICA";
            }
            if ($_SESSION['SRM_tipoUso'] == "Ciudad") {
                $cat2 = "Super Sport";
            } else if ($_SESSION['SRM_tipoUso'] == "Campo") {
                $cat2 = "Turismo";
            } else if ($_SESSION['SRM_tipoUso'] == "Mixto") {
                $cat2 = "Pisteras";
            } else if ($_SESSION['SRM_tipoUso'] == "Viajes") {
                $cat2 = "Enduro y Motocross";
            } else if ($_SESSION['SRM_tipoUso'] == "Deporte") {
                $cat2 = "Todo Terreno";
            } else if ($_SESSION['SRM_tipoUso'] == "Delivery") {
                $cat2 = "NAVI";
            }
            $BDMotos = "SELECT * FROM motos as mo 
            inner join imagen as im on im.idMotos=mo.idMotos 
            inner join categoria as ca on ca.idCategoria=mo.idCategoria
            where ca.c_Categoria='$cat1' or ca.c_Categoria='$cat2'
            group by mo.idMotos;";
            foreach (mainModel::ejecutar_consulta_simple($BDMotos)->fetchAll() as $row) {
                if (isset($_SESSION['ListN'])) {
                    $cont = count($_SESSION['ListN']);
                    $_SESSION['ListN'][$cont] = array(
                        "Distancia" => self::controlador_que_calcula_la_distancia(
                            $row['m_Year'],
                            $var['g_Year'],
                            $row['idCategoria'],
                            $var['g_Categoria'],
                            $row['idColor'],
                            $var['g_Color'],
                            $row['m_Cilindrada'],
                            $var['g_Cilindrada'],
                            $row['idTipoTransmision'],
                            $var['g_tipoTransmision'],
                            $row['m_encendidoElectrico'],
                            $var['g_encendidoElectrico'],
                            $row['m_encendidoManual'],
                            $var['g_encendidoManual'],
                            $row['idTipoMotor'],
                            $var['g_tipoMotor'],
                            $row['idTipoFrenoDelantero'],
                            $var['g_tipoFrenoDelantero'],
                            $row['idTipoFrenoTrasero'],
                            $var['g_tipoFrenoTrasero'],
                            $row['m_Peso'],
                            $var['g_Peso'],
                            $row['m_velocidadMaxima'],
                            $var['g_velocidadMaxima'],
                            $row['m_Aceleracion'],
                            $var['g_Aceleracion'],
                            $row['m_Precio'],
                            $var['g_Precio']
                        ),
                        "Modelo" => $row['m_Modelo'],
                        "Precio" => $row['m_Precio'],
                        "Imagen" => $row['i_Imagen'],
                        "idMoto" => $row['idMotos']
                    );
                } else {
                    $_SESSION['ListN'][0] = array(
                        "Distancia" => self::controlador_que_calcula_la_distancia(
                            $row['m_Year'],
                            $var['g_Year'],
                            $row['idCategoria'],
                            $var['g_Categoria'],
                            $row['idColor'],
                            $var['g_Color'],
                            $row['m_Cilindrada'],
                            $var['g_Cilindrada'],
                            $row['idTipoTransmision'],
                            $var['g_tipoTransmision'],
                            $row['m_encendidoElectrico'],
                            $var['g_encendidoElectrico'],
                            $row['m_encendidoManual'],
                            $var['g_encendidoManual'],
                            $row['idTipoMotor'],
                            $var['g_tipoMotor'],
                            $row['idTipoFrenoDelantero'],
                            $var['g_tipoFrenoDelantero'],
                            $row['idTipoFrenoTrasero'],
                            $var['g_tipoFrenoTrasero'],
                            $row['m_Peso'],
                            $var['g_Peso'],
                            $row['m_velocidadMaxima'],
                            $var['g_velocidadMaxima'],
                            $row['m_Aceleracion'],
                            $var['g_Aceleracion'],
                            $row['m_Precio'],
                            $var['g_Precio']
                        ),
                        "Modelo" => $row['m_Modelo'],
                        "Precio" => $row['m_Precio'],
                        "Imagen" => $row['i_Imagen'],
                        "idMoto" => $row['idMotos']
                    );
                }
            }
            // print_r($_SESSION['ListN']);
        } else {
            return "Sin informacion";
        }
    }
    public function controlador_que_lista_la_recomendacion()
    {
        if (isset($_SESSION['ListN'])) {
            //Se ordena el array
            sort($_SESSION['ListN'], SORT_DESC);
            $cont = 0;
            foreach ($_SESSION['ListN'] as $key => $value) {
                if ($cont == 0) {


?>
                    <div class="px-2 py-2">
                        <div class="w-96 sm:w-72 hover:shadow-xl bg-white rounded-lg shadow-md">
                            <div class="w-full p-1">
                                <a href="<?php echo SERVERURL ?>moto/<?php echo mainModel::encryption($value['idMoto']) ?>">
                                    <img class="w-full" src="<?php echo SERVERURL ?>vistas/assets/motos/<?php echo $value['Imagen'] ?>" alt="">
                                </a>
                            </div>
                            <div class="px-2 py-2">
                                <h1 class="text-lg font-bold text-red-500"><?php echo $value['Modelo'] ?></h1>
                                <h5 class="text-sm text-gray-600">Honda</h5>

                                <h6 class="text-right text-base text-red-500 font-bold"><?php echo MONEDA . " " . $value['Precio'] ?></h6>
                                <div class="w-full flex justify-between py-2 border-t mt-2">
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Comparte o reacciona</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <div class="px-1">
                                            <button class="text-lg text-blue-500"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-blue-600"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-sky-500"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-green-500"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                                        </div>
                                        &nbsp;|
                                        <div class="px-1">
                                            <button class="text-lg text-red-500"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                $cont++;
            }
        }
        unset($_SESSION['ListN']);
    }
    /**Fin del algrotimo */
    public function controlador_que_registra_variables_iniciales()
    {
        $year = $_POST['year'];
        $color = $_POST['color'];
        $uso = $_POST['uso'];
        $experiencia = $_POST['experiencia'];
        $precio = $_POST['precio'];
        $idCliente = $_SESSION['SRM_idCliente'];
        $consulta = "UPDATE `cliente` SET `c_tipoUso` = '$uso', `c_Experiencia` = '$experiencia' WHERE `cliente`.`idCliente` = '$idCliente'";
        $dataCliente = mainModel::ejecutar_consulta_simple($consulta);
        if ($dataCliente->rowCount() > 0) {
            $sql = "SELECT*FROM gustos AS g WHERE g.idCliente='$idCliente';";
            $dataGustos = mainModel::ejecutar_consulta_simple($sql);
            if ($dataGustos->rowCount() > 0) {
                $consulta = "UPDATE `clienteusuario` SET `cu_primeraVez` = 'No' WHERE `clienteusuario`.`idClienteUsuario` = '$idCliente'";
                if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
                    $_SESSION['SRM_primeraVez'] = "No";
                    session_unset();
                    session_destroy();
                ?>
                    <script>
                        window.location.href = "<?php echo SERVERURL ?>login/";
                    </script>
                <?php
                    die();
                }
            }
            $consulta = "INSERT INTO `gustos` 
        (`idGustos`, `idCliente`, `g_Year`, `g_Categoria`, `g_Color`, `g_Cilindrada`, `g_tipoTransmision`, `g_encendidoElectrico`, `g_encendidoManual`, `g_tipoMotor`, `g_tipoFrenoDelantero`, `g_tipoFrenoTrasero`, `g_Peso`, `g_velocidadMaxima`, `g_Aceleracion`, `g_Precio`, `g_totalCalificacion`, `g_totalVistas`, `g_fechaRegistroGusto`) 
        VALUES 
        (NULL, '$idCliente', '$year', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, '$precio', NULL, NULL, current_timestamp())";
            if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
                $consulta = "UPDATE `clienteusuario` SET `cu_primeraVez` = 'No' WHERE `clienteusuario`.`idClienteUsuario` = '$idCliente'";
                if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
                    $_SESSION['SRM_primeraVez'] = "No";
                    session_unset();
                    session_destroy();
                ?>
                    <script>
                        window.location.href = "<?php echo SERVERURL ?>login/";
                    </script>
            <?php
                }
            }
        }
    }

    public function controlador_que_lista_las_motocicletas()
    {
        $consulta = "SELECT * FROM categoria as cat inner join motos as mot on mot.idCategoria=cat.idCategoria  group by mot.idCategoria;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="bg-gray-50 rounded-md border mt-2 p-1">
                <h1 class="text-lg font-semibold text-red-600">' . $row['c_Categoria'] . '</h1>
                <hr>
                <div class="flex overflow-x-auto w-full">
                ';
                $idCategoria = $row['idCategoria'];
                $consulta = "SELECT * FROM `motos` as m left join imagen as i on i.idMotos=m.idMotos where m.idCategoria='$idCategoria'
                group by m.idMotos ORDER BY m.m_fechaRegistro DESC  limit 20 ";
                foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                    if ($row['i_Imagen'] != null) {
                        $img = SERVERURL . 'vistas/assets/motos/' . $row['i_Imagen'];
                        $url = 'href="' . SERVERURL . 'moto/' . mainModel::encryption($row['idMotos']) . '"';
                    } else {
                        $img = SERVERURL . 'vistas/assets/img/sinimagen.jpg';
                        $url = '';
                    }
                    $cadena .= ' <div class="px-2 py-2">
                                    <div class="w-96 sm:w-72 hover:shadow-xl bg-white rounded-lg shadow-md">
                                        <div class="w-full p-1">
                                            <a ' . $url . '>
                                                <img class="w-full" src="' . $img . '" alt="">
                                            </a>
                                        </div>
                                        <div class="px-2 py-2">
                                            <h1 class="text-lg font-bold text-red-500">' . $row['m_Modelo'] . '</h1>
                                            <h5 class="text-sm text-gray-600">' . $row['m_Marca'] . '</h5>
                                            <h6 class="text-right text-base text-red-500 font-bold">' . MONEDA . ' ' . $row['m_Precio'] . '</h6>
                                            <br>
                                            <h6 class="text-xs"><i class="fa fa-eye"></i> <span>' . modelos::modelo_que_lista_las_vistas_de_la_moto($row['idMotos']) . '</span></h6>
                                            <div class="w-full flex justify-between py-2 border-t mt-2">
                                                <div class="py-1">
                                                    <p class="text-xs text-gray-500">Comparte o reacciona</p>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <div class="px-1">
                                                        <button class="text-lg text-blue-500"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="px-1">
                                                        <button class="text-lg text-blue-600"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="px-1">
                                                        <button class="text-lg text-sky-500"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="px-1">
                                                        <button class="text-lg text-green-500"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                                                    </div>
                                                    &nbsp;|
                                                    <div class="px-1 text-center">
                                                        <button class="text-lg text-red-500"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                                                       <p class="text-xs text-red-500 font-semibold"> ' . self::controlador_que_obtiene_total_calificacion($row['idMotos']) . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                }
                $cadena .= '</div>
            </div>';
            }
            return $cadena;
        } else {
            return "<h1 class='text-center text-xl text-red-500'>No existen motos publicadas en el sistema</h1>";
        }
    }
    public function controlador_que_lista_motos_mas_vistas()
    {
        $consulta = "SELECT COUNT(v.idMotos) as views, m.idMotos, m.m_Modelo,m.m_Precio,i.i_Imagen FROM vista as v inner join motos as m on m.idMotos=v.idMotos inner join imagen as i on i.idMotos=m.idMotos group by m.idMotos order by views DESC limit 4;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="shadow-lg border-b rounded-md flex border py-2">
               
                <div class="w-60 p-1">
                <a href="' . SERVERURL . 'moto/' . mainModel::encryption($row['idMotos']) . '" >
                    <img class="" src="' . SERVERURL . 'vistas/assets/motos/' . $row['i_Imagen'] . '" alt="" srcset="">
                    </a>
                    </div>
               
                <div class="w-full">
                    <p class="font-semibold text-sm text-gray-400">Precio al contado</p>
                    <p class="font-semibold text-red-500 text-lg">' . $row['m_Precio'] . ' ' . MONEDA . '</p>
                    <h1 class="text-sm font-bold text-gray-600">' . $row['m_Modelo'] . '</h1>
                    <div class="flex justify-end px-2">
                        <span class="text-xs font-semibold text-gray-500"><i class="fa fa-eye" aria-hidden="true"></i>' . mainModel::number_format_short($row['views']) . '</span>
                    </div>
                </div>
            </div>';
            }
            return $cadena;
        }
    }
    public function controlador_que_lista_motos_buscadas($search)
    {
        $consulta = "SELECT * FROM motos as m
        inner join imagen as i on i.idMotos=m.idMotos
        where m.m_Modelo like '%$search%' or m.m_Year like '%$search%'  or m.m_Descripcion like '%$search%'
        group by m.idMotos;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="w-full flex bg-white my-2">
                <div class="w-60">
                    <a href="' . SERVERURL . 'moto/' . mainModel::encryption($row['idMotos']) . '">
                        <img loading="lazy" class="w-full" src="' . SERVERURL . 'vistas/assets/motos/' . $row['i_Imagen'] . '" alt="">
                    </a>
                </div>
                <div>
                    <h1 class="text-lg font-semibold">
                        ' . $row['m_Modelo'] . '
                    </h1>
                    <h4 class="text-base text-red-600">' . $row['m_Precio'] . ' ' . MONEDA . '</h4>
                </div>
            </div>';
            }
            return $cadena;
        } else {
            ?>
            <h1>Busqueda vacia intentalo otra ves</h1>
            <?php
        }
    }
    public function controlador_para_combo_de_color()
    {
        $consulta = "SELECT * FROM `color` ORDER BY `color`.`c_Color` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= "<option value='" . $row['idColor'] . "' >" . $row['c_Color'] . "</option>";
            }
            return $cadena;
        }
    }
    public function controlador_que_registra_al_cliente()
    {
        $nombreCliente = mainModel::limpiar_cadena($_POST['nombreCliente']);
        $apelllidosCliente = mainModel::limpiar_cadena($_POST['apelllidosCliente']);
        $emailCliente = mainModel::limpiar_cadena($_POST['emailCliente']);
        $fechaNacimientoCliente = mainModel::limpiar_cadena($_POST['fechaNacimientoCliente']);
        $sexoCliente = mainModel::limpiar_cadena($_POST['sexoCliente']);
        $estadoCivilCliente = mainModel::limpiar_cadena($_POST['estadoCivilCliente']);
        $usuarioCliente = mainModel::limpiar_cadena($_POST['usuarioCliente']);
        $passwordCliente = mainModel::limpiar_cadena($_POST['passwordCliente']);
        $consulta = "INSERT INTO `persona` 
        (`idPersona`, `p_Nombres`, `p_Apellidos`, `p_Correo`, `p_fechaNacimiento`, `p_Sexo`, `p_estadoCivil`, `p_fechaRegistro`) 
        VALUES 
        (NULL, '$nombreCliente', '$apelllidosCliente', '$emailCliente', '$fechaNacimientoCliente', '$sexoCliente', '$estadoCivilCliente', current_timestamp())";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $consulta = "SELECT * FROM `persona` as p where p.p_Correo='$emailCliente';";
            $idPersona = mainModel::ejecutar_consulta_simple($consulta)->fetch()['idPersona'];
            $consulta = "INSERT INTO `cliente` 
            (`idCliente`, `idPersona`, `c_fechaRegistro`, `c_Estado`, `c_tipoUso`, `c_Experiencia`) 
            VALUES 
            (NULL, '$idPersona', current_timestamp(), 'activo', '', '')";
            if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
                $idCliente = mainModel::ejecutar_consulta_simple("SELECT * FROM `cliente` as c where c.idPersona='$idPersona';")->fetch()['idCliente'];
                $consulta = "INSERT INTO `clienteusuario`
                (`idClienteUsuario`, `idCliente`, `cu_Usuario`, `cu_Pasword`, `cu_primeraVez`) 
                VALUES 
                (NULL, '$idCliente', '$usuarioCliente', '$passwordCliente', 'Si')";
                if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
                }
            }
        }
    }
    public function controlador_que_lista_la_recomendacion1()
    {
        if (isset($_SESSION['ListN'])) {
            //Se ordena el array
            sort($_SESSION['ListN'], SORT_DESC);
            $cont = 0;
            foreach ($_SESSION['ListN'] as $key => $value) {
                if ($cont > 0) {


            ?>
                    <div class="px-2 py-2">
                        <div class="w-96 sm:w-72 hover:shadow-xl bg-white rounded-lg shadow-md">
                            <div class="w-full p-1">
                                <a href="<?php echo SERVERURL ?>moto/<?php echo mainModel::encryption($value['idMoto']) ?>">
                                    <img class="w-full" src="<?php echo SERVERURL ?>vistas/assets/motos/<?php echo $value['Imagen'] ?>" alt="">
                                </a>
                            </div>
                            <div class="px-2 py-2">
                                <h1 class="text-lg font-bold text-red-500"><?php echo $value['Modelo'] ?></h1>
                                <h5 class="text-sm text-gray-600">Honda</h5>

                                <h6 class="text-right text-base text-red-500 font-bold"><?php echo MONEDA . " " . $value['Precio'] ?></h6>
                                <div class="w-full flex justify-between py-2 border-t mt-2">
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Comparte o reacciona</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <div class="px-1">
                                            <button class="text-lg text-blue-500"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-blue-600"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-sky-500"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="px-1">
                                            <button class="text-lg text-green-500"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                                        </div>
                                        &nbsp;|
                                        <div class="px-1">
                                            <button class="text-lg text-red-500"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
                }
                $cont++;
            }
        }
        unset($_SESSION['ListN']);
    }
}
