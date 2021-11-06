cargartabla();

//--------------- Metodos de mensaje ---------------//
function msj() {

  setTimeout(function () {
    document.getElementById("msjsuccess").style.display = 'none';
  }, 3500);

  setTimeout(function () {
    document.getElementById("msjerror").style.display = 'none';
  }, 3500);

};
//--------------- Metodos de mensaje ---------------//


//--------------- Cargar tabla --------------------//

function cargartabla() {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

      document.getElementById("tablarepresentante").innerHTML = xmlhttp.responseText;
      $('#tbrepresentante').DataTable();
    }
  }
  xmlhttp.open("GET", "../views/tb_representantes.php", true);
  xmlhttp.send();
};

//--------------- Cargar tabla --------------------//


//-------------------- Guardar Representante --------------------//
function agregarRepresentante() {
  var parametros = $("#addRepresentante").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/representante_controller.php?action=guardar",
    data: parametros,
    success: function (datos) {
      //$("#resultados").html(datos);
      $("#nombre").val("");
      $("#apellido").val("");
      $("#dui").val("");
      $("#correo").val("");
      $("#sexo").val("");
      $("#date").val("");
      $("#telefono").val("");
      $('#modalguardarR').modal('hide');
    }
  });

};
//-------------------- Guardar Representante --------------------//


//-------------------- Modificar Representante -----------------//
function modificarRepresentante() {
  var parametros = $("#updateRepresentante").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/representante_controller.php?action=actualizar",
    data: parametros,
    success: function (datos) {
      //$("#resultados").html(datos);
      $("#nombre_update").val("");
      $("#apellido_update").val("");
      $("#dui_update").val("");
      $("#sexo_update").val("");
      $("#date_update").val("");
      $("#telefono_update").val("");
      $('#modalmodificarR').modal('hide');
    }
  });

};
//-------------------- Modificar Representante -----------------//


//-------------------- Abrir Modal Editar Reresentante ---------//
function abrirmodalEditar() {
  $('#modalmodificarR').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var nombre = button.data('nombre')
    $('#nombre_update').val(nombre)
    $('#fullnombreedit').val("validado")
    
    var apellido = button.data('apellido')
    $('#apellido_update').val(apellido)
    $('#fullapellidoedit').val("validado")

    var dui = button.data('dui')
    $('#dui_update').val(dui)
    $('#duiactedit').val(dui)
    $('#fullduiedit').val("validado")

    var sexo = button.data('sexo')
    $('#sexo_update').val(sexo);
    $('#fullsexoedit').val("validado")

    var fecha = button.data('fecha')
    $('#date_update').val(fecha)
    $('#fulldateedit').val("validado")

    var telefono = button.data('telefono')
    $('#telefono_update').val(telefono)
    $('#fullteledit').val("validado")

    var estado = button.data('estado')
    $('#estado').val(estado)

    verificarbotonEdit();
  });
};
//-------------------- Abrir Modal Editar Reresentante ---------//


//---------------- Abrir Modal Dar de Baja Reresentante --------//
function abrirmodaldeBaja() {
  $('#DeBajaRepresentante').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#dui_baja').val(id)
  })
};
//---------------- Abrir Modal Dar de Baja Reresentante --------//


//----------------- Dar de baja Representante ------------------//
function debajaRepresentante() {
  var parametros = $("#bajaRepresentante").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/representante_controller.php?action=debaja",
    data: parametros,
    success: function (datos) {
      //$("#resultados").html(datos);
      $('#DeBajaRepresentante').modal('hide');
    }
  });
};
//----------------- Dar de baja Representante ------------------//


//---------------- Abrir Modal Dar de Baja Reresentante --------//
function abrirmodaldeAlta() {
  $('#DeAltaRepresentante').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#dui_alta').val(id)
  })
};
//---------------- Abrir Modal Dar de Baja Reresentante --------//


//---------------- Dar de alta representante -------------------//
function dealtaRepresentante() {
  var datos = $("#altaRepresentante").serialize();

  $.ajax({
    dataType: "json",
    method: "POST",
    url: '../controller/representante_controller.php?action=dealta',
    data: datos,
  }).done(function (json) {
    if (json[0] == "Exito") {
      $("#DeAltaRepresentante").modal('hide');
      cargartabla();
    }
  }).fail(function (json) {

  }).always(function (json) {

  });

};
//---------------- Dar de alta representante -------------------//


