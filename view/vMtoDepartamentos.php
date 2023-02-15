<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista Mantenimiento Departamentos</h3>
</header>
<main>
    <form name = "vMtoDepartamentos" id = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <div id="divInputDescripcion">
            <label for = "descripcion">Inserte descripción:</label>
            <input type = "text" id="descripcion" name = "descripcion" placeholder = "Máximo 30 caracteres" value = "<?php echo $_SESSION['buscaDepartamentosPorDesc'] ?? '' ?>"/>
            <p><?php echo '<span style="color: red;">' . $aErrores['buscaDepartamentosPorDesc'] . '</span>'; ?></p>
        </div>
        <div id="divBotonesDescripcion">
            <input type = "submit" name = "buscar" value = "Buscar" id = "buscar"/>            
            <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            <button type="submit" name="refrescar" id="refrescar" value="refrescar">Refrescar campos</button>
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
                <th>Controles</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($aVMtoDepartamentos) {
                foreach ($aVMtoDepartamentos as $valorDepartamento) {
                    ?>
                    <tr>
                        <td><?php echo $valorDepartamento['codDepartamento'] ?></td>
                        <td><?php echo $valorDepartamento['descDepartamento'] ?></td>
                        <td><?php echo $valorDepartamento['fechaAlta'] ?></td>
                        <td><?php echo $valorDepartamento['volumenNegocio'] ?></td>
                        <td><?php echo $valorDepartamento['fechaBaja'] ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
            } else{
                echo $aErrores['buscaDepartamentosPorDesc'];
            }
            ?>
        </tbody>
    </table>
</main>
