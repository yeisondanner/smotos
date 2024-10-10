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
        $consulta = "SELECT * FROM `motos` ORDER BY `motos`.`m_fechaRegistro` DESC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="p-1">
                <div class="border rounded-lg px-2 bg-white p-2
                                        hover:shadow-lg">
                    <a href="">
                        <div class="flex justify-center">
                            <img loading="lazy" src="informatica.png" alt="" class="h-32" srcset="informatica.png">
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
        $consulta = "SELECT * FROM `motos` ORDER BY `motos`.`m_fechaRegistro` DESC";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $cadena = "";
            foreach (mainModel::ejecutar_consulta_simple($consulta)->fetchAll() as $row) {
                $cadena .= '<div class="p-1">
                <div class="border rounded-lg px-2 bg-white p-2
                                        hover:shadow-lg">
                    <a href="">
                        <div class="flex justify-center">
                            <img loading="lazy" src="informatica.png" alt="" class="h-32" srcset="informatica.png">
                        </div>
                        <div class="text-center">
                            <h1 class="font-bold text-lg">' . $row['m_Modelo'] . '</h1>
                            <h6 class="text-xs">' . $row['m_fechaRegistro'] . '</h6>
                        </div>
                        <form class="flex justify py-2">
                        <button type="submit" class="bg-red-600 px-2 rounded-lg text-white font-semibold"> Desactivar </button> 
                        &nbsp;    
                        <a href="' . SERVERURL . 'image-upload/' . $row['idMotos'] . '" class="bg-cyan-600 px-2 rounded-lg text-white">Agregar Imagen</a>         
                        </form>
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
        $nameFinal=$carpeta.$name_Foto ;
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
            }else{
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
}