//---------------- MODAL DE MOSTRAR EQUIPOS -------------------//
function mostrarEquipos() {
  $('#modalEquipos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var dui = button.data('dui')

    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        document.getElementById("tablaEquipos").innerHTML = xmlhttp.responseText;
        cargarpaginacion();
      }
    }
    xmlhttp.open("GET", "../views/tablas/tb_tablaEquipos.php?id=" + dui, true);
    xmlhttp.send();

  });
};

function cargarpaginacion() {
  $('#example1').DataTable();
};
//---------------- MODAL DE MOSTRAR EQUIPOS -------------------//


// ---- Validacion de Telefono con respecto al '-'---- //
function validacionTelefono() {
  $telefono = document.getElementById("telefono").value;
  $validado = document.getElementById("telefonovalidado").value;

  if ($telefono.length == 4 && $validado == "") {
    console.log("validando Telefono");
    $telefono = $telefono + "-";
    //console.log($telefono);
    $("#telefono").val($telefono);
    $("#telefonovalidado").val("validado");
  } else if ($telefono.length <= 4 && $validado != "") {
    $("#telefonovalidado").val("");
  }
};
// ---- Validacion de Telefono con respecto al '-'---- //


// ------ Verificacion si el telefono esta completo ------//
function validarTelfinal() {
  $telefono = document.getElementById("telefono").value;

  if ($telefono.length == 9) {
    $("#fulltel").val("validado");
    verificarboton();
  } else {
    $("#fulltel").val("");
    setTimeout(function () {
      $(".mensajetel").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajetel").fadeOut(1500);
    }, 3000);
    verificarboton();
  }
};
// ------ Verificacion si el telefono esta completo ------//


// ---- Validacion de DUI con respecto al '-'---- //
function validacionDui() {
  $dui = document.getElementById("dui").value;
  $validadodui = document.getElementById("duivalidado").value;

  if ($dui.length == 8 && $validadodui == "") {
    //console.log("validando DUI");
    $dui = $dui + "-";
    //console.log($dui);
    $("#dui").val($dui);
    $("#duivalidado").val("validado");
  } else if ($dui.length <= 8 && $validadodui != "") {
    $("#duivalidado").val("");
  }
};
// ---- Validacion de DUI con respecto al '-'---- //


