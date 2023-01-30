<?php
/**
 * Description Interface que declara el método ejecutarConsulta,
 * se implementa en la calase DBPDO.php
 * @author Ricardo Santiago Tomé
 * @since 20/01/2023
 * @version 0.1
 */
interface DB {
     public static function ejecutarConsulta($entradaSQL, $parametros);
}
