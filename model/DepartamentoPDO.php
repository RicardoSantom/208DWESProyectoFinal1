<?php

/**
 * Summary Clase implementa los métodos para trabajar con departamentos.
 * 
 * Description of DepartamentoPDO Contiene métodos para buscar,actulizar,
 * borrar y añadir departamentos.
 *
 * @author Ricardo Santiago Tomé
 * @version 0.2
 * @since 12/2022
 * @link https://github.com/RicardoSantom/208DWESProyectoFinal1/blob/master/model/DepartamentoPDO.php Repositorio en Github
 */
class DepartamentoPDO {

    /**
     * Summary función estática que realiza una busqueda por departamento en la DB
     * 
     * Description Esta función recibe un parámetro y busca un departamento que
     * contenga este parámetro en la base de datos.
     * 
     * @param string $descDepartamento descripción del departamento a buscar
     * @return array Array con objetos departamento
     */
    public static function buscaDepartamentosPorDesc($descDepartamento) {
        //Array para guardar objetos de tipo Departamento
        $aDepartamentos = [];
        /*Sentencia SQL con la descripción recibida para buscar las que coincidan
         * con la descripcion recibida
        */
        $sSentenciaSQLSelect = "select * from T02_Departamento where T02_DescDepartamento like'%{$descDepartamento}%';";
        //Objeto para guardar lo devuelto por el método que ejecuta la sentencia SQL
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLSelect);
        /*$oResultado En esta variable se guardaran las distintas instancias construidas
         * con las tuplas devueltas desde la DB
         */
        $oResultado = $oPDOStatementResultadoConsulta->fetchObject();
        //Mientras se devuelva un objeto
        while ($oResultado != null) {
            /*
             * Se instanciará un objeto Departamento con los valores de los
             * diferentes campos presentes en su tupla.
             */
            $oDepartamento = new Departamento(
                    $oResultado->T02_CodDepartamento,
                    $oResultado->T02_DescDepartamento,
                    $oResultado->T02_FechaCreacionDepartamento,
                    $oResultado->T02_VolumenNegocio,
                    $oResultado->T02_FechaBajaDepartamento
            );
            //Inserción de cada objeto instanciado en un array de departamentos
            array_push($aDepartamentos, $oDepartamento);
            //Antes de salir del bucle se busca si hay más objetos, si no los
            // hubiera, se pararía la ejecución del bucle while.
            $oResultado = $oPDOStatementResultadoConsulta->fetchObject();
        }
        return $aDepartamentos;
    }

    /**
     * Summary Función estática que busca un departamento que coincida con el parámetro recibido.
     * 
     * Description Esta función recibe una cadena de caracteres como parámetro,
     * realiza una consulta a la DB para encontrar un departamento cuyo valor coincida
     * con el parámetro recibido e intancia y devuelve un objeto de tipo Departamento
     * con los datos en el guardados en la base de datos.
     * 
     * @param string $codigoDepartamento Cadena de caracteres con el código de departamento a buscar
     * @return boolean|\Departamento Devuelve un objeto departamento si lo ha podido
     * instanciar o falso.
     */
    public static function buscarDepartamentoPorCod($codigoDepartamento) {
        $sSelect = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento like'%{$codigoDepartamento}%';";
        $oResultado = DBPDO::ejecutarConsulta($sSelect);
        $oDatos = $oResultado->fetchObject();

        if ($oDatos) {
            return new Departamento($oDatos->T02_CodDepartamento, $oDatos->T02_DescDepartamento,
                    $oDatos->T02_FechaCreacionDepartamento, $oDatos->T02_VolumenNegocio, $oDatos->T02_FechaBajaDepartamento);
        } else {
            return false;
        }
    }

    /**
     * Summary Función estática que borra una tupla de datos de un departamento
     * 
     * Description Esta función recibe un código de departamento, construye con el
     * una sentencia SQL de borrado de la tupla que tenga este código de departamento
     * como valor y le pasa esta sentencia al método ejecutarConsulta de la clase
     * DBPDO para que ejecute el borrado.
     * 
     * @param string $codDepartamento 
     */
    public static function bajaFisicaDepartamento($codDepartamento) {
        $sSelect = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}';";
        DBPDO::ejecutarConsulta($sSelect);
    }

    /**
     * Summary Función estática que recibe 3 parámetros y llama al método ejecutarConsulta de la clase DBPDO.
     * 
     * Description Esta función recibe dos cadenas de caracteres y un valor numérico,
     * con ellos construye una sentencia SQL de actualización y llama al método 
     * ejecutarConsulta de la clase DBPDO para que realize la actualización en la DB.
     * 
     * @param string $codDepartamento código del departamento a modificar, este 
     * valor no se modifica.
     * @param float $volumenNegocio valor flotante a modificar en la tupla devuelta de la DB
     * @param string $descripcion cadena de caracteres a modificar en la tupla devuelta de la DB
     * @return PDOStatement $oPDOStatementResultadoConsulta Objeto con el valor devuelto 
     * tras la ejecución de la consulta SQL.
     */
    public static function modificarDepartamento($codDepartamento, $volumenNegocio, $descripcion) {
        $modificarDepartamento = <<< QUERY
                    UPDATE T02_Departamento SET T02_DescDepartamento='$descripcion',
                    T02_VolumenNegocio='$volumenNegocio' where T02_CodDepartamento='$codDepartamento';
                QUERY;
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($modificarDepartamento);
        return $oPDOStatementResultadoConsulta;
    }    

    public static function bajaLogicaDepartamento() {
        
    }
    
    public static function altaDepartamento() {
        
    }

    public static function rehabilitaDepartamento() {
        
    }

    public static function contarDepartamentos() {
        
    }

}
