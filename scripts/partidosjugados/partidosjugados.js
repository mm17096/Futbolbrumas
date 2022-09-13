ActualizarCancha();

function ActualizarCancha() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("partidosjugados").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../views/tablas/tab_partidosjugados.php", true);
    xmlhttp.send();
}


//---------------- MODAL DE MOSTRAR RESUMEN -------------------//
function mostrarResumen() {
    $('#modalResumen').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
  
      var partido = button.data('idpartido')
      var EquipoA = button.data('equipoa')
      var EquipoB = button.data('equipob')

      if (window.XMLHttpRequest) {
        xmlhttpA = new XMLHttpRequest();
        xmlhttpB = new XMLHttpRequest();
      } else {
        xmlhttpA = new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttpB = new ActiveXObject("Microsoft.XMLHTTP");
      }
  
      xmlhttpA.onreadystatechange = function () {
        if (xmlhttpA.readyState == 4 && xmlhttpA.status == 200) {
  
          document.getElementById("equipoA").innerHTML = xmlhttpA.responseText;
        }

      }

      xmlhttpB.onreadystatechange = function () {
        if (xmlhttpB.readyState == 4 && xmlhttpB.status == 200) {
  
          document.getElementById("equipoB").innerHTML = xmlhttpB.responseText;
        }

      }
   
      xmlhttpA.open("GET", "../views/tablas/tab_tablaresumen.php?equipo=" + EquipoA + "&partido=" + partido, true);
      xmlhttpA.send();
    
      xmlhttpB.open("GET", "../views/tablas/tab_tablaresumen.php?equipo=" + EquipoB + "&partido=" + partido, true);
      xmlhttpB.send();
    });

  };
  
    //---------------- MODAL DE MOSTRAR RESUMEN -------------------//
