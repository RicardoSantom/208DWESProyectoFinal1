let body = document.getElementsByTagName("footer")[0];
let reloj = document.createElement("div");
reloj.setAttribute("id", "numeros");
body.appendChild(reloj);
//Primeros digitos
let primeraImagen = document.createElement("img");
primeraImagen.setAttribute("id", "hora1");
reloj.appendChild(primeraImagen);

let segundaImagen = document.createElement("img");
segundaImagen.setAttribute("id", "hora2");
reloj.appendChild(segundaImagen);

let primerCaracter = document.createElement("span");
primerCaracter.setAttribute("class", "puntos");
primerCaracter.innerHTML = ":";
reloj.appendChild(primerCaracter);

//Segundos digitos
let terceraImagen = document.createElement("img");
terceraImagen.setAttribute("id", "minuto1");
reloj.appendChild(terceraImagen);

let cuartaImagen = document.createElement("img");
cuartaImagen.setAttribute("id", "minuto2");
reloj.appendChild(cuartaImagen);

let primerCaracter_2 = document.createElement("span");
primerCaracter_2.setAttribute("class", "puntos");
primerCaracter_2.innerHTML = ":";
reloj.appendChild(primerCaracter_2);

//Terceros digitos
let quintaImagen = document.createElement("img");
quintaImagen.setAttribute("id", "segundo1");
reloj.appendChild(quintaImagen);

let sextaImagen = document.createElement("img");
sextaImagen.setAttribute("id", "segundo2");
reloj.appendChild(sextaImagen);

var intervalo = setInterval("actualizar_reloj()", 1000);
function actualizar_reloj() {
    var aImagenes = ['webroot/media/numeros/0.png', 'webroot/media/numeros/1.png', 'webroot/media/numeros/2.png', 'webroot/media/numeros/3.png', 'webroot/media/numeros/4.png', 'webroot/media/numeros/5.png', 'webroot/media/numeros/6.png', 'webroot/media/numeros/7.png', 'webroot/media/numeros/8.png', 'webroot/media/numeros/9.png'];
    var fechaActual = new Date();

    //Horas
    var horas = fechaActual.getHours();
    var horaIzquierda = Math.floor(horas / 10);
    var horaDerecha = horas % 10;

    document.getElementById("hora1").setAttribute("src", aImagenes[horaIzquierda]);
    document.getElementById("hora2").setAttribute("src", aImagenes[horaDerecha]);

    //Minutos 
    var minutos = fechaActual.getMinutes();
    var minutoIzquierda = Math.floor(minutos / 10);
    var minutoDerecha = minutos % 10;

    document.getElementById("minuto1").setAttribute("src", aImagenes[minutoIzquierda]);
    document.getElementById("minuto2").setAttribute("src", aImagenes[minutoDerecha]);

    //Segundos
    var segundos = fechaActual.getSeconds();
    var segundoIzquierda = Math.floor(segundos / 10);
    var segundoDerecha = segundos % 10;

    document.getElementById("segundo1").setAttribute("src", aImagenes[segundoIzquierda]);
    document.getElementById("segundo2").setAttribute("src", aImagenes[segundoDerecha]);
}