ActualizarJugador();
//Guardar jugador
// verificarboton
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


/////////////////////////PARA EL FORMULARIO EDITAR/////////VALIDACIONES///////

function verificarbotonEdit() {
  $nombreedi = document.getElementById("fullnombreedit").value;
  $apellidoedi = document.getElementById("fullapellidoedit").value;
  $fechaedit = document.getElementById("fullfechaedit").value;
   $equipoedi = document.getElementById("fullequipoedit").value;
  $numerocamisaedi = document.getElementById("fullnumerocamisaedit").value;
  $posicionedi = document.getElementById("fullposicionedit").value;
  

  if ($nombreedi == 'validado' && $apellidoedi == 'validado' && $fechaedi == 'validado' && 
  $numerocamisaedi == 'validado' && $equipoedi == 'validado'&& $posicionedi == 'valido' ) {
    $("#btngedit").removeAttr("disabled");
  } else {
    $("#btngedit").attr("disabled", "disabled");
  }

};
//------ inicia Validacion de habilitar y validacion camisa edit ------//
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
        $("#fullnumerocamisaedit").val("validado");
        verificarbotonEdit();
      } else if (json[0] == "Error") {
        $("#fullnumerocamisaedit").val("");
        document.getElementById("numerocamisaedit").value = "";
        verificarbotonEdit();
        setTimeout(function () {
          document.getElementById('numerocamisaedit').classList.add("color_campos_ocupados");
          $(".mensajenumerocamisaedit").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          document.getElementById('numerocamisaedit').classList.remove("color_campos_ocupados");
          $(".mensajenumerocamisaedit").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
}
//------ termina Validacion de habilitar y validacion camisa edit ------//

//------ inicia Validacion equipo edit ------//
function validarequipoEdit() {
  $equipoedit = document.getElementById("equipoedit").value;

  if ($equipoedit!="") {
    $("#fullequipoedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullequipoedit").val("");
    setTimeout(function () {
      document.getElementById('equipoedit').classList.add("color_campos_incompletos");
      $(".mensajeequipoedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('equipoedit').classList.remove("color_campos_incompletos");
      $(".mensajeequipoedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  fin Validacion equipo edit ------//
//------  Validacion del fecha edit ------//
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
    $("#fullfechaedit").val("validado");
    verificarbotonEdit();
  } else {
    document.getElementById("fechanacimientoedit").value = "";
    $("#fullfechaedit").val("");
    setTimeout(function () {
      document.getElementById('fechanacimientoedit').classList.add("color_campos_incompletos");
      $(".mensajefechaEdit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('fechanacimientoedit').classList.remove("color_campos_incompletos");
      $(".mensajefechaEdit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del fecha edit ------//
//------  Validacion del apellido edit ------//
function validarapellidoEdit() {
  $apellido = document.getElementById("apellidoedit").value;

  if ($apellido != '') {
    $("#fullapellidoedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullapellidoedit").val("");
    setTimeout(function () {
      document.getElementById('apellidoedit').classList.add("color_campos_incompletos");
      $(".mensajeapellidoedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('apellidoedit').classList.remove("color_campos_incompletos");
      $(".mensajeapellidoedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del Nombre edit ------//
function validarnombreEdit() {
  $nombre = document.getElementById("nombreedit").value;

  if ($nombre != '') {
    $("#fullnombreedit").val("validado");
    verificarbotonEdit();
  } else {
    $("#fullnombreedit").val("");
    setTimeout(function () {
      document.getElementById('nombreedit').classList.add("color_campos_incompletos");
      $(".mensajenombreedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('nombreedit').classList.remove("color_campos_incompletos");
      $(".mensajenombreedit").fadeOut(1500);
    }, 3500);
    verificarbotonEdit();
  }
};
//------  Validacion del Nombre edit------//

/////////////////////////PARA EL FORMULARIO GUARDAR/////////VALIDACIONES///////
/*function agregarJugador() {
  var parametros = $("#addJugador").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=guardar",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $('#modalJ').modal('hide');
      ActualizarJugador();
    }
  });
  event.preventDefault();
};*/
/*function verificarboton() {
  $nombre = document.getElementById("fullnombre").value;
  $apellido = document.getElementById("fullapellido").value;
  $fecha = document.getElementById("fullfechanacimiento").value;
  $camisa = document.getElementById("fullnumerocamisa").value;
  $posicion= document.getElementById("fullposicion").value;
  $equipo = document.getElementById("fullequipo").value;
  

  if ($nombre == 'validado' && $apellido == 'validado' && $fecha == 'validado' && $camisa == 'validado' && 
  $posicion == 'validado' && $equipo == 'validado') {
    $("#btnn").removeAttr("disabled");
  } else {
    $("#btnn").attr("disabled", "disabled");
  }

};*/

//validar campo equipo
function validarequipo() {
  $equipo = document.getElementById("idequipo").value;

  if ($equipo!="") {
    $("#fullequipo").val("validado");
    verificarboton();
  } else {
    $("#fullequipo").val("");
    setTimeout(function () {
      document.getElementById('idequipo').classList.add("color_campos_incompletos");
      $(".mensajequipo").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('idequipo').classList.remove("color_campos_incompletos");
      $(".mensajequipo").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//validar campo apellido
function validarapellido() {
  $apellido = document.getElementById("apellido").value;

  if ($apellido != '' && $apellido.length >= 4) {
    $("#fullapellido").val("validado");
    verificarboton();
  } else {
    $("#fullapellido").val("");
    setTimeout(function () {
      document.getElementById('apellido').classList.add("color_campos_incompletos");
      $(".mensajeapellido").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('apellido').classList.remove("color_campos_incompletos");
      $(".mensajeapellido").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};
//validacion campo solo letras
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
//validar nombre del jugador
function validarnombre() {
  $nombre = document.getElementById("nombre").value;

  if ($nombre != '') {
    $("#fullnombre").val("validado");
    verificarboton();
  } else {
    $("#fullnombre").val("");
    setTimeout(function () {
      document.getElementById('nombre').classList.add("color_campos_incompletos");
      $(".mensajenombre").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('nombre').classList.remove("color_campos_incompletos");
      $(".mensajenombre").fadeOut(1500);
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
    $("#fullfechanacimiento").val("validado");
    verificarboton();
  } else {
    document.getElementById("fechanacimiento").value = "";
    $("#fullfechanacimiento").val("");
    setTimeout(function () {
      document.getElementById('fechanacimiento').classList.add("color_campos_incompletos");
      $(".mensajefecha").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('fechanacimiento').classList.remove("color_campos_incompletos");
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
        $("#fullnumerocamisa").val("validado");
        verificarboton();
      } else if (json[0] == "Error") {
        $("#fullnumerocamisa").val("");
        document.getElementById("numero_camisa").value = "";
        setTimeout(function () {
          document.getElementById('numero_camisa').classList.add("color_campos_ocupados");
          $(".mensajenuemro").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          document.getElementById('numero_camisa').classList.remove("color_campos_ocupados");
          $(".mensajenuemro").fadeOut(1500);
        }, 3500);
        verificarboton();
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
}

//validar campo posicion
function validarposicion() {
  $posicion = document.getElementById("posicion").value;

  if ($posicion!="") {
    $("#fullposicion").val("validado");
    validarposicionbase();
  } else {
    $("#fullposicion").val("");
    setTimeout(function () {
      document.getElementById('posicion').classList.add("color_campos_incompletos");
      $(".mensajeposicion").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('posicion').classList.remove("color_campos_incompletos");
      $(".mensajeposicion").fadeOut(1500);
    }, 3500);
    verificarboton();
  }
};

function validarposicionbase() {
  $equipo = document.getElementById("idequipo").value;
  $posicion = document.getElementById("posicion").value;

  if($posicion=="Portero"){

  
  var datos = { action: "verificarposicion", posicion: $posicion, idequipo: $equipo };
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: "../controller/jugador_controller.php",
    data: datos,
  })
    .done(function (json) {
      console.log("EL consultar especifico", json);
      if (json[0] == "Exito") {
        //alert("exito");
      } else if (json[0] == "Error") {
        document.getElementById("posicion").value = "";
        setTimeout(function () {
          document.getElementById('posicion').classList.add("color_campos_ocupados");
          $(".mensajeposicionbase").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          document.getElementById('posicion').classList.remove("color_campos_ocupados");
          $(".mensajeposicionbase").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
  }
}
//------ inicia Validacion de posicion edit ------//
function validarposicionEdit() {
  $posicionedit = document.getElementById("posicionedit").value;

  if ($posicionedit != "") {
    $("#fullposicionedit").val("validado");
    validarposicionbaseedit()
  } else {
    $("#fullposicionedit").val("");
    setTimeout(function () {
      document.getElementById('posicionedit').classList.add("color_campos_incompletos");
      $(".mensajeposicionedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('posicionedit').classList.remove("color_campos_incompletos");
      $(".mensajeposicionedit").fadeOut(1500);
    }, 3500);
   
  }
};
function validarposicionbaseedit() {
  $equipo = document.getElementById("equipoedit").value;
  $posicion = document.getElementById("posicionedit").value;

  if($posicion=="Portero"){

  
  var datos = { action: "verificarposicionedit", posicion: $posicion, idequipo: $equipo };
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: "../controller/jugador_controller.php",
    data: datos,
  })
    .done(function (json) {
      console.log("EL consultar especifico", json);
      if (json[0] == "Exito") {
        //alert("exito");
      } else if (json[0] == "Error") {
        document.getElementById("posicionedit").value = "";
        setTimeout(function () {
          document.getElementById('posicionedit').classList.add("color_campos_ocupados");
          $(".mensajeposicionbaseedit").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          document.getElementById('posicionedit').classList.remove("color_campos_ocupados");
          $(".mensajeposicionbaseedit").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});
  }
}
//------ termina Validacion de posicion edit ------//

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
/*function modificarRepresentante() {
  var parametros = $("#editJugador").serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=actualizar",
    data: parametros,
    success: function (datos) {
      //$("#resultados").html(datos);
      $("#id_edit").val("");
      $("#nombreedit").val("");
      $("#apellidoedit").val("");
      $("#fechanacimientoedit").val("");
      $("#numerocamisaedit").val("");
      $("#posicionedit").val("");
      $("#equipoedit").val("");
      $('#editJugadorModal').modal('hide');
    }
  });

};
function abrirmodalEdi() {
  $('#editJugadorModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('idjugador')
    $('#id_edit').val(id)

    var nombre = button.data('nombre')
    $('#nombreedit').val(nombre)
    $('#fullnombreedit').val("validado")
    
    var apellido = button.data('apellido')
    $('#apellidoedit').val(apellido)
    $('#fullapellidoedit').val("validado")

    var fechanacimiento = button.data('fechanacimiento')
    $('#fechanacimientoedit').val(fechanacimiento) 
    $('#fullfechaedit').val("validado")

    var equipo = button.data('idequipo')
    $('#equipoedit').val(equipo);
    $('#fullequipoedit').val("validado")

    var numerocamisa = button.data('numero_camisa')
    $('#numerocamisaedit').val(numerocamisa)
    $('#fullnumerocamisaedit').val("validado")

    var posicion = button.data('posicion')
    $('#posicionedit').val(posicion)
    $('#fullposicionedit').val("validado")
    verificarbotonEdit();
  });
};*/

//Abrir Modal hacer cambio
$("#cambio").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("idjugador");
  var posicion = button.data("posicion");
  var equipo = button.data("equipo");

  $("#idjugador_cambio").val(id);
  $("#posicion_cambio").val(posicion);
  $("#equipo_cambio").val(equipo);
});

//Hacer cambio en controlador
$("#action_cambio").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=cambio",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#cambio").modal("hide");
      ActualizarJugador();
    },
  });
  event.preventDefault();
});

//Abrir Modal hacender a titular
$("#titular").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("idjugador");
  var posicion = button.data("posicion");
  var equipo = button.data("equipo");

  $("#idjugador_titular").val(id);
  $("#posicion_titular").val(posicion);
  $("#equipo_titular").val(equipo);
});

//Hacer titular con controlador
$("#action_titular").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../controller/jugador_controller.php?action=titular",
    data: parametros,
    success: function (datos) {
      $("#resultados").html(datos);
      $("#titular").modal("hide");
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
