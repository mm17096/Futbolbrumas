ActualizarEquipo();

$("#camisa").change(function () {
  filePreview(this);
});

function filePreview(input) {
  var tipo =  input.files[0];
  if (input.files && input.files[0]) {
      if (tipo.type == 'image/jpeg' || tipo.type == 'image/jpg' || tipo.type == 'image/png') {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagepreview').html("<img height='170px' width='150px' src='" + e.target.result + "' class='img-circle profile_img'/>");
          }
          reader.readAsDataURL(input.files[0]);
      }else{
          input.value = "";
          setTimeout(function () {
              $(".mensajeimg").fadeIn(1500);
          }, 100);
  
          setTimeout(function () {
              $(".mensajeimg").fadeOut(1500);
          }, 3500);
      }
  }
}

$("#camisa_edit").change(function () {
  filePreview_edit(this);
});

function filePreview_edit(input) {
  var tipo =  input.files[0];
  if (input.files && input.files[0]) {
      if (tipo.type == 'image/jpeg' || tipo.type == 'image/jpg' || tipo.type == 'image/png') {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagepreview_edit').html("<img height='170px' width='150px' src='" + e.target.result + "' class='img-circle profile_img'/>");
          }
          reader.readAsDataURL(input.files[0]);
      }else{
          input.value = "";
          setTimeout(function () {
              $(".mensajeimg_edit").fadeIn(1500);
          }, 100);
  
          setTimeout(function () {
              $(".mensajeimg_edit").fadeOut(1500);
          }, 3500);
      }
  }
}

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
//Guardar Equipo
/*function {
  $nombre = document.getElementById("fullnombre").value;
  $imagen = document.getElementById("fullcamisa").value;
  $representate = document.getElementById("fullrepresentante").value;

  if ($nombre == 'validado' && $imagen == 'validado' && $representate == 'validado') {
    $("#btm").removeAttr("disabled");
  } else {
    $("#btm").attr("disabled", "disabled");
  }

};*/
function validarepresentante() {
  $representante = document.getElementById("idrepresentante").value;

  if ($representante != '') {
    $("#fullrepresentante").val("validado");
    
  } else {
    $("#fullrepresentante").val("");
    setTimeout(function () {
      document.getElementById('idrepresentante').classList.add("color_campos_incompletos");
      $(".mensajerepresentante").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('idrepresentante').classList.remove("color_campos_incompletos");
      $(".mensajerepresentante").fadeOut(1500);
    }, 3500);
    
  }
};

function validarcamisag() {
  $camisa = document.getElementById("camisa").value;

  if ($camisa != '') {
    $("#fullcamisa").val("validado");
    
  } else {
    $("#fullcamisa").val("");
    setTimeout(function () {
      $(".mensajecamisa").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajecamisa").fadeOut(1500);
    }, 3500);
    
  }
};
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

$("#addEquipo").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#idequipo").val("");
            $("#nombre").val("");
            $("#camisa").val("");
            $("#idrepresentante").val("");
            $('#modalE').modal('hide');
            ActualizarEquipo();
        }
    });

    event.preventDefault();
});

