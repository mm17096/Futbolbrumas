
ActualizarJuez();


//Guardar Estadio
$("#addJuez").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/juez_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#nombre").val("");
            $("#juez").val("");
            $('#modalJ').modal('hide');
            ActualizarJuez();
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
  $('#deleteJuezModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('idj');
      console.log(id);
      $('#delete_idj').val(id);
  })
  //Eliminar Equipo
  $("#deleteJuez").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/juez_controller.php?action=eliminar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#deleteJuezModal').modal('hide');
              ActualizarJuez();
          }
      });
      event.preventDefault();
  });


  $('#editJuezModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nombre = button.data('nombre')
      $('#juez_edit').val(nombre)

      var id = button.data('juez')
      $('#id_juez').val(id)




  })
  //Modificar Equipo
  $("#editJuez").submit(function (event) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/juez_controller.php?action=actualizar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#editJuezModal').modal('hide');
              ActualizarJuez();
          }
      });

      event.preventDefault();
  });

//Actualizar Tabla de Estadio en tiempo Real
function ActualizarJuez() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("jueztabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../view/tablaJuez.php", true);
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
