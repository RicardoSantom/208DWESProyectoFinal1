<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form id = "formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <caption>Editar departamento</caption>
            <tbody>                    
                <tr>
                    <th class="alfabetica"><label for="codigo">Codigo: </label></th>                    
                    <th class="numerica"><input type="text" id="codigo" name="codigo" value="<?php echo $aVistaEditarDepartamento['codigo']; ?>" readonly style="background-color: #cccccc;"></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcion">Descripcion: </label></th>
                    <th class="numerica"><input id="descripcion" type="text" style="background-color:#ffffcc;" name="descripcion" value="<?php echo $aVistaEditarDepartamento['descripcion']; ?>"></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['descripcion']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="volumen">Volumen de Negocio: </label></th>
                    <th class="numerica"><input type="text" id="volumen" name="volumen" style="background-color:#ffffcc;" value="<?php echo $aVistaEditarDepartamento['volumen']; ?>"></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['volumenNegocio']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaAlta">Fecha Alta: </label></th>
                    <th class="numerica"><input type="text"  name="fechaAlta" value="<?php echo $aVistaEditarDepartamento['fechaAlta']; ?>" readonly style="background-color: #cccccc;"></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaBaja">Fecha Baja: </label></th>
                    <th class="numerica"><input type="text" name="fechaBaja"  value="<?php echo $aVistaEditarDepartamento['fechaBaja']; ?> " readonly style="background-color: #cccccc;"></th>
                    <th></th>
                </tr>
            </tbody>
            <tfoot>                
                <tr>
                    <td class="alfabetica"><input type="submit" value="Volver" name="volver" id="volver"/></td>
                    <td class="alfabetica"></td>
                    <td class="alfabetica"><input type="submit" value="Aceptar" name="aceptar" id="aceptar"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>