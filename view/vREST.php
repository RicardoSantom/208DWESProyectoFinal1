<?php
/**
 * Summary Vista REST búsqueda significado palabras con llamada a ApI
 * 
 * Description A través de un formulario se recoge la palabra introducida por
 * el usuario en un input, se llama a una API externa que contiene datos sobre
 * palabras en lengua inglesa, y se imprime una tabla mostrando los datos seleccionados.
 * 
 * @author Ricardo Santiago Tomé
 * @since 28/01/2023
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
                <div id="divPalabra">
                    <label id="labelPalabra">Introduzca palabra:</label>
                    <input type='text' name='palabra' id="palabra" value="<?php
                    echo isset($_REQUEST["palabra"]) ? $_REQUEST["palabra"] : '';
                    ?>"/>
                </div>
                <input type='submit' name='buscar' id="buscar" value='Buscar'/>
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            </fieldset>
        </form>
        <?php
        //Variable string que guarda la url del audio.
        // $sRuta;
        //Si el array de respuestas tiene contenido
        if (isset($aRespuestasApi)) {
            /* En desarrollo mostrar botón de audio para escuchar pronunciación.
             * foreach ($aVPalabra["audio"] as $aPhonetics) {
              foreach ($aPhonetics->audio as $aAudio) {
              $sRuta=$aPhonetics->audio;
              }
              }
             */
            ?>

            <h3>Palabra buscada: <strong><?php
                    //Impresión de la palabra introducida en el input
                    print_r($aRespuestasApi["palabra"]);
                    ?></strong></h3>
            <!--<p><?php /* echo"$aRespuestas[1]" */ ?></p>
            <audio controls autoplay >
                <source src='<?php /* $sRuta */ ?>'>
            </audio>-->
            <!-- Impresión de tabla para mostrar resultados de la consulta -->
            <table>
                <caption>Tabla de resultados consulta palabra</caption>
                <tbody>
                    <?php
                    //Recorrido de las posiciones del array de respuestas
                    foreach ($aRespuestasApi["significados"] as $aMeaning) {
                        ?>
                        <tr>
                            <td>Categoría gramatical</td>
                            <th> <?php
                                //Impresión de categoría gramatical de la definición o mensaje de no hay datos si no hay respuesta
                                echo ($aMeaning->partOfSpeech) ?? 'No hay datos';
                                ?> </th>
                        </tr>
                        <?php
                        //Recorrido de array interno con definiciones, habrá una o varias por cada categoría gramatical.
                        foreach ($aMeaning->definitions as $aDefinition) {
                            //Cada vez que encuentre una nueva definición, autoincrementa en uno el contador
                            $contador++
                            ?>
                            <tr>
                                <td>Definición:<?php
                                    //Impresión del número pertinente de definición
                                    echo"$contador";
                                    ?></td>
                                <td><?php
                                    //Impresión de la definición obtenida en la consulta a la API
                                    echo "$aDefinition->definition";
                                    ?></td>
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