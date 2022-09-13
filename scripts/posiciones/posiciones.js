ActualizarCancha();

function ActualizarCancha() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("posiciones").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tablas/tab_posiciones.php", true);
    xmlhttp.send();
}


function cargarpaginacion() {
    $('#tbposiciones').DataTable();
}

//---------------- MODAL DE MOSTRAR PARTIDOS -------------------//
function mostrarPartidos() {
    $('#modalPartidos').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
  
      var id = button.data('id')
  
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
  
      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
  
          document.getElementById("tablapartidos").innerHTML = xmlhttp.responseText;
          cargarpaginacion();
        }
      }
      xmlhttp.open("GET", "../views/tablas/tab_tablapartidos.php?id=" + id, true);
      xmlhttp.send();
  
    });
  };
  
  function cargarpaginacion() {
    $('#tbapartidos').DataTable();
  };
  //---------------- MODAL DE MOSTRAR PARTIDOS -------------------//

