<?php
require_once 'mainModel.php';
class modelos extends mainModel
{
    protected static function modelo_que_inicia_session(
        $cu_Usuario,
        $cu_Password
    ) {
        $consulta = "select*from clienteusuario as cu
        inner join cliente as c on c.idCliente=cu.idCliente
        inner join persona as p on p.idPersona=c.idPersona
        where cu.cu_Usuario = :cu_Usuario and cu.cu_Pasword = :cu_Password and c.c_Estado='activo' ;";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam('cu_Usuario', $cu_Usuario);
            $prepared->bindParam('cu_Password', $cu_Password);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado en " . $th;
        }
    }
    protected static function modelo_que_registra_la_vista_del_atractivo_turistico(
        $idCliente,
        $idMotos
    ) {
        $consulta = "INSERT INTO `vista` 
        (`idVista`, `idCliente`, `idMotos`, `v_fechaRegistro`) 
        VALUES 
        (NULL, :idCliente, :idMotos, current_timestamp())";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam('idCliente', $idCliente);
            $prepared->bindParam('idMotos', $idMotos);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado " + $th;
        }
    }
    protected static function modelo_que_lista_las_vistas_de_la_moto($idMoto)
    {
        $consulta = "SELECT count(v.idMotos) as totalview FROM vista as v
        where v.idMotos='$idMoto'
        GROUP BY v.idMotos;";
        if (mainModel::ejecutar_consulta_simple($consulta)->rowCount() > 0) {
            $row = mainModel::ejecutar_consulta_simple($consulta)->fetch();
            return mainModel::number_format_short($row[0]);
        } else {
            return "0";
        }
    }
    protected static function modelo_que_registra_comentarios(
        $idCliente,
        $idMotos,
        $c_Comentarios
    ) {
        $consulta = "INSERT INTO `comentarios` 
        (`idComentarios`, `idCliente`, `idMotos`, `c_Comentarios`, `c_fechaRegistro`) 
        VALUES 
        (NULL, :idCliente, :idMotos, :c_Comentarios, current_timestamp())";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam('idCliente', $idCliente);
            $prepared->bindParam('idMotos', $idMotos);
            $prepared->bindParam('c_Comentarios', $c_Comentarios);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado " + $th;
        }
    }
    protected static function modelo_que_registra_la_calificacion(
        $idCliente,
        $idMotos,
        $c_numeroEstrellas
    ) {
        $consulta = "INSERT INTO `calificacion`
         (`idCalificacion`, `idCliente`, `idMotos`, `c_numeroEstrellas`, `c_fechaRegistro`)
        VALUES
         (NULL, :idCliente, :idMotos, :c_numeroEstrellas, current_timestamp())";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam('idCliente', $idCliente);
            $prepared->bindParam('idMotos', $idMotos);
            $prepared->bindParam('c_numeroEstrellas', $c_numeroEstrellas);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado " + $th;
        }
    }
    protected static function modelo_que_actualiza_la_calificacion(
        $idCliente,
        $idMotos,
        $c_numeroEstrellas
    ) {
        $consulta = "UPDATE `calificacion` as c SET c.`c_numeroEstrellas` = :c_numeroEstrellas 
        WHERE c.idCliente=:idCliente and c.idMotos=:idMotos";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam("idCliente", $idCliente);
            $prepared->bindParam("idMotos", $idMotos);
            $prepared->bindParam("c_numeroEstrellas", $c_numeroEstrellas);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado " + $th;
        }
    }
    protected static function modelo_que_actualiza_los_gustos(
        $g_Year,
        $g_Categoria,
        $g_Color,
        $g_Cilindrada,
        $g_tipoTransmision,
        $g_encendidoElectrico,
        $g_encendidoManual,
        $g_tipoMotor,
        $g_tipoFrenoDelantero,
        $g_tipoFrenoTrasero,
        $g_Peso,
        $g_velocidadMaxima,
        $g_Aceleracion,
        $g_Precio,
        $g_totalCalificacion,
        $g_totalVistas,
        $idGustos
    ) {
        $consulta = "UPDATE `gustos` SET 
        `g_Year` = :g_Year, 
        `g_Categoria` = :g_Categoria, 
        `g_Color` = :g_Color, 
        `g_Cilindrada` = :g_Cilindrada, 
        `g_tipoTransmision` = :g_tipoTransmision, 
        `g_encendidoElectrico` = :g_encendidoElectrico, 
        `g_encendidoManual` = :g_encendidoManual, 
        `g_tipoMotor` = :g_tipoMotor, 
        `g_tipoFrenoDelantero` = :g_tipoFrenoDelantero, 
        `g_tipoFrenoTrasero` = :g_tipoFrenoTrasero, 
        `g_Peso` = :g_Peso, 
        `g_velocidadMaxima` = :g_velocidadMaxima, 
        `g_Aceleracion` = :g_Aceleracion, 
        `g_Precio` = :g_Precio, 
        `g_totalCalificacion` = :g_totalCalificacion, 
        `g_totalVistas` = :g_totalVistas 
        WHERE 
        `gustos`.`idGustos` = :idGustos";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam("g_Year", $g_Year);
            $prepared->bindParam("g_Categoria", $g_Categoria);
            $prepared->bindParam("g_Color", $g_Color);
            $prepared->bindParam("g_Cilindrada", $g_Cilindrada);
            $prepared->bindParam("g_tipoTransmision", $g_tipoTransmision);
            $prepared->bindParam("g_encendidoElectrico", $g_encendidoElectrico);
            $prepared->bindParam("g_encendidoManual", $g_encendidoManual);
            $prepared->bindParam("g_tipoMotor", $g_tipoMotor);
            $prepared->bindParam("g_tipoFrenoDelantero", $g_tipoFrenoDelantero);
            $prepared->bindParam("g_tipoFrenoTrasero", $g_tipoFrenoTrasero);
            $prepared->bindParam("g_Peso", $g_Peso);
            $prepared->bindParam("g_velocidadMaxima", $g_velocidadMaxima);
            $prepared->bindParam("g_Aceleracion", $g_Aceleracion);
            $prepared->bindParam("g_Precio", $g_Precio);
            $prepared->bindParam("g_totalCalificacion", $g_totalCalificacion);
            $prepared->bindParam("g_totalVistas", $g_totalVistas);
            $prepared->bindParam("idGustos", $idGustos);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un erros inesperado " . $th;
        }
    }
}
