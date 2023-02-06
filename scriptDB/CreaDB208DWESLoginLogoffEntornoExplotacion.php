<!DOCTYPE html>
<html lang="es">
    <!--
            Autor: Ricardo Santiago Tomé.
            Utilidad: Creación de tablas en base de datos
            Fecha-última-revisión: 11/01/2023.
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
        <title>Script creación DB + usuario</title>
    </head>
    <body>
        <header>
            <h1>Scripts proyecto LoginLogoff</h1>
            <h2>Script creación DB + usuario</h2>
        </header>
        <main>
            <article>
                <h3>Scripts de creación entorno de explotación</h3>
                <?php
                require_once '../conf/confDBPDO.php';
                try {
                    //Establecimiento de la conexión 
                    $DB208DWESLoginLogoff = new PDO(DSN, USER, PASSWORD);
                    $creacion = $DB208DWESLoginLogoff->prepare(<<<SQL
                            create table T02_Departamento(T02_CodDepartamento char(3) primary key,
                            T02_DescDepartamento varchar(255) not null, T02_FechaCreacionDepartamento DATETIME not null,
                            T02_VolumenNegocio float not null,T02_FechaBajaDepartamento DATETIME null)
                            engine=Innodb;
                            create table if not exists T01_Usuario(
                            T01_CodUsuario varchar(10) primary key not null,
                            T01_Password varchar(255) not null,
                            T01_DescUsuario varchar(255) not null,
                            T01_NumConexiones int not null default 1,
                            T01_FechaHoraUltimaConexion DATETIME not null,
                            T01_Perfil enum('administrador','usuario','profesor','alumno') default 'usuario',
                            T01_ImagenUsuario MEDIUMBLOB null
                            )engine=Innodb;
                            SQL);
                    $creacion->execute(); //Ejecuto la consulta
                    if ($creacion) {
                        echo "<h3>Creacion ejecutada con exito</<h3>";
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
                    unset($mydb);
                }
                ?>
                <a href="https://daw208.ieslossauces.es/index.php">VOLVER</a>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="https://daw208.ieslossauces.es/index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="https://daw208.ieslossauces.es/doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="https://daw208.ieslossauces.es/208DWESLoginLogoff/index.php" id="enlaceSecundario" title="Enlace a Index">Index</a>
        </footer>
    </body>
</html>