ActualizarEquipo();

//--------------- Metodos de mensaje ---------------//
/*function msj() {

    setTimeout(function () {
      document.getElementById("msjsuccess").style.display = 'none';
    }, 3500);
  
    setTimeout(function () {
      document.getElementById("msjerror").style.display = 'none';
    }, 3500);
  
  };*/
  //--------------- Metodos de mensaje ---------------//
//Guardar Equipo
$("#addEquipo").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#nombre").val("");
            $("#camisa").val("");
            $("#idrepresentante").val("");
            $('#modalE').modal('hide');
            ActualizarEquipo();
        }
    });

    event.preventDefault();
});

function validarEquipo() {
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
            $(".mensajeEquipo").fadeIn(1500);
          }, 100);
  
          setTimeout(function () {
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

