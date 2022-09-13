ActualizarEquipoCambioA();
ActualizarEquipoCambioB();



$("#addCambioA").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/cambio_controller.php?equipo=A",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            var $miSelect = $('jugadorcambioa');
            $miSelect.val($miSelect.children('option:first').val());
            $('#tiempo_cambioa').val("");
            $('#modalCambioA').modal('hide');
            $("#refrescarA").load(" #refrescarA");

            ActualizarEquipoCambioA();
            ActualizarEquipoCambioB();

        }
    });

    event.preventDefault();
});


$("#addCambioB").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/cambio_controller.php?equipo=B",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            var $miSelect = $('jugadorcambiob');
            $miSelect.val($miSelect.children('option:first').val());
            $('#tiempo_cambiob').val("");
            $('#modalCambioB').modal('hide');
            $("#refrescarB").load(" #refrescarB");
            ActualizarEquipoCambioA();
            ActualizarEquipoCambioB();


        }
    });

    event.preventDefault();
});



$('#modalCambioA').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidoca')
    $('#idpartidocambioa').val(partido)

    var jugador = button.data('jugadorca')
    $('#idjugadorcambioa').val(jugador)


})

$('#modalCambioA').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidoca')
    $('#idpartidocambioa').val(partido)

    var jugador = button.data('jugadorca')
    $('#idjugadorcambioa').val(jugador)


})


$('#modalCambioB').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidocb')
    $('#idpartidocambiob').val(partido)

    var jugador = button.data('jugadorcb')
    $('#idjugadorcambiob').val(jugador)


})


function ActualizarEquipoCambioA() {
  var equipoA=$("#equipoa").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp5 = new XMLHttpRequest();
    } else {
        xmlhttp5 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp5.onreadystatechange = function () {
        if (xmlhttp5.readyState == 4 && xmlhttp5.status == 200) {

            document.getElementById("idequipocambioa").innerHTML = xmlhttp5.responseText;
        }
    }
    xmlhttp5.open("GET", "../views/tab_cambioa.php?id="+equipoA +"&partido="+partido, true);
    xmlhttp5.send();
}


function ActualizarEquipoCambioB() {
  var equipoB=$("#equipob").val();
  var partido=$("#idpartido").val();
    if (window.XMLHttpRequest) {
        xmlhttp6 = new XMLHttpRequest();
    } else {
        xmlhttp6 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp6.onreadystatechange = function () {
        if (xmlhttp6.readyState == 4 && xmlhttp6.status == 200) {

            document.getElementById("idequipocambiob").innerHTML = xmlhttp6.responseText;
        }
    }
    xmlhttp6.open("GET", "../views/tab_cambiob.php?id="+equipoB+"&partido="+partido, true);
    xmlhttp6.send();
}
