<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Alta Departamento</h3>
</header>
<main>
    <form id="formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="codigo">Codigo: </label></th>
                    <th class="numerica"><input type="text" name="codigo" id="codigo" style="background-color: #ffffcc;" value="<?php echo $_REQUEST['codigo'] ?? ''; ?>"></th>
                    <td style="color: red;"> <?php echo $aErrores['codigo']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcion">Descripcion: </label></th>
                    <th class="numerica"><input type="text" style="background-color:#ffffcc;" name="descripcion" value="<?php echo $_REQUEST['descripcion'] ?? ''; ?>"></th>
                    <th style="color: red;"> <?php echo $aErrores['descripcion']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="volumen">Volumen de Negocio: </label></th>
                    <th class="numerica"><input type="text" id="volumen" name="volumen" style="background-color:#ffffcc;" value="<?php echo $_REQUEST['volumen'] ?? ''; ?>"></th>
                    <th style="color: red;"> <?php echo $aErrores['volumen']; ?></th>
                </tr>                
            </tbody>
            <tfoot>
                <tr>
                    <td class="alfabetica"><input type="submit" value="Volver" name="volver" id="volver" class="cancelar"/></td>
                    <td class="alfabetica"></td>
                    <td class="alfabetica"><input type="submit" value="Aceptar" name="aceptar" id="aceptar" class="aceptar"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>