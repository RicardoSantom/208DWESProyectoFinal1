<?php
/**
 * Summary Vista RSS
 * 
 * Description Página que muestra las instrucciones para conectar con mis 
 * publicaciones en RSS
 * 
 * @author Ricardo Santiago Tomé
 * @since 10/02/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Aplicación Final</h1>
    <h2><?php echo $_SESSION['paginaEnCurso']; ?></h2>
</header>
<main>        
    <form id="formRss" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <a href="../novedades.xml" id="rss" target="blank" title="Solicitar Feed RSS"><span class="material-icons md-18">rss_feed</span></a>
        <input type="submit" name="volver" id="volver" value="Volver">
    </form>
    <article id="articleRss">
        <h3>Este feed es un canal de publicación de release en Github de esta aplicación<strong>
                208DWESProyectoFinal1</strong>
        </h3>
        <h4>Instrucciones para subscribirse a feed RSS</h4>
        <a href="doc/InstruccionesRSS.pdf" id="instruccionesRSS" target="blank" title="Instrucciones para subscribirse a RSS">
            <div id="divImagenes">
                <h3>Haga click en las imágenes para abrir instrucciones en otra ventana</h3>
                <img src="webroot/media/instruccionesRSS1.png" width="1000" height="750" alt="instruccionesRSS1"/>
                <img src="webroot/media/instruccionesRSS2.png" width="1000" height="750" alt="instruccionesRSS2"/>
            </div>
        </a>
    </article>
</main>