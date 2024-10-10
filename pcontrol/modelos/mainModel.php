<?php
if ($peticionAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}

class mainModel
{


    protected static function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    /**Funcion para conectar a la base de datos */
    protected static function conectar()
    {
        /**Conexion por PDO */
        try {
            $conexion = new PDO(SGBD, USER, PASS);
            return $conexion;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
    /**Funcion de crear rutas */
    protected static function crear_ruta($ruta)
    {
        if (!file_exists($ruta)) {
            mkdir($ruta);
        }
    }
    /**Funcion para obtener el dia con mysql */
    protected static function obtener_dia_modelo($date)
    {
        $fecha = $date;
        $fechats = strtotime($fecha); //a timestamp        
        //el parametro w en la funcion date indica que queremos el dia de la semana
        //lo devuelve en numero 0 domingo, 1 lunes,....
        switch (date('w', $fechats)) {
            case 0:
                return "Domingo";
                break;
            case 1:
                return "Lunes";
                break;
            case 2:
                return "Martes";
                break;
            case 3:
                return "Miercoles";
                break;
            case 4:
                return "Jueves";
                break;
            case 5:
                return "Viernes";
                break;
            case 6:
                return "Sabado";
                break;
        }
    }
    /** */
    /**Funcion para ejecutar consultas simples */
    protected static function ejecutar_consulta_simple($consulta)
    {
        try {
            $prepared = self::conectar()->prepare($consulta);
            $prepared->execute();
            return $prepared;
        } catch (Exception $th) {
            return "Ocurrio un error inesperado " + $th;
        }
    }

    /**Encriptar texto plano ah hash*/
    public function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    /**Desencripta de hash a texto plano */
    protected static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    /**Funcion para generar codigos aleatorios  */
    protected static function generar_codigo_aleatorio($letra, $longitud, $numero)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $aleatorio = rand(0, 9);
            $letra .= $aleatorio;
        }
        return $letra .= "-" . $numero;
    }
    /**Fin Funcion */
    /**
     * FuncionGenerarCodigo de recuperacion
     */
    protected static function generar_codigo_6digit()
    {
        $num = rand(100000, 999999);

        return $num;
    }
    /**Funcion para limpiarcadenas */
    protected static function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script type=", "", $cadena);
        $cadena = str_ireplace("select * from", "", $cadena);
        $cadena = str_ireplace("Select*From", "", $cadena);
        $cadena = str_ireplace("select*from", "", $cadena);
        $cadena = str_ireplace("';", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        $cadena = str_ireplace("delete from", "", $cadena);
        $cadena = str_ireplace("insert into", "", $cadena);
        $cadena = str_ireplace("drop table", "", $cadena);
        $cadena = str_ireplace("DROP", "", $cadena);
        $cadena = str_ireplace("DATABASE", "", $cadena);
        $cadena = str_ireplace("database", "", $cadena);
        $cadena = str_ireplace("drop Table", "", $cadena);
        $cadena = str_ireplace("DROP TABLE", "", $cadena);
        $cadena = str_ireplace("drop database", "", $cadena);
        $cadena = str_ireplace("truncate table", "", $cadena);
        $cadena = str_ireplace("show tables", "", $cadena);
        $cadena = str_ireplace("show databases", "", $cadena);
        $cadena = str_ireplace("<?php", "", $cadena);
        $cadena = str_ireplace("?>", "", $cadena);
        $cadena = str_ireplace("__", "", $cadena);
        $cadena = str_ireplace(">", "", $cadena);
        $cadena = str_ireplace("<", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(" ;", "", $cadena);
        $cadena = str_ireplace("::", "", $cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        return $cadena;
    }
    /**Funcion verificar datos*/

    protected static function verificar_datos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    /**Funcion verificar fechas */
    protected static function verficar_fecha($fecha)
    {
        $valores = explode("-", $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Función que convierte un valor numérico en una abreviatura exacta
     */
    protected static function number_format_short($n, $precision = 1)
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
        // Remover ceros innecesarios despues del decimal. "1.0" -> "1"; "1.00" -> "1"
        // pero intencionalmente no afecta parciales, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }
}
