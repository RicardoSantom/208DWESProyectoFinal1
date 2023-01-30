<?php
//Fichero con constantes para conexión a base de datos
require_once 'conf/confDBPDO.php';
/**
 * Description of DBPDO
 * Función en la que se implementa el método abstracto declarado en la interface DB *
 * @author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
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
            /*Investigar porqué no funciona guardar la página en curso como página anterior
             * $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
             * 
             */
//Si hay errores nos informa con un mensaje
// $_SESSION['error']= $excepcion->getMessage();
//$_SESSION['paginaEnCurso'] = 'error';
//Y nos devuelve al index
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