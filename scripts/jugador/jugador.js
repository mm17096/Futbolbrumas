
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
            $("#fecha_nacimiento").val("");
            $("#numero_camisa").val("");
            $("#posicion").val("");
            $("#nacionalidad").val("");
            $("#estado").val("");
            $("#equipo").val("");
            $('#modalJ').modal('hide');
            ActualizarJugador();
        }
    });

    event.preventDefault();
});

//Abrir Modal Editar Jugador
$('#editJugadorModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('idjugador')
    var nombre = button.data('nombre')
    var apellido = button.data('apellido')
    var fechanacimiento = button.data('fechanacimiento')
    var numerodecamisa = button.data('numerodecamisa')
    var posicion = button.data('posicion')
    var nacionalidad = button.data('nacionalidad')
    var estado = button.data('estado')
    var equipo = button.data('equipo')
    
    $('#id_edit').val(id)
    $('#nombreedit').val(nombre)
    $('#apellidoedit').val(apellido)
    $('#fechanacimientoedit').val(fechanacimiento)
    $('#numerocamisaedit').val(numerodecamisa)
    $('#posicionedit').val(posicion)
    $('#nacionalidadedit').val(nacionalidad)
    $('input[id="'+estado+'"]').prop('checked', true);
    $('#equipoedit').val(equipo)
})
//Modificar Jugador
$("#editJugador").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/jugador_controller.php?action=actualizar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#editJugadorModal').modal('hide');
            ActualizarJugador();
        }
    });

    event.preventDefault();
});
//Abrir Modal Delete
$('#deleteJugadorModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    $('#delete_idjugador').val(id)
})
//Eliminar Jugador
$("#deleteJugador").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/jugador_controller.php?action=eliminar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $('#deleteJugadorModal').modal('hide');
            ActualizarJugador();
        }
    });
    event.preventDefault();
});
//Actualizar tabla jugador en tiempo real
function ActualizarJugador(){
    if(window.XMLHttpRequest){
        xmlhttp= new XMLHttpRequest();
    }else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState== 4 && xmlhttp.status ==200){
         document.getElementById("Jugadortabla").innerHTML= xmlhttp.responseText;
        cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../view/tablajugador.php", true);
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