// ------ Verificacion si el DUI esta completo ------//
function validarDuifinal() {
  $dui = document.getElementById("dui").value;

  if ($dui.length == 10) {
    validarduibase();
  } else {
    $("#fulldui").val("");
    setTimeout(function () {
      $(".mensajedui").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajedui").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
// ------ Verificacion si el DUI esta completo ------//


//--- Validar si el DUI esta en la base de datos ---//
function validarduibase() {
  $dui = document.getElementById("dui").value;
  
  var datos = { "action": "verificardui", "dui": $dui }
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: '../controller/representante_controller.php',
    data: datos,
  }).done(function (json) {
    //console.log("EL consultar especifico", json);
    if (json[0] == "Exito") {
      $("#fulldui").val("validado");
      verificarboton();
    } else if (json[0] == "Error") {
      $("#fulldui").val("");
      document.getElementById("dui").value = "";
      setTimeout(function () {
        $(".mensajeduiexiste").fadeIn(1500);
      }, 100);

      setTimeout(function () {
        $(".mensajeduiexiste").fadeOut(1500);
      }, 3500);
      verificarboton();
    }
  }).fail(function (json) {

  }).always(function (json) {

  });
};
//--- Validar si el DUI esta en la base de datos ---//


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
// ------- Validacion de Correo esta completo----- //


//--- Validar si el correo esta en la base de datos ---//
function validarcorreobase() {
  $correo = document.getElementById("correo").value;

  var datos = { "action": "verificarcorreo", "correo": $correo }
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: '../controller/representante_controller.php',
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
};
//--- Validar si el correo esta en la base de datos ---//


//-------- Validacion de Fecha ------//
function validarfecha() {
  $today = new Date();
  $fecha = document.getElementById("date").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;

  if ($edad >= 18) {
    $("#fulldate").val("validado");
    verificarboton();
  } else {
    document.getElementById("date").value = "";
    $("#fulldate").val("");
    setTimeout(function () {
      $(".mensajefecha").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajefecha").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//-------- Validacion de Fecha ------//


//------  Validacion del Sexo ------//
function validarsexo() {
  $sexo = document.getElementById("sexo").value;

  if ($sexo == 'Masculino' || $sexo == 'Femenino') {
    $("#fullsexo").val("validado");
    verificarboton();
  } else {
    $("#fullsexo").val("");
    setTimeout(function () {
      $(".mensajesexo").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajesexo").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//------  Validacion del Sexo ------//


//------  Validacion del Nombre ------//
function validarnombre() {
  $nombre = document.getElementById("nombre").value;

  if ($nombre != '') {
    $("#fullnombre").val("validado");
    verificarboton();
  } else {
    $("#fullnombre").val("");
    setTimeout(function () {
      $(".mensajenombre").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajenombre").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//------  Validacion del Nombre ------//


//------  Validacion del Apellido ------//
function validarapellido() {
  $apellido = document.getElementById("apellido").value;

  if ($apellido != '' && $apellido.length >= 4) {
    $("#fullapellido").val("validado");
    verificarboton();
  } else {
    $("#fullapellido").val("");
    setTimeout(function () {
      $(".mensajeapellido").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajeapellido").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//------  Validacion del Apellido ------//


//------  Validacion del Boton agregar ------//
function verificarboton() {
  $nombre = document.getElementById("fullnombre").value;
  $apellido = document.getElementById("fullapellido").value;
  $dui = document.getElementById("fulldui").value;
  $correo = document.getElementById("fullcorreo").value;
  $sexo = document.getElementById("fullsexo").value;
  $fecha = document.getElementById("fulldate").value;
  $telefono = document.getElementById("fulltel").value;

  if ($dui == 'validado' && $sexo == 'validado' && $correo == 'validado' && $fecha == 'validado' && 
  $telefono == 'validado' && $nombre == 'validado' && $apellido == 'validado') {
    $("#btng").removeAttr("disabled");
  } else {
    $("#btng").attr("disabled", "disabled");
  }

};
//------  Validacion del Boton agregar ------//


///// --------------- Parte Funciones Campos Editables ---------------- /////

//------  Validacion del Nombre ------//
function validarnombreEdit() {
  $nombre = document.getElementById("nombre_update").value;

  if ($nombre != '') {
    $("#fullnombreedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullnombreedit").val("");
    setTimeout(function () {
      $(".mensajenombreedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajenombreedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del Nombre ------//


//------  Validacion del Apellido ------//
function validarapellidoEdit() {
  $apellido = document.getElementById("apellido_update").value;

  if ($apellido != '') {
    $("#fullapellidoedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullapellidoedit").val("");
    setTimeout(function () {
      $(".mensajeapellidoedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajeapellidoedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del Apellido ------//


// ---- Validacion de Telefono Editable ---- //
function validacionTelefonoEdit() {
  $telefono = document.getElementById("telefono_update").value;
  $validado = document.getElementById("telefonovalidado_update").value;

  if ($telefono.length == 4 && $validado == "") {
    console.log("validando Telefono");
    $telefono = $telefono + "-";
    //console.log($telefono);
    $("#telefono_update").val($telefono);
    $("#telefonovalidado_update").val("validado");
  } else if ($telefono.length <= 4 && $validado != "") {
    $("#telefonovalidado_update").val("");
  }
};
// ---- Validacion de Telefono Editable ---- //


// ---- Validacion de DUI Editable---- //
function validacionDuiEdit() {
  $dui = document.getElementById("dui_update").value;
  $validadodui = document.getElementById("duivalidado_update").value;

  if ($dui.length == 8 && $validadodui == "") {
    //console.log("validando DUI");
    $dui = $dui + "-";
    //console.log($dui);
    $("#dui_update").val($dui);
    $("#duivalidado_update").val("validado");
  } else if ($dui.length <= 8 && $validadodui != "") {
    $("#duivalidado_update").val("");
  }
};
// ---- Validacion de DUI Editable---- //


// ------ Verificacion si el DUI esta completo ------//
function validarDuifinalEdit() {
  $dui = document.getElementById("dui_update").value;

  if ($dui.length == 10) {
    validarduibaseEdit();
  } else {
    $("#fullduiedit").val("");
    setTimeout(function () {
      $(".mensajeduiedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajeduiedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
// ------ Verificacion si el DUI esta completo ------//


//--- Validar si el DUI esta en la base de datos ---//
function validarduibaseEdit() {
  $dui = document.getElementById("dui_update").value;
  
  var datos = { "action": "verificardui", "dui": $dui }
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: '../controller/representante_controller.php',
    data: datos,
  }).done(function (json) {
    //console.log("EL consultar especifico", json);
    if (json[0] == "Exito") {
      $("#fullduiedit").val("validado");
      verificarbotonEdit();
    } else if (json[0] == "Error") {
      $("#fullduiedit").val("");
      document.getElementById("dui_update").value = "";
      setTimeout(function () {
        $(".mensajeduiexisteedit").fadeIn(1500);
      }, 100);

      setTimeout(function () {
        $(".mensajeduiexisteedit").fadeOut(1500);
      }, 3500);
      verificarbotonEdit();
    }
  }).fail(function (json) {
    
  }).always(function (json) {

  });
};
//--- Validar si el DUI esta en la base de datos ---//


//------  Validacion del Sexo ------//
function validarsexoEdit() {
  $sexo = document.getElementById("sexo_update").value;

  if ($sexo == 'Masculino' || $sexo == 'Femenino') {
    $("#fullsexoedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullsexoedit").val("");
    setTimeout(function () {
      $(".mensajesexoedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajesexoedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del Sexo ------//


//-------- Validacion de Fecha ------//
function validarfechaEdit() {
  $today = new Date();
  $fecha = document.getElementById("date_update").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;

  if ($edad >= 18) {
    $("#fulldateedit").val("validado");
    verificarbotonEdit();
  } else {
    document.getElementById("date_update").value = "";
    $("#fulldateedit").val("");
    setTimeout(function () {
      $(".mensajefechaedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajefechaedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//-------- Validacion de Fecha ------//


// ---- Validacion de Telefono con respecto al '-'---- //
function validacionTelefonoEdit() {
  $telefono = document.getElementById("telefono_update").value;
  $validado = document.getElementById("telefonovalidado_update").value;

  if ($telefono.length == 4 && $validado == "") {
    //console.log("validando Telefono");
    $telefono = $telefono + "-";
    //console.log($telefono);
    $("#telefono_update").val($telefono);
    $("#telefonovalidado_update").val("validado");
  } else if ($telefono.length <= 4 && $validado != "") {
    $("#telefonovalidado_update").val("");
  }
};
// ---- Validacion de Telefono con respecto al '-'---- //


// ------ Verificacion si el telefono esta completo ------//
function validarTelfinalEdit() {
  $telefono = document.getElementById("telefono_update").value;

  if ($telefono.length == 9) {
    $("#fullteledit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullteledit").val("");
    setTimeout(function () {
      $(".mensajeteledit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajeteledit").fadeOut(1500);
    }, 3000);
    verificarbotonEdit();
  }
};
// ------ Verificacion si el telefono esta completo ------//


//------  Validacion del Boton agregar ------//
function verificarbotonEdit() {
  $nombre = document.getElementById("fullnombreedit").value;
  $apellido = document.getElementById("fullapellidoedit").value;
  $dui = document.getElementById("fullduiedit").value;
  $sexo = document.getElementById("fullsexoedit").value;
  $fecha = document.getElementById("fulldateedit").value;
  $telefono = document.getElementById("fullteledit").value;

  if ($dui == 'validado' && $sexo == 'validado' && $fecha == 'validado' && 
  $telefono == 'validado' && $nombre == 'validado' && $apellido == 'validado') {
    $("#btngedit").removeAttr("disabled");
  } else {
    $("#btngedit").attr("disabled", "disabled");
  }

};
//------  Validacion del Boton agregar ------//


// ---- Validacion de Campos de tipo texto ---- //
function soloLetras(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
};
// ---- Validacion de Campos de tipo texto ---- //


// ---- Validacion de Campos de tipo numericos ---- //
function soloNumeros(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    numeros = "0123456789",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
};
// ---- Validacion de Campos de tipo numericos ---- //


///// --------------- Parte Funciones Campos Editables ---------------- /////


/*
// ---- Validacion de Datos finales ---- //
function validaciondatosupdate() {

  $today = new Date();
  $fecha = document.getElementById("date_update").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;

  if ($edad >= 18) {
    modificarRepresentante();
  } else {
    document.getElementById("date_update").value = "";
    alert('No se permite la modificacion, la edad debe ser mayor o igual a 18');
  }
};
*/

//--------------- Validaciones y Otros-----------------//

/*function mensaje(){
  $mensaje = document.getElementById("mensaje").value;
  console.log($mensaje);
  if($mensaje == 'exito'){
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Registro Exitoso!',
      showConfirmButton: false,
      timer: 1500
  })
  }else if($mensaje == 'error'){
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Registro no completado...',
      showConfirmButton: false,
      timer: 1500
  })
  }
}
*/

/*
function validaciondatos() {

  $today = new Date();
  $fecha = document.getElementById("date").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;
  if ($edad >= 18) {
    agregarRepresentante();
  } else {
    document.getElementById("date").value = "";
  }
};
*/