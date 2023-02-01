<?php
/**
 * Description Página que muestra un mensaje informando que el recurso solicitado está en desarrollo
 * @author Ricardo Santiago Tomé
 * @since 27/01/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista REST</h3>
</header>
<main>
    <div id="divRest">
        <h2>REST</h2>
            <p>Esta vista está aún en desarrollo</p>
            <h3>Página anterior: <span><?php echo ($_SESSION['paginaAnterior']); ?></span></h3>
            <h3>Página en curso: <span><?php echo ($_SESSION['paginaEnCurso']); ?></span></h3>
            <form id="formRest" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
                <legend><h2>Diccionario:</h2></legend>

            <label>Palabra:</label><br>
            <input type='text' name='palabra' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["palabra"]) ? $_REQUEST["palabra"] : "";
            ?>"/><p><?php
            //Mostrar los errores en el codDepartamento, si los hay
            echo $aErrores["palabra"]!=null ? $aErrores["palabra"] : "";
            ?></p>

            <label>Idioma:</label><br>
            <select name="idioma">
                <option value="ES">Español</option>
                <option value="EN">Ingles</option>
                <option value="FR">Frances</option>
            </select>

            <br><br>
            <input type='submit' name='buscar' value='Buscar'/>
            </form>
    </div>
</main>