<!DOCTYPE html>
<html lang="en">
    <!--
            Autor: Ricardo Santiago Tomé.
            Utilidad: Inserción de datos en tablas.
            Fecha-última-revisión: 22-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Script carga inicial</title>
    </head>
    <body>
        <header>
            <h1>Scripts proyecto tema 5</h1>
            <h2>Script carga inicial</h2>
        </header>
        <main>
            <article>
                <h3>Scripts de carga inicial entorno de explotación</h3>
                <?php
                require_once '../conf/confDBPDO.php';
                try {
                    //Establecimiento de la conexión 
                    $DB208DWESLoginLogoff = new PDO(DSN, USER, PASSWORD);
                    $insercion = $DB208DWESLoginLogoff->prepare(<<<SQL
                    insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) 
                    values("DAW","Despliegue Aplcaciones Web",now(),2000);
                    insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) 
                    values("DWC","Desarrollo Web Entorno Cliente",now(),1000);
                    insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
                    values("DWS","Desarrollo Web Entorno Servidor",now(),3000);
                    insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
                    values("DIW","Diseño Interfaces Web",now(),4000);
                    insert into T02_Departamento  (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio)
                    values("EIE","Empresa e Iniciativa Emprendedora",now(),2);
                SQL);
                    $insercion->execute(); //Ejecuto la consulta
                    if ($insercion) {
                        echo "<h3>Insercion ejecutada con exito</<h3>";
                        //$resultadoDepartamentos = $DB208DWESLoginLogoff->query("select * from T02_Departamento");
                    }
                } catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                    //Almacenamos el código del error de la excepción en la variable $errorExcepcion
                    $errorExcep = $excepcion->getCode();
                    //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
                    $mensajeExcep = $excepcion->getMessage();

                    echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
                    echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
                } finally {
                    // Cierre de la conexión.
                    unset($DB208DWESLoginLogoff);
                }
                try {
                    //Establecimiento de la conexión 
                    $DB208DWESLoginLogoff2 = new PDO(DSN, USER, PASSWORD);
                    $insercion2 = $DB208DWESLoginLogoff2->prepare(<<<SQL2
                    insert into T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_FechaHoraUltimaConexion,T01_Perfil) values
                    ('heraclio',sha2(concat('heraclio','paso'),256),'Heraclio Borbujo Morán', now(),'profesor'),
                    ('alberto',sha2(concat('alberto','paso'),256),'Alberto Bahillo Fernández',now(), 'profesor'),
                    ('amor',sha2(concat('amor','paso'),256),'Amor Rodríguez Navarro',now(), 'profesor'),
                    ('antonio',sha2(concat('antonio','paso'),256),'Antonio Jañez Veleda',now(), 'profesor'),
                    ('carmen',sha2(concat('carmen','paso'),256),'Mª del Carmen Fernández Gallego',now(),'profesor'),
                    ('ricardo',sha2(concat('ricardo','paso'),256),'Ricardo Santiago Tomé',now(), 'alumno'),
                    ('david',sha2(concat('david','paso'),256),'David Aparicio Sir',now(), 'alumno'),
                    ('luis',sha2(concat('luis','paso'),256),'Luis Pérez Astorga',now(), 'alumno'),
                    ('alejandro',sha2(concat('alejandro','paso'),256),'Alejandro Otálvaro Marulanda',now(), 'alumno'),
                    ('josue',sha2(concat('josue','paso'),256),'Josué Martínez Fernández',now(), 'alumno'),
                    ('manuel',sha2(concat('manuel','paso'),256),'Manuel Martín Alonso',now(), 'alumno'),
                    ('admin',sha2(concat('admin','paso'),256),'Administrador', now(),'administrador');
                SQL2);
                    $insercion2->execute(); //Ejecuto la consulta
                    if ($insercion2) {
                        echo "<h3>Insercion ejecutada con exito</<h3>";
                        //$resultadoDepartamentos = $DB208DWESLoginLogoff2->query("select * from T01_Usuario");
                    }
                } catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                    //Almacenamos el código del error de la excepción en la variable $errorExcepcion
                    $errorExcep = $excepcion->getCode();
                    //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
                    $mensajeExcep = $excepcion->getMessage();

                    echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
                    echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
                } finally {
                    // Cierre de la conexión.
                    unset($DB208DWESLoginLogoff2);
                }
                ?>
                <a href="../index.php">VOLVER</a>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="https://daw208.ieslossauces.es/index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="https://daw208.ieslossauces.es/doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="https://daw208.ieslossauces.es/208DWESLoginLogoff/index.php" id="enlaceSecundario" title="Enlace a Index">Index LoginLogoff</a>
        </footer>
    </body>
</html>