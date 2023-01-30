<?php
/**
 * Description Clase sin atributos.Únicamente tiene una funcióm para imprimir
 * con formato tablas con valores de variaables superglobales
 *
 * @author Ricardo Santiago Tomé
 * @since 30/01/2023
 * @version 0.1
 */
class TablasSuperglobales {

    public static function imprimirTablaVariablesSuperGlobales($aVariableSuperglobal, $sNombreVariableSuperGlobal) {
        /**
         * Esta función recibe dos parámetros, con ellos construye una tabla, evalua si el primer parámetro recibido
         * es null o está vacío; en caso de que así sea, devuelve un mensaje impreso por pantalla declarando que
         * no hay nada que mostrar de esta variable superglobal, si no, construye una fila por cada pareja de variable - valor 
         * imprimiendo el valor de cada una de ellas en una celda diferente.
         *  Esta impresión la realiza con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
         * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
         * el primer parámetro, por contra, si está establecido a false si lo mostrará.
         * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
         * @version 1.0
         * @since 05/11/2022
         * @param array $aVariableSuperglobal array que contiene datos de la variable superglobal. Como parámetro la pasamos con el 
         *  identificador de dicha variable superglobal.
         * @param string $sNombreVariableSuperGlobal nombre de la variable superglobal abriendo comillas seguidas por la secuencia
         * de escape \ y a continuación el identificador de la variable supeglobal y para finalizar, cerramos con comillas.
         */
        printf('<table class="tablaGlobales"><caption>%s</caption>', $sNombreVariableSuperGlobal);
        if (is_null($aVariableSuperglobal) || empty($aVariableSuperglobal)) {
            printf('<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal %s está vacía</th></thead>', $sNombreVariableSuperGlobal);
        } else {
            foreach ($aVariableSuperglobal as $nombreSuperglobal => $valorSuperglobal) {
                if ($nombreSuperglobal == '_SESSION') {
                    
                } else {
                    if ($nombreSuperglobal == '_SERVER') {
                        print("<tr>");
                        print '<td>';
                        print($sNombreVariableSuperGlobal);
                        print '</td>';
                        print '<td>';
                        echo '<table class="tablaGlobales">';
                        foreach ($_SERVER as $claveServer => $valorServer) {
                            echo '<tr>';
                            print '<td>';
                            print_r($claveServer);
                            print '</td>';
                            print '<td>';
                            print_r($valorServer);
                            print '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        print '</td>';
                    } else {
                        echo "<tr><th>";
                        print_r($nombreSuperglobal, $booleanoSuperglobal = false) . "</th>";
                        echo "<td>";
                        print_r($valorSuperglobal, $booleanoSuperglobal2 = false) . "</td>";
                        print "</tr>";
                    }
                }
            }
            echo "</table>";
        }
    }

}
