<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Eliminar Departamento</h3>
</header>
<main>
    <form id = "formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <caption>¿Desea eliminar el siguiente Departamento?</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="codigo">Codigo: </label></th> 
                    <th class="numerica"><input type="text" id="codigo" name="codigo" value="<?php echo $aVistaEliminarDepartamento['codigo']; ?>" readonly style="background-color: #cccccc;;"></th>

                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcion">Descripcion: </label></th>
                    <th class="numerica"><input type="text" id="descripcion" name="descripcion" value="<?php echo $aVistaEliminarDepartamento['descripcion']; ?>" readonly style="background-color: #cccccc;;"></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="volumen">Volumen de Negocio: </label></th>
                    <th class="numerica"><input id="volumen" type="text" id="volumen" name="volumen" value="<?php echo $aVistaEliminarDepartamento['volumen']; ?>" readonly style="background-color:#cccccc;;"></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaAlta">fecha Alta: </label></th>
                    <th class="numerica"><input type="text"  name="fechaAlta" value="<?php echo $aVistaEliminarDepartamento['fechaAlta']; ?>" readonly style="background-color: #cccccc;;"></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaBaja">Fecha Baja: </label></th>
                    <th class="numerica"><input type="text" name="fechaBaja"  value="<?php echo $aVistaEliminarDepartamento['fechaBaja']; ?> " readonly style="background-color: #cccccc;;"></th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="alfabetica"><input type="submit" value="Cancelar" name="cancelar" id="cancelar"/></td>
                    <td class="alfabetica"><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>