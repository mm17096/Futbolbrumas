//--------------- Metodos de crup ---------------//
function msj() {

    if(isset($_SESSION['identidad']) && isset($_SESSION['usuario']) && isset($_SESSION['action_login']) && $_SESSION['action_login'] == 'completo'){
      alert('Sesion activa');
      setTimeout(function () {
        document.getElementById("msjsuccess").style.display = 'none';
      }, 3500);
    
      setTimeout(function () {
        document.getElementById("msjerror").style.display = 'none';
      }, 3500);
    }else{
      alert('Activar sesion');
      window.location = "index.php";
    }
};



//Guardar Representante
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

function dealtaRepresentante() {
  var parametros = $("#altaRepresentante").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/representante_controller.php?action=dealta",
    data: parametros,
    success: function (datos) {
      //$("#resultados").html(datos);
      $('#DeAltaRepresentante').modal('hide');

    }
  });
};

//Abrir Modal Editar Reresentante
function abrirmodalEditar() {
  $('#modalmodificarR').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var nombre = button.data('nombre')
    $('#nombre_update').val(nombre)

    var apellido = button.data('apellido')
    $('#apellido_update').val(apellido)

    var dui = button.data('dui')
    $('#dui_update').val(dui)

    var sexo = button.data('sexo')
    $('#sexo_update').val(sexo);

    var fecha = button.data('fecha')
    $('#date_update').val(fecha)

    var telefono = button.data('telefono')
    $('#telefono_update').val(telefono)

    var estado = button.data('estado')
    $('#estado').val(estado)

  });
};

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
}

//Abrir Modal Dar de Baja Reresentante
function abrirmodaldeBaja() {
  $('#DeBajaRepresentante').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#dui_baja').val(id)
  })
};

//Abrir Modal Dar de Baja Reresentante
function abrirmodaldeAlta() {
  $('#DeAltaRepresentante').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#dui_alta').val(id)
  })
};

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

// ---- Validacion de Telefono ---- //
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

function validarTelfinal() {
  $telefono = document.getElementById("telefono").value;

  if ($telefono.length == 9) {
    $("#fulltel").val("validado");
    verificarboton();
  }else{
    $("#fulltel").val("");
    setTimeout(function () {
      $(".mensajetel").fadeIn(1500);
    }, 500);

    setTimeout(function () {
      $(".mensajetel").fadeOut(1500);
    }, 3000);
    verificarboton();
  }
};



// ---- Validacion de DUI ---- //

function validacionDui() {
  $dui = document.getElementById("dui").value;
  $validadodui = document.getElementById("duivalidado").value;

  if ($dui.length == 8 && $validadodui == "") {
    console.log("validando DUI");
    $dui = $dui + "-";
    //console.log($dui);
    $("#dui").val($dui);
    $("#duivalidado").val("validado");
  } else if ($dui.length <= 8 && $validadodui != "") {
    $("#duivalidado").val("");
  }
};

function validarDuifinal() {
  $dui = document.getElementById("dui").value;
  if ($dui.length == 10) {
    $("#fulldui").val("validado");
    verificarboton();
  }else{
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

// ------- Validacion de Correo ----- //

function validarcorreo(){
  $correo = document.getElementById("correo").value;

  if (/^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail)\.(?:|com|es)+$/.test($correo)){
    $("#fullcorreo").val("validado");
    verificarboton();
   }else{
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

//-------- Validacion de Fecha ------//

function validarfecha(){
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
  }else{
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

function validarsexo(){
  $sexo = document.getElementById("sexo").value;
 
  if ($sexo == 'Masculino' || $sexo == 'Femenino') {
    $("#fullsexo").val("validado");
    verificarboton();
  }else{
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

function validarnombre(){
  $nombre = document.getElementById("nombre").value;

  if ($nombre != '') {
    $("#fullnombre").val("validado");
    verificarboton();
  }else{
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

function validarapellido(){
  $apellido = document.getElementById("apellido").value;
 
  if ($apellido != '') {
    $("#fullapellido").val("validado");
    verificarboton();
  }else{
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

function verificarboton(){
  $nombre = document.getElementById("fullnombre").value;
  $apellido = document.getElementById("fullapellido").value;
  $dui = document.getElementById("fulldui").value;
  $correo = document.getElementById("fullcorreo").value;
  $sexo = document.getElementById("fullsexo").value;
  $fecha = document.getElementById("fulldate").value;
  $telefono = document.getElementById("fulltel").value;
 
  if($dui == 'validado' && $sexo == 'validado' && $correo == 'validado' && $fecha == 'validado' && $telefono == 'validado' && $nombre == 'validado' && $apellido == 'validado'){
    $("#btng").removeAttr("disabled");
  }else{
    $("#btng").attr("disabled", "disabled");
  }

}

// ---- Validacion de Telefono Editable ---- //
function validacionTelefonoedit() {
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
// ---- Validacion de DUI Editable---- //

function validacionDuiedit() {
  $dui = document.getElementById("dui_update").value;
  $validadodui = document.getElementById("duivalidado_update").value;

  if ($dui.length == 8 && $validadodui == "") {
    console.log("validando DUI");
    $dui = $dui + "-";
    //console.log($dui);
    $("#dui_update").val($dui);
    $("#duivalidado_update").val("validado");
  } else if ($dui.length <= 8 && $validadodui != "") {
    $("#duivalidado_update").val("");
  }
};

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

// ---- Validacion de Datos finales ---- //
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
