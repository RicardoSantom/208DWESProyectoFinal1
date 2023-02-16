<?php
/**
 * Summary Vista Tecnologías
 * 
 * Description Página que muestra las tecnologías usadas en el módulo de DWES
 * 
 * @author Ricardo Santiago Tomé
 * @since 06/02/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Aplicación Final</h1>
    <h2><?php echo $_SESSION['paginaEnCurso']; ?></h2>
</header>
<main>
    <div id="divTecnologias">        
        <ul>
            <li><h3>Documentación tecnologías trabajadas en módulo DWES</h3></li>
            <li><a href="doc/EstudioTema1.pdf" title="Enlace EstudioTema1.pdf" target="blank">TEMA 1:DESARROLLO WEB EN ENTORNO SERVIDOR</a><hr></li>
            <li class="sangrado"><a href="doc/EstudioLaravel.pdf" title="Enlace Laravel.pdf" target="blank">DESARROLLO WEB EN ENTORNO SERVIDOR - Laravel</a><hr></li>
            <li class="sangrado"><a href="doc/Instalación y Despliegue Laravel.pptx" title="Enlace Instalación y Despliegue Laravel.pptx" target="blank">DESARROLLO WEB EN ENTORNO SERVIDOR - Powerpoint Laravel</a><hr></li>
            <li><a href="doc/EstudioTema2.pdf" title="Enlace EstudioTema2.pdf" target="blank">TEMA 2: INSTALACIÓN, CONFIGURACIÓN Y DOCUMENTACIÓN DEL ENTORNO DE DESARROLLO Y DEL ENTORNO DE EXPLOTACIÓN</a><hr></li>
            <li id="enlaceImagenes">
                <a href="https://www.php.net/"><img src="webroot/media/img/php.png" alt="imagen php" height="125" width="125"/></a>
                <a href="https://www.w3schools.com/js/default.asp"><img src="webroot/media/img/js.png" alt="imagen js" height="125" width="125"/></a>
                <a href="https://www.w3schools.com/"><img src="webroot/media/img/interfaces.png" alt="imagen interfaces" height="125" width="125"/></a>
                <a href="https://httpd.apache.org/"><img src="webroot/media/img/apache.png" alt="imagen apache" height="125" width="125"/></a>
            </li>
        </ul>        
        <ul>
            <li><h3>Documentación Proyecto Final</h3></li>
            <li><a href="doc/201127ModeloFisicoDeDatos20-21.pdf" title="Enlace Modelo físico de datos.pdf" target="blank">Modelo físico de datos</a><hr></li>
            <li><a href="doc/220111UsoDeLaSessionParaLaAplicación.pdf" title="Uso de la sesión par la aplicación"  target="blank">Uso de la sesión</a><hr></li>
            <li><a href="doc/220504SecuenciaDesarrolloCRUDcompleto.pdf" title="Secuencia de desarrollo CRUD completo"  target="blank">Secuencia de desarrollo "CRUD completo"</a><hr></li>
            <li><a href="doc/230110FicherosLoginLogoffMulticapaPOO.pdf" title="Ficheros aplicación final"  target="blank">Ficheros Aplicación Final</a><hr></li>
            <li><a href="doc/230129ArbolDeNavegación.pdf" title="Arbol de navegación"  target="blank">Árbol de navegación</a><hr></li>
            <li><a href="doc/230129CatalogoDeRequisitos.pdf"  title="Catálogo de requisitos" target="blank">Catálogo de requisitos</a><hr></li>
            <li><a href="doc/230129DiagramaDeCasosDeUso.pdf" title="Diagrama de casos de uso"  target="blank">Diagrama de casos de uso</a><hr></li>
            <li><a href="doc/230129DiagramaDeClases.pdf" title="Diagrama de clases"  target="blank">Diagrama de clases</a><hr></li>
            <li><a href="doc/230129EstandarDesarrolloDAWyEstructuraAlmacenamientoDWES.pdf" title="Estándar de desarrollo DAW y estructura almacenamiento DWES"
                   target="blank">Estandar de desarrollo DAW y estructura almacenamiento DWES</a><hr></li>
            <li><a href="doc/230129RelacionDeFicheros.pdf"  title="Relación de ficheros" target="blank">Relación de ficheros</a><hr></li>
        </ul>

    </div>
        <!--<h3>Página anterior: <span><?php echo ($_SESSION['paginaAnterior']); ?></span></h3>
        <h3>Página en curso: <span><?php echo ( $_SESSION['paginaEnCurso']); ?></span></h3>-->            
    <form id="formTecnologias" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button type="submit" name="volver" id="volver" value="volver">Volver</button>
    </form>
</main>