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
     * @return array $aDepartamentos Array con objetos departamento
     */
    public static function buscaDepartamentosPorDesc($descDepartamento) {
        //Array para guardar objetos de tipo Departamento
        $aDepartamentos = [];
        /* Sentencia SQL con la descripción recibida para buscar las que coincidan
         * con la descripcion recibida
         */
        $sSentenciaSQLSeleccion = "select * from T02_Departamento where T02_DescDepartamento like'%{$descDepartamento}%';";
        //Objeto para guardar lo devuelto por el método que ejecuta la sentencia SQL
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLSeleccion);
        /* $oResultadoConsulta En esta variable se guardaran las distintas instancias construidas
         * con las tuplas devueltas desde la DB
         */
        $oResultadoConsulta = $oPDOStatementResultadoConsulta->fetchObject();
        //Mientras se devuelva un objeto
        while ($oResultadoConsulta != null) {
            /*
             * Se instanciará un objeto Departamento con los valores de los
             * diferentes campos presentes en su tupla.
             */
            $oDepartamentoEnCurso = new Departamento(
                    $oResultadoConsulta->T02_CodDepartamento,
                    $oResultadoConsulta->T02_DescDepartamento,
                    $oResultadoConsulta->T02_FechaCreacionDepartamento,
                    $oResultadoConsulta->T02_VolumenNegocio,
                    $oResultadoConsulta->T02_FechaBajaDepartamento
            );
            //Inserción de cada objeto instanciado en un array de departamentos
            array_push($aDepartamentos, $oDepartamentoEnCurso);
            //Antes de salir del bucle se busca si hay más objetos, si no los
            // hubiera, se pararía la ejecución del bucle while.
            $oResultadoConsulta = $oPDOStatementResultadoConsulta->fetchObject();
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
     * instanciar o falso si no.
     */
    public static function buscarDepartamentoPorCod($codigoDepartamento) {
        $sSentenciaSQLSeleccion = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento like'%{$codigoDepartamento}%';";
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLSeleccion);
        $oResultadoConsulta = $oPDOStatementResultadoConsulta->fetchObject();

        if ($oResultadoConsulta) {
            return new Departamento($oResultadoConsulta->T02_CodDepartamento, $oResultadoConsulta->T02_DescDepartamento,
                    $oResultadoConsulta->T02_FechaCreacionDepartamento, $oResultadoConsulta->T02_VolumenNegocio, $oResultadoConsulta->T02_FechaBajaDepartamento);
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
     * @param string $codDepartamento Código del departamento a buscar
     * @return PDOStatement Resultado del borrado.
     */
    public static function bajaFisicaDepartamento($codDepartamento) {
        $sSentenciaSQLBorrado = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}';";
        return DBPDO::ejecutarConsulta($sSentenciaSQLBorrado);
    }

    /**
     * Summary Función estática que modifica un departamento.
     * 
     * Description Esta función recibe dos cadenas de caracteres y un valor numérico,
     * con ellos construye una sentencia SQL de actualización y modifica el 
     * departamento coincidente con el codigo proporcionado como parámetro.
     * 
     * @param string $codDepartamento código del departamento a modificar, este 
     * valor no se modifica.
     * @param float $volumenNegocio valor flotante a modificar en la tupla devuelta de la DB
     * @param string $descDepartamento cadena de caracteres a modificar en la tupla devuelta de la DB
     * @return PDOStatement $oPDOStatementResultadoConsulta Objeto con el valor devuelto 
     * tras la ejecución de la consulta SQL.
     */
    public static function modificarDepartamento($codDepartamento, $volumenNegocio, $descDepartamento) {
        $sSentenciaSQLActualizacion = <<< QUERY
                    UPDATE T02_Departamento SET T02_DescDepartamento='$descDepartamento',
                    T02_VolumenNegocio='$volumenNegocio' where T02_CodDepartamento='$codDepartamento';
                QUERY;
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLActualizacion);
        return $oPDOStatementResultadoConsulta;
    }

    /**
     * Summary Función estática que da de alta un departamento.
     * 
     * Description Función estática que recibe 3 parámetros y los añade como campos
     * de datos en la BD para el nuevo departamento.
     * 
     * @param string $codDepartamento Código del nuevo departamento.
     * @param string $descDepartamento Descripción del nuevo departamento.
     * @param float $volumenNegocio Volumen de negocio del nuevo departamento.
     * @return PDOStatement Resultado de la insercíón.
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio) {
        $sSentenciaSQLInsercion = <<<QUERY
                    INSERT INTO T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
                    values("$codDepartamento","$descDepartamento",now(),$volumenNegocio);
                QUERY;
        if (self::validarCodNoExiste($codDepartamento)) {
            return DBPDO::ejecutarConsulta($sSentenciaSQLInsercion);
        }
    }

    /**
     * Summary Baja lógica de un departamento.
     * 
     * Description Función estática que registra la fecha de baja de un departamento.
     * No borra la tupla, solo añade la fecha de ejecución de esta función.
     * 
     * @param string $codDepartamento Código del departamento del que registraremos
     * su fecha de baja lógica.
     * @return PDOStatement Resultado de la actualización.
     */
    public static function bajaLogicaDepartamento($codDepartamento) {
        $sSQLActualizacion = <<<QUERY
                    UPDATE T02_Departamento SET T02_FechaBajaDepartamento = now()
                    WHERE T02_CodDepartamento= '{$codDepartamento}';
                QUERY;

        return DBPDO::ejecutarConsulta($sSQLActualizacion);
    }

    public static function rehabilitarDepartamento($codDepartamento) {
        $sSQLActualizacion = <<<QUERY
                    UPDATE T02_Departamento SET T02_FechaBajaDepartamento = null
                    WHERE T02_CodDepartamento= '{$codDepartamento}';
                QUERY;

        return DBPDO::ejecutarConsulta($sSQLActualizacion);
    }

    public static function validarCodNoExiste($codDepartamento) {
        $codigoNoExiste = true;
        $sSentenciaSQLValidarCodigo = <<< query
                select * from T01_Usuario where T01_CodUsuario="{$codUsuario}";
                query;
        $oResultado = DBPDO::ejecutarConsulta($sSentenciaSQLValidarCodigo);
        if (!$oResultado) {
            $codigoNoExiste = false;
        }
        return $codigoNoExiste;
    }

    public static function contarDepartamentos() {
        
    }

}
