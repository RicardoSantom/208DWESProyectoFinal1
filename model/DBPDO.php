<?php

//Inclusión de fichero con constantes para conexión a base de datos
require_once 'conf/confDBPDO.php';

/**
 * Description of DBPDO
 * Función en la que se implementa el método abstracto declarado en la interface DB 
 * @author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
 * @since 25/01/2023
 * @version 0.1
 */
class DBPDO implements DB {

    /**
     * @author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
     * @return Object $oResultado Guarda el resultado de la ejecución y resultado
     * recogio por una sentencia mysql.
     * @param String $sentenciaSQL Sentencia en lenguaje SQL
     * @param  $parametros  Lista de parámetros para sacar datos de la DB
     */
    public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
        try {
// Conexión con la base de datos.
            $DB208DWESLoginLogoff = new PDO(DSN, USER, PASSWORD);
// Preparación de la consulta.
            $oResultado = $DB208DWESLoginLogoff->prepare($sentenciaSQL);
//Ejecución de consulta con parámetros facilitados a la función.
            $oResultado->execute($parametros);
//Devolución del resultado de la consulta
            return $oResultado;
        } catch (PDOException $excepcion) {
            /* Si hay errores construye un objeto ErrorApp y lo guarda en la sesión junto
             * con la página anterior(inicioPrivado) a la que navegará para mostrar los errores.
             */
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(),
                    $excepcion->getFile(), $excepcion->getLine(), $_SESSION['paginaAnterior']);
            //Navegación hasta página de error para ver los mensajes de errores.
            $_SESSION['paginaEnCurso'] = 'error';
            header('Location: index.php');
            exit();
        } finally {
//Cerrado base de datos
            unset($DB208DWESLoginLogoff);
        }
    }

    public function altaUsuario() {
        
    }

    public function modificarUsuario() {
        
    }

    public function borrarUsuario() {
        
    }

    public function validarCodNoExiste() {
        
    }

}

?>