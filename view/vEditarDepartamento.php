<main>
    <div class="editarDepartamento">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table>
                <tr>
                    <td><label for="codigo">Codigo: </label></td>
                    <td><input type="text" name="codigo" value="<?php echo $aVDepartamento['codigo']; ?>" readonly style="background-color: #cccccc;"></td>
                    
                </tr>
                <tbody>
                    <tr>
                        <td><label for="descripcion">Descripcion: </label></td>
                        <td><input type="text" style="background-color:yellow;" name="descripcion" value="<?php echo $aVDepartamento['descripcion']; ?>"></td>
                        <td style="color: red;"> <?php echo $aErrores['descripcion']; ?></td>
                    </tr>
                    <tr>
                        <td><label for="volumen">Volumen de Negocio: </label></td>
                        <td><input type="text" id="volumen" name="volumen" style="background-color:#ffffcc;" value="<?php echo $aVDepartamento['volumen']; ?>"></td>
                        <td style="color: red;"> <?php echo $aErrores['volumenNegocio']; ?></td>
                    </tr>
                    <tr>
                        <td><label for="volumen">fecha Alta: </label></td>
                        <td><input type="text"  name="fechaAlta" value="<?php echo $aVDepartamento['fechaAlta']; ?>" readonly style="background-color: gray;"></td>
                    </tr>
                    <tr>
                        <td><label for="volumen">Fecha Baja: </label></td>
                        <td><input type="text" name="fechaBaja"  value="<?php echo $aVDepartamento['fechaBaja']; ?> " readonly style="background-color: gray;"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Volver" name="volver" id="volver"/></td>
                        <td><input type="submit" value="Aceptar" name="aceptar" id="aceptar"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</main>