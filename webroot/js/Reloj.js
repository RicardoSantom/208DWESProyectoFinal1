/**
 * Crear dentro de vuestra aplicación final,un reloj con la hora actual donde los números serán imágenes 
 * o gifs sacados de internet.
 */

//Gurdado de fecha actual en variable
var horaActual = new Date();
//-----------HORAS-------------
/**
 * Las variables que comienzan por 'decena' guardan la parte entera de
 * dividir las horas, minutos y segundos entre 10.
 * Las variables que comienzan por 'unidad' guardan el resto de
 * dividir las horas, minutos y segundos entre 10.
 */
var decenaHoras = parseInt((horaActual.getHours()) / 10);
var unidadHoras = horaActual.getHours() % 10;
//-----------MINUTOS-------------
var decenaMinutos = parseInt((horaActual.getMinutes()) / 10);
var unidadMinutos = horaActual.getMinutes() % 10;
//-----------SEGUNDOS-------------
var decenaSegundos = parseInt((horaActual.getSeconds()) / 10);
var unidadSegundos = horaActual.getSeconds() % 10;
//Creación de bloque contenedor para el reloj y guardado en su correspondiente variable
var divReloj = document.createElement("div");
//Añadido del elemento div como hijo de la etiquetafooter
document.getElementsByTagName("footer")[0].append(divReloj);
//Estableciendo atributo identificador 'id' con valor 'divReloj'
divReloj.setAttribute("id", "divReloj");
/**
 * Creación de un elemento imagen para cada uno de los dígitos y los dos puntos separadores
 */
var dosPuntos = document.createElement("img");
var dosPuntos2 = document.createElement("img");
var horaDerecho = document.createElement("img");
var horaIzquierdo = document.createElement("img");
var minutoDerecho = document.createElement("img");
var minutoIzquierdo = document.createElement("img");
var segundoDerecho = document.createElement("img");
var segundoIzquierdo = document.createElement("img");
//Añadido de las etiquetas imagen como hijos del bloque div
divReloj.append(horaIzquierdo, horaDerecho, dosPuntos, minutoIzquierdo, minutoDerecho,
        dosPuntos2, segundoIzquierdo, segundoDerecho);
//Variable con el comienzo de la ruta donde se alojan las imágenes.
//Si la ruta cambiara para todas las imágenes, bastaría con cambiar esta variable
var ruta = "webroot/media/img/";
//Añadido de atributos de origen de las imágenes de dos puntos y texto alternativo
//con el valor del dígito de la hora para todos los elementos img
//--------------------PUNTOS----------------------
dosPuntos2.setAttribute("src", ruta.concat("puntos.gif"));
dosPuntos2.setAttribute("alt", " : ");
dosPuntos2.setAttribute("class", "puntos");
dosPuntos.setAttribute("src", ruta.concat("puntos.gif"));
dosPuntos.setAttribute("alt", " : ");
dosPuntos.setAttribute("class", "puntos");
//---------------------HORAS----------------------
horaDerecho.setAttribute("alt", unidadHoras);
horaIzquierdo.setAttribute("alt", decenaHoras);
//---------------------MINUTOS----------------------
minutoDerecho.setAttribute("alt", unidadMinutos);
minutoIzquierdo.setAttribute("alt", decenaMinutos);
//---------------------SEGUNDOS----------------------
segundoDerecho.setAttribute("alt", unidadSegundos);
segundoIzquierdo.setAttribute("alt", decenaSegundos);
/**
 * Función que re-calcula de la hora actual y actualiza
 *  de los dígitos para horas, minutos y segundos.
 * A continuación, cambia el valor del elemento 'src' de la imagen 
 * concatenando la ruta con el valor calculado para el dígito y que
 * he establecido como nombre del archivo
 */
function actualizarReloj() {
    //Actualización de hora
    horaActual = new Date();
    //Actualización de cada uno de los dígitos
    //-----------HORAS-------------
    decenaHoras = parseInt((horaActual.getHours()) / 10);
    unidadHoras = horaActual.getHours() % 10;
    //-----------MINUTOS-------------
    decenaMinutos = parseInt((horaActual.getMinutes()) / 10);
    unidadMinutos = horaActual.getMinutes() % 10;
    //-----------SEGUNDOS-------------
    decenaSegundos = parseInt((horaActual.getSeconds()) / 10);
    unidadSegundos = horaActual.getSeconds() % 10;
    //Cambio de atributo alt
    horaDerecho.setAttribute("alt", unidadHoras);
    horaIzquierdo.setAttribute("alt", decenaHoras);
//---------------------MINUTOS----------------------
    minutoDerecho.setAttribute("alt", unidadMinutos);
    minutoIzquierdo.setAttribute("alt", decenaMinutos);
//---------------------SEGUNDOS----------------------
    segundoDerecho.setAttribute("alt", unidadSegundos);
    segundoIzquierdo.setAttribute("alt", decenaSegundos);
    //Cambio de atributo src
    //---------------------HORAS----------------------
    horaIzquierdo.setAttribute("src", ruta.concat(decenaHoras, ".jpg"));
    horaDerecho.setAttribute("src", ruta.concat(unidadHoras, ".jpg"));
    //---------------------MINUTOS----------------------
    minutoIzquierdo.setAttribute("src", ruta.concat(decenaMinutos, ".jpg"));
    minutoDerecho.setAttribute("src", ruta.concat(unidadMinutos, ".jpg"));
    //---------------------SEGUNDOS----------------------
    segundoIzquierdo.setAttribute("src", ruta.concat(decenaSegundos, ".jpg"));
    segundoDerecho.setAttribute("src", ruta.concat(unidadSegundos, ".jpg"));
}
/**
 * Función con intervalo que actualiza el reloj cada 1000 mili-segundos
 * ejecutando la anterior función 'actualizarReloj'.
 */
var intervalo = setInterval(() => {
    actualizarReloj();
}, 1000);