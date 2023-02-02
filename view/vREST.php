<?php
/**
 * Summary Vista REST búsqueda significado palabras con llamada a ApI
 * 
 * Description A través de un formulario se recoge la palabra introducida por
 * el usuario en input, se llama a una API externa que contiene datos sobre
 * palabras en lengua inglesa, y se imprime una tabla mostrando los datos seleccionados.
 * 
 * @author Ricardo Santiago Tomé
 * @since 27/01/2023
 * @version 0.1
 *
 */
//Contador para mostrar número de definición cuando esta sea múltiple.
$contador = 0;
?>
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista REST</h3>
</header>
<main>
    <div id="divRest">
        <form id="formRest" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend><h2>Diccionario inglés:</h2></legend>
                <label>Introduzca palabra:</label>
                <input type='text' name='palabra' value="<?php
                echo isset($_REQUEST["palabra"]) ?? "No hay resultado";
                ?>"/>
                <input type='submit' name='buscar' value='Buscar'/>
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            </fieldset>
        </form>
        <!--<?php
        $ruta;
        if (isset($aVPalabra)) {
            foreach ($aVPalabra["audio"] as $aPhonetics) {
                foreach ($aPhonetics->audio as $aAudio) {
                   $ruta=$aPhonetics->audio;
                }
            }
            ?>-->
            <h3>Palabra buscada: <strong><?php print_r($aVPalabra["palabra"]); ?></strong></h3>?>
            <!--<p><?php echo"$aVPalabra[1]" ?></p>
            <audio controls autoplay >
                <source src='<?php $ruta ?>'>
            </audio>-->
            <table>
                <caption>Tabla de resultados consulta palabra</caption>
                <tbody>
    <?php foreach ($aVPalabra["significados"] as $aMeaning) { ?>
                        <tr>
                            <td>Categoría gramatical</td>
                            <th> <?php echo ($aMeaning->partOfSpeech) ?? 'No hay datos'; ?> </th>
                        </tr>
                        <?php
                        foreach ($aMeaning->definitions as $aDefinition) {
                            $contador++
                            ?>
                            <tr>
                                <td>Definición:<?php echo"$contador"; ?></td>
                                <td><?php echo "$aDefinition->definition"; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>