ActualizarJugador();
//Guardar jugador
$("#addJugador").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=guardar",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#nombre").val("");
      $("#apellido").val("");
      $("#fechanacimiento").val("");
      $("#numero_camisa").val("");
      $("#posicion").val("");
      $("#idequipo").val("");
      $("#estado").val("");
      $("#modalJ").modal("hide");

      ActualizarJugador();
    },
  });

  event.preventDefault();
});
//validar fecha modal modificar
function validarfechaEdit() {
  $today = new Date();
  $fecha = document.getElementById("fechanacimientoedit").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;

  if ($edad >= 13) {
    $("#fulldate").val("validado");
    verificarboton();
  } else {
    document.getElementById("fechanacimientoedit").value = "";
    $("#fulldate").val("");
    setTimeout(function () {
      $(".mensajefechaEdit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajefechaEdit").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//validar fecha modal guardar
function validarfecha() {
  $today = new Date();
  $fecha = document.getElementById("fechanacimiento").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];

  $year = $year0 + $year1 + $year2 + $year3;

  $edad = $today.getFullYear() - $year;

  if ($edad >= 13) {
    $("#fulldate").val("validado");
    verificarboton();
  } else {
    document.getElementById("fechanacimiento").value = "";
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
//Validacion de campo # camisa EN EL FORMULARIO GUARDAR JUGADOR
function abilitarcamisa() {
  $idequipo = document.getElementById("idequipo").value;
  if ($idequipo != "") {
    $("#numero_camisa").removeAttr("disabled");
  } else {
    $("#numero_camisa").attr("disabled", "disabled");
  }
}

function validarnumero() {
  $equipo = document.getElementById("idequipo").value;
  $camisa = document.getElementById("numero_camisa").value;

  var datos = { action: "verificarcamisa", numero: $camisa, idequipo: $equipo };
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: "../controller/jugador_controller.php",
    data: datos,
  })
    .done(function (json) {
      console.log("EL consultar especifico", json);
      if (json[0] == "Exito") {
          
      } else if (json[0] == "Error") {
        document.getElementById("numero_camisa").value = "";
        setTimeout(function () {
          $(".mensajenuemro").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          $(".mensajenuemro").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
}
//VALIDAR CAMISA DEL FORMULARIO EDITAR JUGADOR
function abilitarcamisaEdit() {
  $idequipo = document.getElementById("equipoedit").value;
  if ($idequipo != "") {
    $("#numerocamisaedit").removeAttr("disabled");
  } else {
    $("#numerocamisaedit").attr("disabled", "disabled");
  }
}

function validarnumeroEdit() {
  $equipo = document.getElementById("equipoedit").value;
  $camisa = document.getElementById("numerocamisaedit").value;

  var datos = { action: "verificarcamisaEdit", numero: $camisa, equipoedit: $equipo };
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: "../controller/jugador_controller.php",
    data: datos,
  })
    .done(function (json) {
      console.log("EL consultar especifico", json);
      if (json[0] == "Exito") {
          
      } else if (json[0] == "Error") {
        document.getElementById("numerocamisaedit").value = "";
        setTimeout(function () {
          $(".mensajenumeroedit").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          $(".mensajenumeroedit").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
}

//Abrir Modal Editar Jugador
$("#editJugadorModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("idjugador");
  var nombre = button.data("nombre");
  var apellido = button.data("apellido");
  var fechanacimiento = button.data("fechanacimiento");
  var numerodecamisa = button.data("numerodecamisa");
  var posicion = button.data("posicion");
  var estado = button.data("estado");
  var equipo = button.data("equipo");

  $("#id_edit").val(id);
  $("#nombreedit").val(nombre);
  $("#apellidoedit").val(apellido);
  $("#fechanacimientoedit").val(fechanacimiento);
  $("#numerocamisaedit").val(numerodecamisa);
  $("#posicionedit").val(posicion);
  $('input[id="' + estado + '"]').prop("checked", true);
  $("#equipoedit").val(equipo);
});
//Modificar Jugador
$("#editJugador").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=actualizar",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#editJugadorModal").modal("hide");
      ActualizarJugador();
    },
  });

  event.preventDefault();
});
//Abrir Modal dar de baja al  jugador
$("#dar_baja").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("idjugador");
  var nombre = button.data("nombre");
  var apellido = button.data("apellido");
  var fechanacimiento = button.data("fechanacimiento");
  var numerodecamisa = button.data("numerodecamisa");
  var posicion = button.data("posicion");
  var estado = button.data("estado");
  var equipo = button.data("equipo");

  $("#desactivar_idjugador").val(id);
  $("#des_nombre").val(nombre);
  $("#des_apellido").val(apellido);
  $("#des_fechanacimiento").val(fechanacimiento);
  $("#des_numerocamisa").val(numerodecamisa);
  $("#des_posicion").val(posicion);
  $('input[id="' + estado + '"]').prop("checked", true);
  $("#des_equipo").val(equipo);
});
//Dar de baja al  Jugador
$("#baja").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=dar_baja",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#dar_baja").modal("hide");
      ActualizarJugador();
    },
  });
  event.preventDefault();
});

//Abrir Modal dar de Alta al  jugador
$("#dar_alta").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("idjugador");
  var nombre = button.data("nombre");
  var apellido = button.data("apellido");
  var fechanacimiento = button.data("fechanacimiento");
  var numerodecamisa = button.data("numerodecamisa");
  var posicion = button.data("posicion");
  var estado = button.data("estado");
  var equipo = button.data("equipo");

  $("#activar_idjugador").val(id);
  $("#act_nombre").val(nombre);
  $("#act_apellido").val(apellido);
  $("#act_fechanacimiento").val(fechanacimiento);
  $("#act_numerocamisa").val(numerodecamisa);
  $("#act_posicion").val(posicion);
  $('input[id="' + estado + '"]').prop("checked", true);
  $("#act_equipo").val(equipo);
});
//Dar de baja de alta al  Jugador
$("#alta").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=dar_alta",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#dar_alta").modal("hide");
      ActualizarJugador();
    },
  });
  event.preventDefault();
});

//Actualizar tabla jugador en tiempo real
function ActualizarJugador() {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("jugadortabla").innerHTML = xmlhttp.responseText;
      cargarpaginacion();
    }
  };
  xmlhttp.open("GET", "../views/tab_jugador.php", true);
  xmlhttp.send();
}
function cargarpaginacion() {
  $("#datatable-buttons").DataTable();
  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
  });
}
