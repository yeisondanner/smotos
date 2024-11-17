<?php
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
                $_SESSION['SRM_idTrabajador'] = $row['idTrabajador'];
                $_SESSION['SRM_Nombres'] = $row['p_Nombres'];
                $_SESSION['SRM_Usuario'] = $row['ut_Usuario'];
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
    //Inicio Combos
    public function controlador_del_combo_categoria()
    {
        $consulta = "SELECT * FROM `categoria` ORDER BY `categoria`.`c_Categoria` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<option value="' . $row['idCategoria'] . '" >' . $row['c_Categoria'] . '</option>';
            }
            return $cadena;
        }
    }
    public function controlador_del_combo_color()
    {
        $consulta = "SELECT * FROM `color` ORDER BY `color`.`c_Color` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<option value="' . $row['idColor'] . '" >' . $row['c_Color'] . '</option>';
            }
            return $cadena;
        }
    }
    public function controlador_del_combo_tipotransmision()
    {
        $consulta = "SELECT * FROM `tipotransmision` ORDER BY `tipotransmision`.`tt_tipoTransmicion` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<option value="' . $row['idTipoTransmision'] . '" >' . $row['tt_tipoTransmicion'] . '</option>';
            }
            return $cadena;
        }
    }
    public function controlador_del_combo_tipomotor()
    {
        $consulta = "SELECT * FROM `tipomotor` ORDER BY `tipomotor`.`tm_tipoMotor` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<option value="' . $row['idTipoMotor'] . '" >' . $row['tm_tipoMotor'] . '</option>';
            }
            return $cadena;
        }
    }
    public function controlador_del_combo_tipofreno()
    {
        $consulta = "SELECT * FROM `tipofreno` ORDER BY `tipofreno`.`tf_tipoFreno` ASC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = '';
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<option value="' . $row['idTipoFreno'] . '" >' . $row['tf_tipoFreno'] . '</option>';
            }
            return $cadena;
        }
    }
    //Fin combos

    public function controlador_que_registra_el_vehiculo()
    {
        $m_Modelo = mainModel::limpiar_cadena($_POST['newModelo']);
        $m_Year = mainModel::limpiar_cadena($_POST['newAño']);
        $m_Marca = mainModel::limpiar_cadena($_POST['newMarca']);
        $idCategoria = mainModel::limpiar_cadena($_POST['newCategoria']);
        $idColor = mainModel::limpiar_cadena($_POST['newColor']);
        $m_Cilindrada = mainModel::limpiar_cadena($_POST['newCilindrada']);
        $idTipoTransmision = mainModel::limpiar_cadena($_POST['newTipoTrnasmision']);
        $m_encendidoElectrico = mainModel::limpiar_cadena($_POST['newElectrico']);
        $m_encendidoManual = mainModel::limpiar_cadena($_POST['newManual']);
        $idTipoMotor = mainModel::limpiar_cadena($_POST['newTipoMotor']);
        $idTipoFrenoDelantero = mainModel::limpiar_cadena($_POST['newDelantero']);
        $idTipoFrenoTrasero = mainModel::limpiar_cadena($_POST['newTrasero']);
        $m_Peso = mainModel::limpiar_cadena($_POST['newPeso']);
        $m_Estado = mainModel::limpiar_cadena($_POST['newEstado']);
        $m_velocidadMaxima = mainModel::limpiar_cadena($_POST['newVelocidad']);
        $m_Aceleracion = mainModel::limpiar_cadena($_POST['newAceleracion']);
        $m_Precio = mainModel::limpiar_cadena($_POST['newPrecio']);
        $m_Descripcion = mainModel::limpiar_cadena($_POST['newDescripcion']);
        $idTrabajador = mainModel::limpiar_cadena($_POST['idTrabajador']);
        if (modelos::modelo_que_registra_el_vehiculo(
            $m_Modelo,
            $m_Year,
            $m_Marca,
            $idCategoria,
            $idColor,
            $m_Cilindrada,
            $idTipoTransmision,
            $m_encendidoElectrico,
            $m_encendidoManual,
            $idTipoMotor,
            $idTipoFrenoDelantero,
            $idTipoFrenoTrasero,
            $m_Peso,
            $m_Estado,
            $m_velocidadMaxima,
            $m_Aceleracion,
            $idTrabajador,
            $m_Precio,
            $m_Descripcion
        )->rowCount() > 0) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Registro Completado",
                "Texto" => "Se registro correctamente el vehiculos",
                "Tipo" => "success",
                "Icon" => "success"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Error de Registro",
                "Texto" => "No se pudo registrar el vehiculo",
                "Tipo" => "error",
                "Icon" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
    }
    public function controlador_que_lista_motos()
    {
        $consulta = "SELECT * FROM `motos` AS m
        INNER JOIN imagen AS i ON i.idMotos=m.idMotos 
        GROUP BY m.idMotos ORDER BY m.`m_fechaRegistro` DESC;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="p-1">
                <div class="border rounded-lg px-2 bg-white p-2
                                        hover:shadow-lg">
                    <a href="">
                        <div class="flex justify-center">
                            <img loading="lazy" src="' . SERVERURL_PWEB . 'vistas/assets/motos/' . $row['i_Imagen'] . '" alt="" class="h-32" >
                        </div>
                        <div class="text-center">
                            <h1 class="font-bold text-lg">' . $row['m_Modelo'] . '</h1>
                            <h6 class="text-xs">' . $row['m_fechaRegistro'] . '</h6>
                        </div>
                    </a>
                </div>
            </div>';
            }
            return $cadena;
        }
    }
    public function controlador_que_lista_motos_registradas()
    {
        $consulta = "SELECT m.*,i.i_Imagen FROM `motos` AS m 
        LEFT JOIN imagen AS i ON i.idMotos=m.idMotos
        GROUP BY m.idMotos ORDER BY m.`m_fechaRegistro` DESC ;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="p-1 hover:shadow-lg rounded-lg card-motos">
                <div class="border rounded-lg px-2 bg-white p-2
                                        hover:shadow-lg">
                    <a href="">
                        <div class="flex justify-center">
                            <img loading="lazy" src="' . SERVERURL_PWEB . 'vistas/assets/motos/' . $row['i_Imagen'] . '" alt="' . $row['m_Modelo'] . '" class="h-32">
                        </div>
                        <div class="text-center">
                            <h1 class="font-bold text-lg">' . $row['m_Modelo'] . '</h1>
                            <h6 class="text-xs">' . $row['m_fechaRegistro'] . '</h6>
                            <h6 class="text-xs">' . $row['m_Estado'] . '</h6>
                        </div>
                        <div class="flex py-2 btn-group">
                        <button type="button"  class="bg-red-600 px-2 rounded-lg text-white font-semibold btn-delete" data-status="' . $row['m_Estado'] . '" data-id="' . $row['idMotos'] . '"><i class="fa fa-toggle-on"></i></button> 
                        &nbsp;    
                        <a href="' . SERVERURL . 'image-upload/' . $row['idMotos'] . '"  class="bg-cyan-600 px-2 rounded-lg text-white"><i class="fa fa-image"></i></a>         
                        <a href=""  data-id="' . $row['idMotos'] . '" 
                                    data-modelo="' . $row['m_Modelo'] . '" 
                                    data-year="' . $row['m_Year'] . '" 
                                    data-marca="' . $row['m_Marca'] . '" 
                                    data-idCateregoria="' . $row['idCategoria'] . '"
                                    data-idColor="' . $row['idColor'] . '"
                                    data-Cilindrada="' . $row['m_Cilindrada'] . '"
                                    data-idTipoTransmision="' . $row['idTipoTransmision'] . '"
                                    data-encendidoElectrico="' . $row['m_encendidoElectrico'] . '"
                                    data-encendidoManual="' . $row['m_encendidoManual'] . '"
                                    data-idTipoMotor="' . $row['idTipoMotor'] . '"
                                    data-idTipoFrenoDelantero="' . $row['idTipoFrenoDelantero'] . '"
                                    data-idTipoFrenoTrasero="' . $row['idTipoFrenoTrasero'] . '"
                                    data-peso="' . $row['m_Peso'] . '"
                                    data-velocidadMaxima="' . $row['m_velocidadMaxima'] . '"
                                    data-aceleracion="' . $row['m_Aceleracion'] . '"
                                    data-precio="' . $row['m_Precio'] . '" 
                                    data-descripcion="' . $row['m_Descripcion'] . '" 
                                    class="bg-cyan-600 px-2 rounded-lg text-white btn-open-edit-modal"><i class="fa fa-edit"></i></a>         
                        </div>
                    </a>
                </div>
            </div>';
            }
            return $cadena;
        }
    }
    public function controlador_que_registra_imagenes()
    {
        $idMoto = mainModel::limpiar_cadena($_POST['idMotoIMG']);
        $name_Foto = $_FILES['imagenMT']["name"];
        $carpeta = "MOTO_" . $idMoto . "/";
        $nameFinal = $carpeta . $name_Foto;
        $consulta = "INSERT INTO `imagen` (`idImagen`, `idMotos`, `i_Imagen`) VALUES (NULL, '$idMoto', '$nameFinal')";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {

            $ruta = "../../webmotos/vistas/assets/motos/" . $carpeta;
            $archivo = $ruta . $_FILES['imagenMT']['name'];
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
            $resultado = @move_uploaded_file($_FILES['imagenMT']['tmp_name'], $archivo);
            if ($resultado) {
                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Satisfactorio",
                    "Texto" => "Imagen de la moto registrado",
                    "Tipo" => "success"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Error",
                    "Texto" => "Imagen de la moto no se ha registrado",
                    "Tipo" => "error"
                ];
            }

            echo json_encode($alerta);
        }
    }
    public function controlador_actualiza_estadoo_moto()
    {
        $idMoto = mainModel::limpiar_cadena($_POST['idMoto']);
        $estado = mainModel::limpiar_cadena($_POST['status']);
        if ($estado == "activo") {
            $estado = "inactivo";
        } else {
            $estado = "activo";
        }
        $consulta = "UPDATE `motos` SET `m_estado` = '$estado' WHERE `motos`.`idMotos` = '$idMoto'";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Satisfactorio",
                "Texto" => "Estado de la moto actualizado",
                "Tipo" => "success",
                "status" => true
            ];
            echo json_encode($alerta);
        }
    }
    public function controlador_actualiza_moto()
    {
        /**
         * Recibir los datos del formulario
         * Aqui se muestra los datos del formulario 
         * Array ( [txtIdMoto] => 25 
         * [txtModelo] => Moto del enano maricon 
         * [txtYear] => 2026 
         * [txtMarca] => Hondad 
         * [slctCategoria] => 7 
         * [slctColor] => 7 
         * [txtCilindrada] => 132 
         * [slctTipoTransmision] => 4 
         * [slctEncendidoElectrico] => 0 
         * [slctEncendidoManual] => 0 
         * [slctTipoMotor] => 10 
         * [scltFrenoD] => 2 
         * [scltFrenoT] => 12 
         * [txtPeso] => 32 
         * [txtAceleracion] => 2 
         * [txtPrecio] => 22 
         * [txtDescripcion] => moto para enanos )
         * donde los que estan en corchetes son los inputs del formulario
         */
        $txtIdMoto = $_POST['txtIdMoto'];
        $txtModelo = $_POST['txtModelo'];
        $txtYear = $_POST['txtYear'];
        $txtMarca = $_POST['txtMarca'];
        $slctCategoria = $_POST['slctCategoria'];
        $slctColor = $_POST['slctColor'];
        $txtCilindrada = $_POST['txtCilindrada'];
        $slctTipoTransmision = $_POST['slctTipoTransmision'];
        $slctEncendidoElectrico = $_POST['slctEncendidoElectrico'];
        $slctEncendidoManual = $_POST['slctEncendidoManual'];
        $slctTipoMotor = $_POST['slctTipoMotor'];
        $slctFrenoD = $_POST['scltFrenoD'];
        $slctFrenoT = $_POST['scltFrenoT'];
        $txtPeso = $_POST['txtPeso'];
        $txtAceleracion = $_POST['txtAceleracion'];
        $txtPrecio = $_POST['txtPrecio'];
        $txtDescripcion = $_POST['txtDescripcion'];
        /*
         *Aqui se envia la consulta a la base de datos para actuualizar los datos
         * Aqui se envia un ejemplo de la consulta
         * UPDATE `db_motos`.`motos` SET `m_Cilindrada`=11, `idTipoTransmision`=1, `idTipoMotor`=15, `idTipoFrenoDelantero`=1, `idTipoFrenoTrasero`=1, `m_Peso`=1, `m_Aceleracion`=1, `m_Precio`=1, `m_Descripcion`='1' WHERE  `idMotos`=25;
         * consulta completa
         * UPDATE `motos` SET `m_Modelo`='Moto del enano maricon', `m_Year`=2026, `m_Marca`='Hondad', `idCategoria`=7, `idColor`=7, `m_Cilindrada`=132, `idTipoTransmision`=4, `idTipoEncendidoElectrico`=0, `idTipoEncendidoManual`=0, `idTipoMotor`=10, `idTipoFrenoDelantero`=2, `idTipoFrenoTrasero`=12, `m_Peso`=32, `m_Aceleracion`=2, `m_Precio`=22, `m_Descripcion`='moto para enanos' WHERE  `idMotos`=25;
         */
        $consulta = "UPDATE `motos` 
        SET 
        `m_Modelo`='$txtModelo',
        `m_Year`='$txtYear',
        `m_Marca`='$txtMarca',
        `idCategoria`=$slctCategoria,
        `idColor`=$slctColor,
        `m_Cilindrada`=$txtCilindrada,
        `idTipoTransmision`=$slctTipoTransmision,
        `m_encendidoElectrico`=$slctEncendidoElectrico,
        `m_encendidoManual`=$slctEncendidoManual,
        `idTipoMotor`=$slctTipoMotor,
        `idTipoFrenoDelantero`=$slctFrenoD,
        `idTipoFrenoTrasero`=$slctFrenoT,
        `m_Peso`=$txtPeso,
        `m_Aceleracion`=$txtAceleracion,
        `m_Precio`=$txtPrecio,
        `m_Descripcion`='$txtDescripcion' 
        WHERE  
        `idMotos`=$txtIdMoto";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Satisfactorio",
                "Texto" => "Moto actualizado",
                "Tipo" => "success",
                "status" => true
            ];
            echo json_encode($alerta);
        }
    }
}
