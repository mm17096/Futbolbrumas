
ActualizarEquipo();

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
            $("#estadio").val("");
            $('#modalE').modal('hide');
            ActualizarEquipo();
        }
    });

    event.preventDefault();
});
//Abrir Modal Editar Equipo
$('#editEquipoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var nombre = button.data('nombre')
    $('#nombre_edit').val(nombre)
    var estadio = button.data('estadio')
    
    $('input[id="'+estadio+'"]').prop('checked', true);
    $('#id_edit').val(id)

})
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

//Abrir Modal Delete

$('#deleteEquipoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#delete_id').val(id)
})
//Eliminar Equipo
$("#deleteEquipo").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/equipo_controller.php?action=eliminar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#deleteEquipoModal').modal('hide');
            ActualizarEquipo();
        }
    });
    event.preventDefault();
});
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
    xmlhttp.open("GET", "../view/tablaEquipo.php", true);
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

