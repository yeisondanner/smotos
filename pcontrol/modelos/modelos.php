<?php
require_once 'mainModel.php';
class modelos extends mainModel
{
    protected static function modelo_que_inicia_session(
        $cu_Usuario,
        $cu_Password
    ) {
        $consulta = "SELECT * FROM usuariotrabajador as ut 
        inner join trabajador as t on t.idTrabajador=ut.idTrabajador
        inner join persona as p on p.idPersona=t.idPersona
        where ut.ut_Usuario=:cu_Usuario and ut.ut_Password=:cu_Password;";
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
    protected static function modelo_que_registra_el_vehiculo(
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
    ) {
        $consulta = "INSERT INTO `motos` 
        (`idMotos`, 
        `m_Modelo`, 
        `m_Year`, 
        `m_Marca`, 
        `idCategoria`, 
        `idColor`, 
        `m_Cilindrada`, 
        `idTipoTransmision`, 
        `m_encendidoElectrico`, 
        `m_encendidoManual`, 
        `idTipoMotor`, 
        `idTipoFrenoDelantero`, 
        `idTipoFrenoTrasero`, 
        `m_Peso`, 
        `m_Estado`, 
        `m_velocidadMaxima`, 
        `m_fechaRegistro`, 
        `m_Aceleracion`, 
        `idTrabajador`, 
        `m_Precio`, 
        `m_Descripcion`) 
        VALUES 
        (NULL, 
        :m_Modelo, 
        :m_Year, 
        :m_Marca, 
        :idCategoria, 
        :idColor, 
        :m_Cilindrada, 
        :idTipoTransmision, 
        :m_encendidoElectrico, 
        :m_encendidoManual, 
        :idTipoMotor, 
        :idTipoFrenoDelantero, 
        :idTipoFrenoTrasero,
        :m_Peso, 
        :m_Estado, 
        :m_velocidadMaxima, 
        current_timestamp(), 
        :m_Aceleracion, 
        :idTrabajador, 
        :m_Precio, 
        :m_Descripcion)";
        try {
            $prepared = mainModel::conectar()->prepare($consulta);
            $prepared->bindParam('m_Modelo', $m_Modelo);
            $prepared->bindParam('m_Year', $m_Year);
            $prepared->bindParam('m_Marca', $m_Marca);
            $prepared->bindParam('idCategoria', $idCategoria);
            $prepared->bindParam('idColor', $idColor);
            $prepared->bindParam('m_Cilindrada', $m_Cilindrada);
            $prepared->bindParam('idTipoTransmision', $idTipoTransmision);
            $prepared->bindParam('m_encendidoElectrico', $m_encendidoElectrico);
            $prepared->bindParam('m_encendidoManual', $m_encendidoManual);
            $prepared->bindParam('idTipoMotor', $idTipoMotor);
            $prepared->bindParam('idTipoFrenoDelantero', $idTipoFrenoDelantero);
            $prepared->bindParam('idTipoFrenoTrasero', $idTipoFrenoTrasero);
            $prepared->bindParam('m_Peso', $m_Peso);
            $prepared->bindParam('m_Estado', $m_Estado);
            $prepared->bindParam('m_velocidadMaxima', $m_velocidadMaxima);
            $prepared->bindParam('m_Aceleracion', $m_Aceleracion);
            $prepared->bindParam('idTrabajador', $idTrabajador);
            $prepared->bindParam('m_Precio', $m_Precio);
            $prepared->bindParam('m_Descripcion', $m_Descripcion);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado ".$th;
        }
    }
}
