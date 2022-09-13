
ActualizarEquipoA();
ActualizarEquipoB();



$("#addGol").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/gol_controller.php?accion=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalGol').modal('hide');
            var $miSelect = $('#tipo_gol');
            $('#tiempo').val("");
            $miSelect.val($miSelect.children('option:first').val());
            ActualizarEquipoA();
            ActualizarEquipoB();

        }
    });

    event.preventDefault();
});


$('#modalGol').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidog')
    $('#idpartidogol').val(partido)

    var jugador = button.data('jugadorg')
    $('#idjugadorgol').val(jugador)


})

$('#modalBorrar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidod')
    $('#idpartidoborrar').val(partido)

    var jugador = button.data('jugadord')
    $('#idjugadorborrar').val(jugador)

    TablaGoles(jugador,partido);


})


function borrar(jugador,gol) {
  var parametros = $(this).serialize();
  console.log(jugador);
  console.log(gol);

  $.ajax({
      type: "POST",
      url: "../controller/gol_controller.php?accion=eliminar"+"&idgol="+gol,
      data: parametros,
      success: function (datos) {
          $("#resultados").html(datos);
          $("#message").html(datos);
          $('#modalBorrar').modal('hide');
          ActualizarEquipoA();
          ActualizarEquipoB();

      }
  });

  event.preventDefault();

}


function ActualizarEquipoA() {
  var equipoA=$("#equipoa").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("idequipoa").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../views/tab_gola.php?id="+equipoA +"&partido="+partido, true);
    xmlhttp.send();
}


function ActualizarEquipoB() {
  var equipoB=$("#equipob").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp1 = new XMLHttpRequest();
    } else {
        xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp1.onreadystatechange = function () {
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {

            document.getElementById("idequipob").innerHTML = xmlhttp1.responseText;
        }
    }
    xmlhttp1.open("GET", "../views/tab_golb.php?id="+equipoB+"&partido="+partido, true);
    xmlhttp1.send();
}

function TablaGoles(jugador,partido) {
    if (window.XMLHttpRequest) {
        xmlhttp10 = new XMLHttpRequest();
    } else {
        xmlhttp10 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp10.onreadystatechange = function () {
        if (xmlhttp10.readyState == 4 && xmlhttp10.status == 200) {

            document.getElementById("borrargoles").innerHTML = xmlhttp10.responseText;

        }
    }
    xmlhttp10.open("GET", "../views/tab_golesdelete.php?id="+ jugador+"&partido="+partido, true);
    xmlhttp10.send();
}
