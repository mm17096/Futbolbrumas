Equipos();


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
            
            Equipos();
        }
    });

    event.preventDefault();
});


//ACTUALIZAR TABLA DE PARTIDOS POR JORNADAS
function Equipos() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("equipotabla").innerHTML = xmlhttp.responseText;
            $('#tablaequipos').DataTable();
            $('#tablapartidos').DataTable();
        }
    }
    xmlhttp.open("GET", "../views/tab_equipos.php", true);
    xmlhttp.send();
}



