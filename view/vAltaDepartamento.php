<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form id="formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <caption>Formulario alta departamento</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="codigo">Codigo: </label></th>
                    <th class="numerica"><input type="text" name="codigo" id="codigo" style="background-color: #ffffcc;" 
                                                title="El valor ha de corresponder con 3 letras mayúsculas o minúsculas" value="<?php echo $_REQUEST['codigo'] ?? ''; ?>"></th>
                    <td  class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['codigo']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcion">Descripcion: </label></th>
                    <th class="numerica"><input type="text" style="background-color:#ffffcc;" name="descripcion" id="descripcion"
                                                title="Letras y números con una longintud igual o mayor a 5 caracteres
                                                e igual o menor a 60 caracteres" placeholder="Máximo 60 caracteres"
                                                value="<?php echo $_REQUEST['descripcion'] ?? ''; ?>"></th>
                    <td  class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['descripcion']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="volumen">Volumen de Negocio: </label></th>
                    <th class="numerica"><input type="text" id="volumen" name="volumen" style="background-color:#ffffcc;" 
                                                title="Se admiten valores decimales." value="<?php echo $_REQUEST['volumen'] ?? ''; ?>"></th>
                    <td  class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['volumen']; ?></td>
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