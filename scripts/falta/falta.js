ActualizarEquipoFaltaA();
ActualizarEquipoFaltaB();



$("#addFalta").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/falta_controller.php?accion=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalFalta').modal('hide');
            var $miSelect = $('#tipo_falta');
            $('#tiempo_falta').val("");
            $miSelect.val($miSelect.children('option:first').val());
            ActualizarEquipoFaltaA();
            ActualizarEquipoFaltaB();

        }
    });

    event.preventDefault();
});

function borrarFalta(jugador,gol) {
  var parametros = $(this).serialize();
  $.ajax({
      type: "POST",
      url: "../controller/falta_controller.php?accion=eliminar"+"&idfalta="+gol,
      data: parametros,
      success: function (datos) {
          $("#resultados").html(datos);
          $("#message").html(datos);
          $('#modalBorrarFalta').modal('hide');
          ActualizarEquipoFaltaA();
          ActualizarEquipoFaltaB();
      }
  });

  event.preventDefault();

}


$('#modalFalta').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidof')
    $('#idpartidofalta').val(partido)

    var jugador = button.data('jugadorf')
    $('#idjugadorfalta').val(jugador)


})

$('#modalBorrarFalta').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidodf')
    $('#idpartidoborrarfalta').val(partido)

    var jugador = button.data('jugadordf')
    $('#idjugadorborrarfalta').val(jugador)

    TablaFalta(jugador,partido);


})



function ActualizarEquipoFaltaA() {
  var equipoA=$("#equipoa").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp3 = new XMLHttpRequest();
    } else {
        xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp3.onreadystatechange = function () {
        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {

            document.getElementById("idequipofaltaa").innerHTML = xmlhttp3.responseText;
        }
    }
    xmlhttp3.open("GET", "../views/tab_faltaa.php?id="+equipoA +"&partido="+partido, true);
    xmlhttp3.send();
}


function ActualizarEquipoFaltaB() {
  var equipoB=$("#equipob").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp4 = new XMLHttpRequest();
    } else {
        xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp4.onreadystatechange = function () {
        if (xmlhttp4.readyState == 4 && xmlhttp4.status == 200) {

            document.getElementById("idequipofaltab").innerHTML = xmlhttp4.responseText;
        }
    }
    xmlhttp4.open("GET", "../views/tab_faltab.php?id="+equipoB+"&partido="+partido, true);
    xmlhttp4.send();
}


function TablaFalta(jugador,partido) {
    if (window.XMLHttpRequest) {
        xmlhttp11 = new XMLHttpRequest();
    } else {
        xmlhttp11 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp11.onreadystatechange = function () {
        if (xmlhttp11.readyState == 4 && xmlhttp11.status == 200) {

            document.getElementById("borrarfaltas").innerHTML = xmlhttp11.responseText;

        }
    }
    xmlhttp11.open("GET", "../views/tab_faltasdelete.php?id="+ jugador+"&partido="+partido, true);
    xmlhttp11.send();
}
