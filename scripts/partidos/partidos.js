

ActualizarPartidoP();
ActualizarPartidoF();

if ( $("#equipoa").val() !== undefined && $("#equipob").val() !== undefined  ) {

  console.log($("#equipoa").val());
  console.log($("#equipob").val());
  console.log($("#id_partido").val());

  var equipoA=$("#equipoa").val();
  var equipoB=$("#equipob").val();
  var partido =$("#id_partido").val();
  ActualizarPartidoA(equipoA,partido);
  ActualizarPartidoB(equipoB,partido);
  ActualizarDebuA(equipoA);
  ActualizarDebuB(equipoB);
}

//modal finalizar partido
$("#addFinalizar").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/partido_controller.php?equipoA="+equipoA+"&equipoB="+equipoB+"&partido="+partido,
        data: parametros,
        success: function (datos) {

            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#finalizar').modal('hide');
           ActualizarPartidoA(equipoA,partido);
           ActualizarPartidoB(equipoB,partido);
           ActualizarDebuA(equipoA);
           ActualizarDebuB(equipoB);
           location.reload();

        }
    });

    event.preventDefault();
});


$('#finalizar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidofin')
    $('#partido_fin').val(partido)
})



$("#addFalta").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/falta_controller.php",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalF').modal('hide');
            var $miSelect = $('#tipo');
            $miSelect.val($miSelect.children('option:first').val());
            ActualizarPartidoA(equipoA,partido);
            ActualizarPartidoB(equipoB,partido);
        }
    });

    event.preventDefault();
});


$('#modalF').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var jugador = button.data('jugador')
    $('#jugador').val(jugador)

    var partido = button.data('partido')
    $('#partido').val(partido)


})


$("#addGol").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/gol_controller.php",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalG').modal('hide');
            var $miSelect = $('#tipo_gol');
            $miSelect.val($miSelect.children('option:first').val());
            ActualizarPartidoA(equipoA,partido);
            ActualizarPartidoB(equipoB,partido);
        }
    });

    event.preventDefault();
});


$('#modalG').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var jugador = button.data('jugadorg')
    $('#jugador_gol').val(jugador)

    var partido = button.data('partidog')
    $('#partido_gol').val(partido)


})



$("#addDet").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/detPartido_controller.php",
        data: parametros,
        success: function (datos) {
          $("#resultados").html(datos);
          $("#message").html(datos);
          $('#modalDet').modal('hide');


        }
    });

    event.preventDefault();
});




$('#modalDet').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var partido= button.data('partidodet')
    $('#partido_det').val(partido)





})

//modal Cambio equipo A
$('#modalCA').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var jugador= button.data('jugadorc')
    $('#cambiara').val(jugador)

})

$("#addCambioA").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/cambio_controller.php?equipo=a",
        data: parametros,
        success: function (datos) {
          $("#resultados").html(datos);
          $("#message").html(datos);
          $('#modalCA').modal('hide');
          var $miSelect = $('#cambioa');
          $miSelect.val($miSelect.children('option:first').val());
          ActualizarPartidoA(equipoA,partido);
          ActualizarPartidoB(equipoB,partido);
          location.reload();



        }
    });

    event.preventDefault();
});

//modal cambio equipo B
$('#modalCB').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var jugador= button.data('jugadorc')
    $('#cambiarb').val(jugador)

})

$("#addCambioB").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/cambio_controller.php?equipo=b",
        data: parametros,
        success: function (datos) {
          $("#resultados").html(datos);
          $("#message").html(datos);
          $('#modalCB').modal('hide');
          var $miSelect = $('#cambiob');
          $miSelect.val($miSelect.children('option:first').val());
          ActualizarPartidoA(equipoA,partido);
          ActualizarPartidoB(equipoB,partido);
          location.reload();





        }
    });

    event.preventDefault();
});


//tablas debutante


function HabilitarJugador(id){

$.ajax(
  "../controller/cancha_controller.php?jugador="+id,
  {
      success: function(data) {
        $("#resultados").html(data);
        $("#message").html(data);
        ActualizarDebuA(equipoA);
        ActualizarDebuB(equipoB);
        location.reload();


      },
      error: function() {
        alert('There was some error performing the AJAX call!');
      }
   }
);
}




function ActualizarPartidoA(id,par) {
    if (window.XMLHttpRequest) {
        xmlhttpA = new XMLHttpRequest();
    } else {
        xmlhttpA = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpA.onreadystatechange = function () {
        if (xmlhttpA.readyState == 4 && xmlhttpA.status == 200) {

            document.getElementById("equipoA").innerHTML = xmlhttpA.responseText;

        }
    }
    xmlhttpA.open("GET", "../view/tablaEquipoA.php?ID="+id+"&PAR="+par, true);
    xmlhttpA.send();

}

function ActualizarPartidoB(id,par) {
    if (window.XMLHttpRequest) {
        xmlhttpB = new XMLHttpRequest();
    } else {
        xmlhttpB = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpB.onreadystatechange = function () {
        if (xmlhttpB.readyState == 4 && xmlhttpB.status == 200) {

            document.getElementById("equipoB").innerHTML = xmlhttpB.responseText;

        }
    }

    xmlhttpB.open("GET", "../view/tablaEquipoB.php?ID="+id+"&PAR="+par, true);
    xmlhttpB.send();
}



function ActualizarPartidoP() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("partidopendiente").innerHTML = xmlhttp.responseText;
            cargarpaginacion();

        }
    }
    xmlhttp.open("GET", "../view/tablaPartidosP.php", true);
    xmlhttp.send();

}





function ActualizarPartidoF() {
    if (window.XMLHttpRequest) {
        xmlhttpF = new XMLHttpRequest();
    } else {
        xmlhttpF = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpF.onreadystatechange = function () {
        if (xmlhttpF.readyState == 4 && xmlhttpF.status == 200) {

            document.getElementById("partidofinalizado").innerHTML = xmlhttpF.responseText;
            cargarpaginacion();

        }
    }
    xmlhttpF.open("GET", "../view/tablaPartidoF.php", true);
    xmlhttpF.send();

}



function ActualizarDebuA(id) {
    if (window.XMLHttpRequest) {
        xmlhttpDa = new XMLHttpRequest();
    } else {
        xmlhttpDa = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpDa.onreadystatechange = function () {
        if (xmlhttpDa.readyState == 4 && xmlhttpDa.status == 200) {

            document.getElementById("debuatabla").innerHTML = xmlhttpDa.responseText;

        }
    }
    xmlhttpDa.open("GET", "../view/TablaDebuA.php?idequipoa="+id, true);
    xmlhttpDa.send();
}


function ActualizarDebuB(id) {
    if (window.XMLHttpRequest) {
        xmlhttpDb = new XMLHttpRequest();
    } else {
        xmlhttpDb = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpDb.onreadystatechange = function () {
        if (xmlhttpDb.readyState == 4 && xmlhttpDb.status == 200) {

            document.getElementById("debubtabla").innerHTML = xmlhttpDb.responseText;

        }
    }
    xmlhttpDb.open("GET", "../view/TablaDebuB.php?idequipob="+id, true);
    xmlhttpDb.send();
}



function cargarpaginacion() {
    $('#example1').DataTable();
    $('#example2').DataTable({
        'paging': false,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': false,
        'autoWidth': false
    });
}
