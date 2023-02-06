<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista Mantenimiento Departamentos</h3>
</header>
<main>
    <div id="divMto">
        <h2>Mantenimiento Departamentos</h2>
        <p>Esta vista está aún en desarrollo</p>
        <h3>Página anterior: <span><?php echo ($_SESSION['paginaAnterior']); ?></span></h3>
        <h3>Página en curso: <span><?php echo ( $_SESSION['paginaEnCurso']); ?></span></h3>            
        <form id="formMto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button type="submit" name="volver" id="volver" value="volver">Volver</button>
        </form>
    </div>
    <form name = "ejercicio04" class = "formBuscar" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <fieldset id = "fieldsetBuscar">
            <legend>Criterios de búsqueda</legend>
            <label for = "descripcion"></label>
            <input type = "text" name = "descripcion" placeholder = "Máximo 30 caracteres" value = "<?php echo $_REQUEST['descripcion'] ?? '' ?>"/>
            <p><?php echo '<span style="color: red;">' . $aErrores['descripcion'] . '</span>' ?>;
            </p>
            <input type = "submit" name = "Buscar" value = "Buscar" id = "botonBuscar"/>
        </fieldset>
    </form>
    <table class="tablaConsulta">
        <thead>
            <tr>
                <th>T02_CodDepartamento</th>
                <th>T02_DescDepartamento</th>
                <th>T02_FechaCreaciónDepartamento</th>
                <th>T02_VolumenNegocio</th>
                <th>T02_FechaBajaDepartamento</th>
            </tr>
        </thead>
    </table>
</main>
