<?php
/*
 * Fichero de configuracion que contiene la conexion a la base de datos
 * @author Manuel Martín Alonso
 * @since:  12-01-2023
 * Última modificación: 12-01-2023
 */

//ENTORNO DESARROLLO CASA
// IP del servidor y Nombre de la base de datos
define('DSN', 'mysql:host=192.168.1.77;dbname=DB208DWESLoginLogoff');
// Usuario con el que se conecta
define("USER", 'user208DWESLoginLogoff');
// Contraseña con la que conectarse a la base de datos 
define("PASSWORD", 'paso');

/*
//ENTORNO DE DESARROLLO
// IP del servidor y Nombre de la base de datos
define("DSN", 'mysql:host=192.168.20.19;dbname=DB208DWESLoginLogoff');
// Usuario con el que se conecta 
define("USER", 'user208DWESLoginLogoff');
// Contraseña con la que conectarse a la base de datos 
define("PASSWORD", 'paso');
*/

//ENTORNO DE EXPLOTACION 1&1
// IP del servidor y Nombre de la base de datos
//define('DSN', 'mysql:host=db5010845912.hosting-data.io; dbname=dbs9174079;');
// Usuario con el que se conecta 
//define("USER",  'dbu1353928');
// Contraseña con la que conectarse a la base de datos 
//define("PASSWORD", 'daw2_Sauces');

?>