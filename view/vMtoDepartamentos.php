<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Mantenimiento Departamentos</h3>
</header>
<main>
    <form id="formVolver" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <button type="submit" name="volver" id="volver" value="volver">Volver</button>
    </form>
    <form name = "vMtoDepartamentos" id = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <fieldset>
            <div id="divInputDescripcion">
                <label for = "descripcion">Descripción:</label>
                <input type = "text" id="descripcion" name = "descripcion" placeholder = "Máximo 30 caracteres" value = "<?php echo $_SESSION['buscaDepartamentosPorDesc'] ?? '' ?>"/>
                <p><?php echo '<span style="color: red;">' . $aErrores['criterioBusquedaDepartamento'] . '</span>'; ?></p>

            </div>
            <div id="divBotonesDescripcion">
                <input type = "submit" name = "buscar" value = "Buscar" id = "buscar"/>
                <!--<button type="submit" name="refrescar" id="refrescar" value="refrescar">Limpiar campos</button>-->
            </div>
        </fieldset>
    </form>
    <table id="bienvenida">
        <caption>Resultados búsqueda</caption>
        <thead>
            <tr>
                <th class="alfabetica">Código</th>
                <th class="alfabetica">Descripción</th>
                <th class="numerica">Fecha Creación</th>
                <th class="numerica">Volumen Negocio</th>
                <th class="numerica">Fecha Baja Departamento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($aVMtoDepartamentos) {
                foreach ($aVMtoDepartamentos as $valorDepartamento) {
                    ?>
                    <tr>
                        <td class="alfabetica"><?php echo $valorDepartamento['codDepartamento'] ?></td>
                        <td class="alfabetica"><?php echo $valorDepartamento['descDepartamento'] ?></td>
                        <td class="numerica"><?php echo $valorDepartamento['fechaAlta'] ?></td>
                        <td class="numerica"><?php echo $valorDepartamento['volumenNegocio'] ?></td>
                        <td class="numerica"><?php echo $valorDepartamento['fechaBaja'] ?></td>
                        <td>
                            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                                <button type="submit" name="editar" id="editarConsultar" value="editar">editar</button>
                                <button type="submit" name="borrar" id="borrar" value="borrar">borrar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo $aErrores['buscaDepartamentosPorDesc'];
            }
            ?>
        </tbody>
    </table>
</main>
