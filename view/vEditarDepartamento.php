<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Editar Departamento</h3>
</header>
<main>
    <form id = "formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <tbody>                    
                <tr>
                    <th class="alfabetica"><label for="codigo">Codigo: </label></th>                    
                    <th class="numerica"><input type="text" id="codigo" name="codigo" value="<?php echo $aVDepartamento['codigo']; ?>" readonly style="background-color: #cccccc;"></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcion">Descripcion: </label></th>
                    <th class="numerica"><input id="descripcion" type="text" style="background-color:#ffffcc;" name="descripcion" value="<?php echo $aVDepartamento['descripcion']; ?>"></th>
                    <th style="color: red;"> <?php echo $aErrores['descripcion']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="volumen">Volumen de Negocio: </label></th>
                    <th class="numerica"><input type="text" id="volumen" name="volumen" style="background-color:#ffffcc;" value="<?php echo $aVDepartamento['volumen']; ?>"></th>
                    <th style="color: red;"> <?php echo $aErrores['volumenNegocio']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaAlta">Fecha Alta: </label></th>
                    <th class="numerica"><input type="text"  name="fechaAlta" value="<?php echo $aVDepartamento['fechaAlta']; ?>" readonly style="background-color: #cccccc;"></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaBaja">Fecha Baja: </label></th>
                    <th class="numerica"><input type="text" name="fechaBaja"  value="<?php echo $aVDepartamento['fechaBaja']; ?> " readonly style="background-color: #cccccc;"></th>
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