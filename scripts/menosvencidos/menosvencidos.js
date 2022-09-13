ActualizarCancha();

function ActualizarCancha() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("menosvencidos").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tablas/tab_menosvencidos.php", true);
    xmlhttp.send();
}


function cargarpaginacion() {
    $('#tbmenosvencidos').DataTable();
}
