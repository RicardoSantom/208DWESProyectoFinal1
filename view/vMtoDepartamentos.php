<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <div id="divFormularios">
        <form id="formVolver" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <div id="divVolver">
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            </div>
            <div id="divBotones">
                <button type="submit" name="aniadir" id="aniadir" value="anadir">Añadir</button>
                <button type="submit" name="importar" id="importar" value="importar">Importar</button>
                <button type="submit" name="exportar" id="exportar" value="exportar">Exportar</button>
            </div>
        </form>
        <form name = "vMtoDepartamentos" id = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <fieldset>
                <div id="divInputDescripcion">
                    <label for = "descripcion">Descripción:</label>
                    <input type = "text" id="descripcion" name = "descripcion" placeholder = "Máximo 30 caracteres" value = "<?php echo $_SESSION['criterioBusquedaDepartamento'] ?? '' ?>"/>
                    <p id="parrafoError"><span style="color: red"><?php echo $aErrores['descripcion']; ?></span></p>
                </div>
                <div id="divBotonesDescripcion">
                    <input type = "submit" name = "buscar" value = "Buscar" id = "buscar"/>
                    <button type="submit" name="refrescar" id="refrescar" value="refrescar">Limpiar campos</button>
                </div>
            </fieldset>
        </form>
    </div>
    <table id="bienvenida">
        <caption>Resultados búsqueda</caption>
        <thead>
            <tr>
                <th class="alfabetica">Código</th>
                <th class="alfabetica">Descripción</th>
                <th class="fecha">Fecha Creación</th>
                <th class="numerica">Volumen Negocio</th>
                <th class="fecha">Fecha Baja</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($aVMtoDepartamentos) {
                foreach ($aVMtoDepartamentos as $departamentoEnCurso) {
                    ?>
                    <tr style="<?php
                    if (is_null($departamentoEnCurso['fechaBaja'])) {
                        echo "text-decoration: underline 3px #ccff87;";
                    } else {
                        echo "text-decoration: underline 3px #ff423d;";
                    }
                    ?>">
                        <td class="alfabetica corta"><?php echo $departamentoEnCurso['codDepartamento'] ?></td>
                        <td class="alfabetica"><?php echo $departamentoEnCurso['descDepartamento'] ?></td>
                        <td class="fecha"><?php echo $departamentoEnCurso['fechaAlta'] ?></td>
                        <td class="numerica corta"><?php echo $departamentoEnCurso['volumenNegocio'] ?></td>
                        <td class="fecha"><?php echo $departamentoEnCurso['fechaBaja'] ?></td>
                        <td class="numerica media">
                            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                                <button type="submit" name="editar" id="editarConsultar" value="<?php echo $departamentoEnCurso['codDepartamento']; ?>">editar</button>
                                <button type="submit" name="eliminar" id="eliminar" value="<?php echo $departamentoEnCurso['codDepartamento']; ?>">eliminar</button>
                                <?php
                                if (is_null($departamentoEnCurso['fechaBaja'])) {
                                    ?>
                                    <button  id="deshabilitar" name="deshabilitar" title="Deshabilitar departamento" value="<?php echo $departamentoEnCurso['codDepartamento']; ?>"><span class="material-icons md-18">arrow_downward</span></button>
                                    <?php
                                } else {
                                    ?>
                                    <button  id="rehabilitar" name="rehabilitar" title="Rehabilitar departamento" value="<?php echo $departamentoEnCurso['codDepartamento']; ?>"><span class="material-icons md-18">arrow_upward</span></button>
                                    <?php
                                }
                                ?>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</main>