function validarepresentanteEdit() {
  $representanteEdit = document.getElementById("idrepresentante_edit").value;

  if ($representanteEdit != '') {
    $("#fullrepresentante").val("validado");
    
  } else {
    $("#fullrepresentante").val("");
    setTimeout(function () {
      document.getElementById('idrepresentante_edit').classList.add("color_campos_incompletos");
      $(".mensajerepresentanteedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('idrepresentante_edit').classList.remove("color_campos_incompletos");
      $(".mensajerepresentanteedit").fadeOut(1500);
    }, 3500);
    
  }
};
function validarcamisaEdit() {
  $camisa = document.getElementById("camisa_edit").value;

  if ($camisa != '') {
    $("#fullcamisa").val("validado");
    
  } else {
    $("#fullcamisa").val("");
    setTimeout(function () {
      $(".mensajecamisaedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      $(".mensajecamisaedit").fadeOut(1500);
    }, 3500);
    
  }
};

function validarequipoEdit() {
  //$equipo = document.getElementById("idequipo").value;
  $nombre = document.getElementById("nombre_edit").value;

  var datos = { action: "verificarequipoEdit", nombre: $nombre };
  $respuesta = $.ajax({
    dataType: "json",
    method: "POST",
    url: "../controller/equipo_controller.php",
    data: datos,
  })
    .done(function (json) {
      console.log("EL consultar especifico", json);
      if (json[0] == "Exito") {
          
      } else if (json[0] == "Error") {
        document.getElementById("nombre_edit").value = "";
        setTimeout(function () {
          document.getElementById('nombre_edit').classList.add("color_campos_ocupados");
          $(".mensajeequipoedit").fadeIn(1500);
        }, 100);

        setTimeout(function () {
          document.getElementById('nombre_edit').classList.remove("color_campos_ocupados");
          $(".mensajeequipoedit").fadeOut(1500);
        }, 3500);
      }
    })
    .fail(function (json) {})
    .always(function (json) {});

}

function validarEquipo() {
  $nombre = document.getElementById("nombre").value;

  if ($nombre != '') {
    $("#fullcamisa").val("validado");
    validarEquipop();
  } else {
    $("#fullcamisa").val("");
    setTimeout(function () {
      document.getElementById('nombre').classList.add("color_campos_incompletos");
      $(".mensajeEquipovacio").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('nombre').classList.remove("color_campos_incompletos");
      $(".mensajeEquipovacio").fadeOut(1500);
    }, 3500);
    
  }
};

function validarEquipop() {
    //$equipo = document.getElementById("idequipo").value;
    $nombre = document.getElementById("nombre").value;
  
    var datos = { action: "verificarEquipo", nombre: $nombre };
    $respuesta = $.ajax({
      dataType: "json",
      method: "POST",
      url: "../controller/equipo_controller.php",
      data: datos,
    })
      .done(function (json) {
        console.log("EL consultar especifico", json);
        if (json[0] == "Exito") {
            
        } else if (json[0] == "Error") {
          document.getElementById("nombre").value = "";
          setTimeout(function () {
            document.getElementById('nombre').classList.add("color_campos_ocupados");
            $(".mensajeEquipo").fadeIn(1500);
          }, 100);
  
          setTimeout(function () {
            document.getElementById('nombre').classList.remove("color_campos_ocupados");
            $(".mensajeEquipo").fadeOut(1500);
          }, 3500);
        }
      })
      .fail(function (json) {})
      .always(function (json) {});
  }
//Abrir Modal Editar Equipo
$('#editEquipoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('idequipo')
    var nombre = button.data('nombre')
    //var camisa = button.data('camisa')
    var idrepresentante = button.data('idrepresentante')
    var estado = button.data('estado')
    

    $('#id_edit').val(id)
    $('#nombre_edit').val(nombre)
    //$('#camisa_edit').val(camisa)
    $('#idrepresentante_edit').val(idrepresentante)
    $('input[id="'+estado+'"]').prop('checked', true);
    
});
//Modificar Equipo
$("#editEquipo").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=actualizar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#editEquipoModal').modal('hide');
            ActualizarEquipo();
        }
    });

    event.preventDefault();
});
//msj();
//CODIGO PARA DAR DE BAJA AL EQUIPO
$('#dar_baja').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('idequipo')
    var nombre= button.data('nombre')
    var camisa= button.data('camisa')
    var idrepresentante =button.data('idrepresentante')
    var estado = button.data('estado')


    $('#desactivar_idequipo').val(id)
    $('#des_nombre').val(nombre)
    $('#des_camisa').val(camisa)
    $('#des_idrepresentante').val(idrepresentante)
    $('input[id="'+estado+'"]').prop('checked', true);
})

$("#baja").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=dar_baja",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#dar_baja').modal('hide');
            ActualizarEquipo();
            
        }
    });
    event.preventDefault();
});

//CODIGO PARA DAR DE ALTA AL EQUIPO
$('#dar_alta').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('idequipo')
    var nombre= button.data('nombre')
    var camisa= button.data('camisa')
    var idrepresentante =button.data('idrepresentante')
    var estado = button.data('estado')


    $('#activar_idequipo').val(id)
    $('#act_nombre').val(nombre)
    $('#act_camisa').val(camisa)
    $('#act_idrepresentante').val(idrepresentante)
    $('input[id="'+estado+'"]').prop('checked', true);
})

$("#alta").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=dar_alta",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#dar_alta').modal('hide');
            ActualizarEquipo();
            
        }
    });
    event.preventDefault();
});

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
  
//Actualizar Tabla de Equipo en tiempo Real
function ActualizarEquipo() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("equipotabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tab_equipo.php", true);
    xmlhttp.send();
}

function cargarpaginacion() {
    $('#datatable-buttons').DataTable();
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
}

