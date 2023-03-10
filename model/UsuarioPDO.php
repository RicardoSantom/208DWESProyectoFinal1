<?php

/**
 * Summary clase que implementa métodos declarados en la interfaz DB.
 * 
 * Description of UsuarioPDO Implementa métodos para validar, dar de alta,
 * modificar y borrar un usuario, también para registrar la fecha y hora de la 
 * última conexión del usuario.
 *  
 * @author Ricardo Santiago Tomé <https://github.com/RicardoSantom>
 * @since 15/01/2023
 * Última modificación 12/02/2023
 * @version 0.1
 */
class UsuarioPDO implements UsuarioDB {

    /**
     * 
     * @param String $codUsuario
     * @param String $password
     * @return boolean|\Usuario $oUsuario Devuelve un booleano a falso en caso de que
     * no se haya podido contruir un objeto del tipo Usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        //String con consulta de selección SQL
        $sSentenciaSQLBuscarPorCodigo = <<<QUERY
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario='$codUsuario' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            QUERY;
        $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLBuscarPorCodigo);
        $oResultadoConsulta = $oPDOStatementResultadoConsulta->fetchObject();
        if (is_object($oResultadoConsulta)) {
            return new Usuario($oResultadoConsulta->T01_CodUsuario, $oResultadoConsulta->T01_Password,
                    $oResultadoConsulta->T01_DescUsuario, $oResultadoConsulta->T01_NumConexiones,
                    $oResultadoConsulta->T01_FechaHoraUltimaConexion,
                    $oResultadoConsulta->T01_Perfil, $oResultadoConsulta->T01_ImagenUsuario);
        } else { //Si no existe, devuelve false.
            return false;
        }
    }

    /**
     * Función que registra la fecha y hora de la última conexión de un usuario
     * 
     * Función estática que recibe un objeto usuario, incrementa en 1 el número
     * de conexiones que ha realizado y actualiza este dato en la DB
     * 
     * @param Usuario $oUsuario Usuario al que queremos actualizar su número de conexiones
     * @return Usuario Devuelve el objeto usuario con el nº de conexiones actualizado.
     */
    public static function registrarUltimaConexion($oUsuario) {
        /* $sSentenciaSQLConsultaConexionAnterior = <<<QUERY
          select T01_FechaHoraUltimaConexion FROM T01_Usuario
          WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
          QUERY;
          $fechaConexionAnterior = DBPDO::ejecutarConsulta($sSentenciaSQLConsultaConexionAnterior); */

        $fechaActual = new DateTime();
        $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());
        $oUsuario->setFechaHoraUltimaConexion($fechaActual);
        $oUsuario->setNumConexiones($oUsuario->getNumConexiones() + 1);
        $sSentenciaSQLActualizacionNumConexiones = <<<QUERY
              UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,T01_FechaHoraUltimaConexion=now()
              WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
              QUERY;
        DBPDO::ejecutarConsulta($sSentenciaSQLActualizacionNumConexiones);
    }

    /**
     * Función que da de alta un usuario nuevo
     * 
     * Función estática que construye un usuario y actualiza su registro en la DB
     * esi no existiera previamente
     * 
     * @param string $codUsuario Código del usuario
     * @param sttring $password Password del usuario
     * @param string $descUsuario Descripción del usuario
     * @param string $perfil Tipo de usuario
     * @return boolean|\Usuario
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario, $perfil = 'usuario') {
        $sSentenciaSQLAltaUsuario = <<<QUERY
                INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, 
                    T01_FechaHoraUltimaConexion,T01_Perfil) 
                    values('{$codUsuario}',sha2(concat('{$codUsuario}','{$password}'),256),'{$descUsuario}',1, now(),'{$perfil}');
                QUERY;
        if (self::validarCodNoExiste($codUsuario)) {
            DBPDO::ejecutarConsulta($sSentenciaSQLAltaUsuario);
            return new Usuario($codUsuario, hash('sha256', ($codUsuario . $password)), $descUsuario,
                    1, new DateTime(), $perfil, null);
        } else {
            return false;
        }
    }

    /**
     * Función que modifica un usuario
     * 
     * Función estática que recibe un objeto usuario, un código y modifica
     * la descripción del usuario.
     * 
     * @param Usuario $oUsuario Usuario a modififcar
     * @param string $descUsuario Descripción del usuario a modificar
     */
    public static function modificarUsuario($oUsuario, $descUsuario) {
        $sSentenciaSQLmodificarUsuario = <<<QUERY
                UPDATE T01_Usuario set T01_DescUsuario="{$descUsuario}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
                QUERY;
        DBPDO::ejecutarConsulta($sSentenciaSQLmodificarUsuario);
        $oUsuario->setDescUsuario($descUsuario);
    }

    /**
     * Funció mque cambia el password de un usuario
     * 
     * Función estática que recibe un objeto Usuario y un password que 
     * actualizará en la DB
     * 
     * @param type $oUsuario
     * @param type $nuevoPassword
     * @return boolean
     */
    public static function cambiarPassword($oUsuario, $nuevoPassword) {
        $entradaOk = false;
        $sSentenciaSQLmodificarContraseña = <<<QUERY
            UPDATE T01_Usuario SET T01_Password="{$nuevoPassword}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        QUERY;
        if (DBPDO::ejecutarConsulta($sSentenciaSQLmodificarContraseña)) {
            $entradaOk = true;
            $oUsuario->setPassword($nuevoPassword);
        }
        return $entradaOk;
    }

    /**
     * Función que borra un usuario de la DB.
     * 
     * Función estática que recibe un código de usuario, borra el usuario de la
     * DB al que pertenezca el código y devuelve un booleano con el resultado.
     * 
     * @param string $codUsuario Código del usuario a borrar
     * @return boolean Si lo ha borrado devuelve true. Si no lo he podido borrar
     * devuelve false.
     */
    public static function borrarUsuario($codUsuario) {
        $sSentenciaSQLborrarUsuario = "DELETE from T01_Usuario where T01_CodUsuario='{$codUsuario}'";
        return DBPDO::ejecutarConsulta($sSentenciaSQLborrarUsuario);
    }

    /**
     * Función que valida la existencia o no de un código de departamento en la DB.
     * 
     * Función estática que recibe un código de departamento, comprueba si existe
     * previamente en la DB, devuelve true o false indicando si existe o no
     * 
     * @param string $codDepartamento Código a comprobar en DB.
     * @return boolean Si exise el código devuelve true, sino, devuelve false.
     */
    public static function validarCodNoExiste($codDepartamento) {
        $codigoNoExiste = true;
        $sSentenciaSQLValidarCodigo = <<< query
                select * from T02_Departamento where T02_CodDepartamento="{$codDepartamento}";
                query;
        $oResultado = DBPDO::ejecutarConsulta($sSentenciaSQLValidarCodigo);
        if (!$oResultado) {
            $codigoNoExiste = false;
        }
        return $codigoNoExiste;
    }

}
