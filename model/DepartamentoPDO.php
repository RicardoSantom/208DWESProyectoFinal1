<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of DepartamentoPDO
 *
 * @author daw2
 */
class DepartamentoPDO {

    public static function buscaDepartamentoPorCod($codigoDepartamento) {
        $sSelect = <<<QUERY
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento like'%{$codigoDepartamento}%';";
            QUERY;

        $oResultado = DBPDO::ejecutarConsulta($sSelect);
        $oDatos = $oResultado->fetchObject();

        if ($oDatos) {
            return new Departamento($oDatos->T02_CodDepartamento, $oDatos->T02_DescDepartamento, 
                    $oDatos->T02_FechaCreacionDepartamento, $oDatos->T02_VolumenDeNegocio, $oDatos->T02_FechaBajaDepartamento);
        } else {
            return false;
        }
    }

    public static function buscaDepartamentosPorDesc($descDepartamento) {        
        $aDepartamentos = [];
        $sSelect = "select * from T02_Departamento where T02_DescDepartamento like'%{$descDepartamento}%';";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sSelect);
        //$oResultado es un objeto de la clase PDO::Statement
        $oResultado = $resultadoConsulta->fetchObject();
        while ($oResultado != null) {
           $oDepartamento = new Departamento(
                            $oResultado->T02_CodDepartamento,
                            $oResultado->T02_DescDepartamento,
                            $oResultado->T02_FechaCreacionDepartamento,
                            $oResultado->T02_VolumenNegocio,
                            $oResultado->T02_FechaBajaDepartamento
            );
            array_push($aDepartamentos, $oDepartamento);
            $oResultado = $resultadoConsulta->fetchObject();
        }
        return $aDepartamentos;
    }

    public static function altaDepartamento() {
        
    }

    public static function bajaFisicaDepartamento() {
        
    }

    public static function bajaLogicaDepartamento() {
        
    }

    public static function modificaDepartamento() {
        
    }

    public static function rehabilitaDepartamento() {
        
    }

    public static function contarDepartamentos() {
        
    }

}
