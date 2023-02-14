<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista Mantenimiento Departamentos</h3>
</header>
<main>
    <form name = "vMtoDepartamentos" id = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <div id="divInputDescripcion">
            <label for = "descripcion">Inserte descripción:</label>
            <input type = "text" id="descripcion" name = "descripcion" placeholder = "Máximo 20 caracteres" value = "<?php echo $_REQUEST['descripcion'] ?? '' ?>"/>
            <p><?php echo '<span style="color: red;">' . $aErrores['descripcion'] . '</span>'; ?></p>
        </div>
        <div id="divBotonesDescripcion">
            <input type = "submit" name = "buscar" value = "Buscar" id = "buscar"/>            
            <button type="submit" name="volver" id="volver" value="volver">Volver</button>
        </div>
    </form>
    <table id="bienvenida">
        <caption>Tabla Mantenimiento Departamentos</caption>
        <thead>
            <tr>
                <th>T02_CodDepartamento</th>
                <th>T02_DescDepartamento</th>
                <th>T02_FechaCreaciónDepartamento</th>
                <th>T02_VolumenNegocio</th>
                <th>T02_FechaBajaDepartamento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aDepartamentos as $oDepartamento) {
                ?>
                <tr>
                    <td><?php echo $oDepartamento->getCodDepartamento() ?></td>
                    <td><?php echo $oDepartamento->getDescDepartamento() ?></td>
                    <td><?php echo $oDepartamento->getFechaCreacionDepartamento() ?></td>
                    <td><?php echo $oDepartamento->getVolumenDeNegocio() ?></td>
                    <td><?php echo $oDepartamento->getFechaBajaDepartamento() ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>
