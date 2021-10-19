
ActualizarEstadio();


//Guardar Estadio
$("#addEstadio").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/estadio_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#nombre").val("");
            $("#capacidad").val("");
            $("#direccion").val("");
            $("#coorx").val("");
            $("#coory").val("");
            $('#modalEs').modal('hide');
            ActualizarEstadio();
          }
      });

      event.preventDefault();
  });


//moadalGuardar
$('#modalEs').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    $('#accion_add').val("Guardar");
    $('#accion_edit').val("");
})



  //Abrir Modal Delete
  $('#deleteEstadioModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id');
      console.log(id);
      $('#delete_idE').val(id);
  })
  //Eliminar Equipo
  $("#deleteEstadio").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/estadio_controller.php?action=eliminar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#deleteEstadioModal').modal('hide');
              ActualizarEstadio();
          }
      });
      event.preventDefault();
  });


  $('#editEstadioModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nombre = button.data('nombre')
      $('#nombre_edit').val(nombre)

      var capacidad = button.data('capacidad')
      $('#capacidad_edit').val(capacidad)

      var direccion = button.data('direccion')
      $('#direccion_edit').val(direccion)

      var coorx = button.data('coordenadax')
      $('#coorx_edit').val(coorx)

      var coory = button.data('coordenaday')
      $('#coory_edit').val(coory)

      var id = button.data('id')
      $('#id_edit').val(id)

      $('#accion_edit').val("Modificar")

      $('#accion_add').val("");


  })
  //Modificar Equipo
  $("#editEstadio").submit(function (event) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/estadio_controller.php?action=actualizar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#editEstadioModal').modal('hide');
              ActualizarEstadio();
          }
      });

      event.preventDefault();
  });

//Actualizar Tabla de Estadio en tiempo Real
function ActualizarEstadio() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("estadiotabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../view/tablaEstadio.php", true);
    xmlhttp.send();
}

function cargarpaginacion() {
    $('#example1').DataTable();
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
}
