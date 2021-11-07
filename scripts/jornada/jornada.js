Jornada();


//--------------- Metodos de mensaje ---------------//
function msj() {

    setTimeout(function () {
      document.getElementById("msjsuccess").style.display = 'none';
    }, 3500);
  
    setTimeout(function () {
      document.getElementById("msjerror").style.display = 'none';
    }, 3500);
  
  };
  
//Guardar Equipo
$("#Addjornada").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/jornada_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $('#modal_jornada').modal('hide');
            $("#resultados").html(datos);
            Jornada();
        }
    });

    event.preventDefault();
});


//ACTUALIZAR TABLA DE PARTIDOS POR JORNADAS
function Jornada() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("jornadatabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tab_jornada.php", true);
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


