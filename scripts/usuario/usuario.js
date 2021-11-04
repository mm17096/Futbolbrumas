// ------ Validacion del mensaje -------//
function msj() {
    $nuevo = document.getElementById("nuevo").value;
    setTimeout(function () {
        document.getElementById("msjsuccess").style.display = 'none';
    }, 3500);

    valcontrasenia();
    if ($nuevo == 1) {
        abrirmodal();
    }
}

function abrirmodal() {
    $id = document.getElementById("id").value;

    var datos = { "action": "modificarnuevo", "id": $id }
    $respuesta = $.ajax({
        dataType: "json",
        method: "POST",
        url: '../controller/usuario_controller.php',
        data: datos,
    }).done(function (json) {
        console.log("EL consultar especifico", json);
        if (json[0] == "Exito") {
            $("#modalperfil").modal('show');
        }
    }).fail(function (json) {

    }).always(function (json) {

    });
}

// ------- Validacion de Correo esta completo----- //
function validarcorreo() {
    $correo = document.getElementById("correo").value;

    if (/^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail)\.(?:|com|es)+$/.test($correo)) {
        validarcorreobase();
    } else {
        $("#fullcorreo").val("");
        setTimeout(function () {
            $(".mensajecorreo").fadeIn(1500);
        }, 100);

        setTimeout(function () {
            $(".mensajecorreo").fadeOut(1500);
        }, 3500);
        verificarboton();
    }
};


//--- Validar si el correo esta en la base de datos ---//
function validarcorreobase() {
    $correo = document.getElementById("correo").value;
    $correo2 = document.getElementById("correoact").value;

    if ($correo != $correo2) {
        var datos = { "action": "verificarcorreo", "correo": $correo }
        $respuesta = $.ajax({
            dataType: "json",
            method: "POST",
            url: '../controller/usuario_controller.php',
            data: datos,
        }).done(function (json) {
            //console.log("EL consultar especifico", json);
            if (json[0] == "Exito") {
                $("#fullcorreo").val("validado");
                verificarboton();
            } else if (json[0] == "Error") {
                $("#fullcorreo").val("");
                document.getElementById("correo").value = "";
                verificarboton();
                setTimeout(function () {
                    $(".mensajecorreoexiste").fadeIn(1500);
                }, 100);

                setTimeout(function () {
                    $(".mensajecorreoexiste").fadeOut(1500);
                }, 3500);
            }
        }).fail(function (json) {

        }).always(function (json) {

        });
    } else {
        $("#fullcorreo").val("validado");
        verificarboton();
    }
};

// ------- Validacion de Usuario esta completo----- //
function validarusuario() {
    $usuario = document.getElementById("usuario").value;

    if ($usuario != "") {
        validarusuariobase();
    } else {
        $("#fullusuario").val("");
        setTimeout(function () {
            $(".mensajeusuario").fadeIn(1500);
        }, 100);

        setTimeout(function () {
            $(".mensajeusuario").fadeOut(1500);
        }, 3500);
        verificarboton();
    }
};

//--- Validar si el usuario esta en la base de datos ---//
function validarusuariobase() {
    $usuario = document.getElementById("usuario").value;
    $usuario2 = document.getElementById("usuarioact").value;

    if ($usuario != $usuario2) {
        var datos = { "action": "verificarusuario", "usuario": $usuario }
        $respuesta = $.ajax({
            dataType: "json",
            method: "POST",
            url: '../controller/usuario_controller.php',
            data: datos,
        }).done(function (json) {
            //console.log("EL consultar especifico", json);
            if (json[0] == "Exito") {
                $("#fullusuario").val("validado");
                verificarboton();
            } else if (json[0] == "Error") {
                $("#fullusuario").val("");
                document.getElementById("usuario").value = "";
                verificarboton();
                setTimeout(function () {
                    $(".mensajeusuarioexiste").fadeIn(1500);
                }, 100);

                setTimeout(function () {
                    $(".mensajeusuarioexiste").fadeOut(1500);
                }, 3500);
            }
        }).fail(function (json) {

        }).always(function (json) {

        });
    } else {
        $("#fullusuario").val("validado");
        verificarboton();
    }
};

//------ Validacion de la contrasenia --------//
function valcontrasenia() {
    var mayus = new RegExp("^(?=.*[A-Z])");
    var special = new RegExp("^(?=.*[!@#$%&*-])");
    var numbers = new RegExp("(?=.*[0-9])");
    var lower = new RegExp("(?=.*[a-z])");
    var len = new RegExp("(?=.{8,})");

    var clave = document.getElementById("clave").value;
    var check = 0;

    var regExp = [mayus, special, numbers, lower, len];

    if (clave != "") {
        for (var i = 0; i < 5; i++) {
            if (regExp[i].test(clave)) {
                check++;
            } else {

            }
        }
        //console.log(check);

        if (check >= 0 && check <= 2) {
            $("#mensajepass").text('Muy Insegura').css('color', 'red');
        } else if (check >= 3 && check <= 4) {
            $("#mensajepass").text('Poco Segura').css('color', 'orange');
        } else if (check == 5) {
            $("#mensajepass").text('Muy Segura').css('color', 'green');
        }
    }
}

function valcontraseniaconfir() {
    var mayus = new RegExp("^(?=.*[A-Z])");
    var special = new RegExp("^(?=.*[!@#$%&*-])");
    var numbers = new RegExp("(?=.*[0-9])");
    var lower = new RegExp("(?=.*[a-z])");
    var len = new RegExp("(?=.{8,})");

    var clave = document.getElementById("clave2").value;
    var check = 0;

    var regExp = [mayus, special, numbers, lower, len];

    if (clave != "") {
        for (var i = 0; i < 5; i++) {
            if (regExp[i].test(clave)) {
                check++;
            } else {

            }
        }

        //console.log(check);

        if (check >= 0 && check <= 2) {
            $("#mensajepassconfir").text('Muy Insegura').css('color', 'red');
        } else if (check >= 3 && check <= 4) {
            $("#mensajepassconfir").text('Poco Segura').css('color', 'orange');
        } else if (check == 5) {
            $("#mensajepassconfir").text('Muy Segura').css('color', 'green');
        }
    }
}

function verificarpass() {
    var clave = document.getElementById("clave").value;
    var clave2 = document.getElementById("clave2").value;

    if (clave == clave2) {
        $('#fullclave2').val('validado');
        $("#mensajepassconfir").text('Confirmada').css('color', 'blue');
        verificarboton();
    } else {
        document.getElementById("clave2").value = "";
        $('#fullclave2').val('');
        $("#mensajepassconfir").text('Contrasenia no coincide').css('color', 'red');
        verificarboton();
    }
}

//------  Validacion del Boton agregar ------//
function verificarboton() {
    $usuario = document.getElementById("fullusuario").value;
    $correo = document.getElementById("fullcorreo").value;
    $clave = document.getElementById("fullclave").value;
    $clave2 = document.getElementById("fullclave2").value;

    if ($usuario == 'validado' && $clave == 'validado' && $clave2 == 'validado' && $correo == 'validado') {
        $("#btnact").removeAttr("disabled");
    } else {
        $("#btnact").attr("disabled", "disabled");
    }

};
