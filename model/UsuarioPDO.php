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
        try { //String con consulta de selección SQL
            $sSentenciaSQLBuscarPorCodigo = <<<QUERY
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario='$codUsuario' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            QUERY;
            $oPDOStatementResultadoConsulta = DBPDO::ejecutarConsulta($sSentenciaSQLBuscarPorCodigo);
            $oResultadoConsulta = $oPDOStatementResultadoConsulta->fetchObject();
            if (is_object($oResultadoConsulta)) {
                $oUsuario = new Usuario($oResultadoConsulta->T01_CodUsuario, $oResultadoConsulta->T01_Password,
                        $oResultadoConsulta->T01_DescUsuario, $oResultadoConsulta->T01_NumConexiones, $oResultadoConsulta->T01_FechaHoraUltimaConexion,
                        $oResultadoConsulta->T01_Perfil, $oResultadoConsulta->T01_ImagenUsuario);
                return $oUsuario;
            } /* else { //Si no existe, devuelve false.
              return false;
              } */
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function registrarUltimaConexion($oUsuario) {
        $oUsuario->setNumConexiones($oUsuario->getNumConexiones() + 1);
        $sSentenciaSQLActualizacionNumConexiones = <<<QUERY
              UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,T01_FechaHoraUltimaConexion=now()
              WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
              QUERY;
        DBPDO::ejecutarConsulta($sSentenciaSQLActualizacionNumConexiones);
        return $oUsuario;
    }

    public static function altaUsuario($codUsuario, $password, $descUsuario) {
        $sSentenciaSQLAltaUsuario = <<<QUERY
                INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) 
                    values('{$codUsuario}',sha2(concat('{$codUsuario}','{$password}'),256),'{$descUsuario}',1, now());
                QUERY;
        if (self::validarCodNoExiste(!$codUsuario)) {
            DBPDO::ejecutarConsulta($sSentenciaSQLAltaUsuario);
            return new Usuario($codUsuario, hash('sha256', ($codUsuario . $password)), $descUsuario, 1, new DateTime("now"));
        } else {
            return false;
        }
    }

    public static function modificarUsuario($oUsuario, $descUsuario) {
        $sSentenciaSQLmodificarUsuario = <<<QUERY
                UPDATE T01_Usuario set T01_DescUsuario="{$descUsuario}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
                QUERY;
        DBPDO::ejecutarConsulta($sSentenciaSQLmodificarUsuario);
        $oUsuario->setDescUsuario($descUsuario);
    }

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

    public static function borrarUsuario($codUsuario) {
        $entradaOk = false;
        $sSentenciaSQLborrarUsuario = <<<QUERY
                DELETE * from T01_Usuario where T01_codUsuario="{$codUsuario}";
                QUERY;
        if (DBPDO::ejecutarConsulta($sSentenciaSQLborrarUsuario)) {
            $entradaOk = true;
        }
        return $entradaOk;
    }

    public static function validarCodNoExiste($codUsuario) {
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

}
