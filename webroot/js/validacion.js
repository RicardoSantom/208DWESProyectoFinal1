window.addEventListener("load", examen);
function examen() {

    var usuario = document.getElementById("usuario");
    var password = document.getElementById("password");
    var repetirPassword = document.getElementById("repetirPassword");
    var descripcion = document.getElementById("descripcion");
    destinoArrastrable = document.querySelector(".resultado");
    num1 = document.getElementById("num1");
    num2 = document.getElementById("num2");
    var botonRegistro = document.getElementById("registro");
    var botonComprobar = document.getElementById("comprobar");
    var captcha = document.getElementById("captcha");
    var formInicioPrivado = document.getElementById("formInicioPrivado");
    var usuarioOK = false;
    var passwordOK = false;
    var repetirPasswordOK = false;
    var descripcionOK = false;
    var enviarDatosOK = false;
    var validarUsuario = /^\w{4,10}$/;
    var validarPassword = /^\w{4,10}$/;
    var validarRepetirPassword = /^\w{4,10}$/;
    var validarDescripcion = /^([a-zA-Z][ ]?){2,60}$/;
    /*************EJERCICIO 1**************/
    usuario.addEventListener("keyup", funcionValidarUsuario);
    function funcionValidarUsuario(e) {
        if (validarUsuario.test(e.target.value)) {
            usuarioOK = true;
            usuario.classList.remove("error");
            usuario.classList.add("correcto");
        } else {
            usuarioOK = false;
            usuario.classList.remove("correcto");
            usuario.classList.add("error");
        }
    }

    password.addEventListener("keyup", funcionValidarPassword);
    function funcionValidarPassword(e) {
        if (validarPassword.test(e.target.value)) {
            passwordOK = true;
            password.classList.remove("error");
            password.classList.add("correcto");
        } else {
            passwordOK = false;
            password.classList.remove("correcto");
            password.classList.add("error");
        }
    }

    repetirPassword.addEventListener("keyup", funcionValidarRepetirPassword);
    function funcionValidarRepetirPassword(e) {
        if (validarRepetirPassword.test(e.target.value) && (password.value == repetirPassword.value)) {
            repetirPasswordOK = true;
            repetirPassword.classList.remove("error");
            repetirPassword.classList.add("correcto");
        } else {
            repetirPasswordOK = false;
            repetirPassword.classList.remove("correcto");
            repetirPassword.classList.add("error");
        }
    }

    descripcion.addEventListener("keyup", funcionValidarDescripcion);
    function funcionValidarDescripcion(e) {
        if (validarDescripcion.test(e.target.value)) {
            descripcionOK = true;
            descripcion.classList.remove("error");
            descripcion.classList.add("correcto");
        } else {
            descripcionOK = false;
            descripcion.classList.remove("correcto");
            descripcion.classList.add("error");
        }
    }
    /********************EJERCICIO 3*************************/
    /*botonRegistro.setAttribute("name","comprobar");
     botonRegistro.setAttribute("value","Comprobar");
     botonRegistro.style.backgroundColor="green";
     var enviarDatosOK = false;
     if(botonRegistro.value=="Comprobar"){
     console.log("prueba value Comprobar");
     }*/
    botonComprobar.addEventListener("click", comprobarCampos);
    function comprobarCampos(ev) {
        ev.preventDefault();
        if (usuarioOK == true && passwordOK == true && repetirPasswordOK == true && descripcionOK == true) {
            enviarDatosOK = true;
        } else {
            enviarDatosOK = false;
            //alert("Ha introducido datos incorrectos");
        }

        if (enviarDatosOK == true) {
            captcha.style.display = "block";
        } else {
            captcha.style.display = "none";
        }
    }

    let botonLimpiar = document.getElementById("cancelar");
    botonLimpiar.addEventListener("click", quitarCaptcha);
    function quitarCaptcha() {
        usuario.classList.remove("correcto");
        usuario.classList.add("error");
        password.classList.remove("correcto");
        password.classList.add("error");
        repetirPassword.classList.remove("correcto");
        repetirPassword.classList.add("error");
        descripcion.classList.remove("correcto");
        descripcion.classList.add("error");
        captcha.style.display = "none";
    }

    /*******************EJERCICIO 4*************************/

    let sumando1 = parseInt(Math.random() * 9);
    let sumando2 = parseInt(Math.random() * 9);
    let resultado = sumando1 + sumando2;
    num1.textContent = sumando1;
    num2.textContent = sumando2;
    let aleatorio1;
    let aleatorio2;

    do {
        aleatorio1 = parseInt(Math.random() * 19);
    } while (aleatorio1 == resultado)

    do {
        aleatorio2 = parseInt(Math.random() * 19);
    } while (aleatorio2 == resultado || aleatorio2 == aleatorio1)

    let arrayAleatorios = [resultado, aleatorio1, aleatorio2];
    //Función sacada de la w3cSchools para ordenar array de manera aleatoria.
    arrayAleatorios.sort(function () {
        return 0.5 - Math.random()
    });
    let sol1 = document.getElementById("sol1");
    let sol2 = document.getElementById("sol2");
    let sol3 = document.getElementById("sol3");
    sol1.textContent = arrayAleatorios[0];
    sol1.setAttribute("draggable", "true");
    sol2.textContent = arrayAleatorios[1];
    sol2.setAttribute("draggable", "true");
    sol3.textContent = arrayAleatorios[2];
    sol3.setAttribute("draggable", "true");

    /**transparentar */
    sol1.addEventListener("dragstart", transparentar);
    sol2.addEventListener("dragstart", transparentar);
    sol3.addEventListener("dragstart", transparentar);
    function transparentar(ev) {
        ev.target.style.opacity = 0.5;
        ev.target.classList.add("arrastrado");
    }
    /**oscurecer */
    sol1.addEventListener("dragend", oscurecer);
    sol2.addEventListener("dragend", oscurecer);
    sol3.addEventListener("dragend", oscurecer);
    function oscurecer(ev) {
        ev.target.style.opacity = 1;
        ev.target.classList.remove("arrastrado");
    }
    /**colorear destino */
    let destino = document.getElementsByClassName("resultado")[0];
    destino.addEventListener("dragenter", colorear);
    function colorear(ev) {
        ev.target.style.backgroundColor = "yellow";
    }
    /**transparentar origen */
    destino.addEventListener("dragleave", abandonar);
    function abandonar(ev) {
        ev.target.style.backgroundColor = "transparent";
    }
    /**comprobar cuentas */
    destinoArrastrable.addEventListener("dragover", regresar);
    function regresar(ev) {
        ev.preventDefault();
    }

    destinoArrastrable.addEventListener("drop", comprobarCuentas);
    function comprobarCuentas(ev) {
        /**identificar arrastrado */
        let elementoArrastrado = document.getElementsByClassName("arrastrado")[0];
        let valorArrastrado = elementoArrastrado.textContent;
        if (parseInt(valorArrastrado) === resultado) {
            ev.target.style.backgroundColor = "green";
            ev.target.textContent = "OK";

            /*********************intervalos************************/
            var pCaptcha = captcha.getElementsByTagName("p")[0];
            var mensajeHappy = document.createElement("p");
            mensajeHappy.style.color="green";
            mensajeHappy.textContent = "ENHORABUENA, NO ERES UN ROBOT";
            //mensajeHappy.setAttributeNode(style = "color:green");
            mensajeEnhorabuena = setTimeout(() => {
                captcha.removeChild(pCaptcha);
                captcha.insertAdjacentElement("afterBegin", mensajeHappy);
            }, 2000);

            enviarForm = setTimeout(() => {                
                botonComprobar.style.display="none";
                botonRegistro.style.display="block";
                /*function () {
                 formInicioPrivado.submit();
                 if (enviarDatosOK === true) {
                 botonRegistro.click();
                 botonRegistro.off("click", comprobarCampos);
                 formInicioPrivado.submit();
                 } else {
                 botonRegistro.click();
                 formInicioPrivado.submit();
                 }
                 }*/
                ;
            }, 4000);

        } else {
            ev.target.style.backgroundColor = "red";
            ev.target.textContent = "NO";
        }
    }

}