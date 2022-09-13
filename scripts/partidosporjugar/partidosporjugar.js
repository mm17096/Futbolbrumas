ActualizarCancha();

function ActualizarCancha() {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

      document.getElementById("partidosporjugar").innerHTML = xmlhttp.responseText;
      cargarpaginacion();
    }
  }
  xmlhttp.open("GET", "../views/tablas/tab_partidosporjugar.php", true);
  xmlhttp.send();
}


function cargarpaginacion() {
  $('#tbpartidosporjugar').DataTable();
}

// ------------------- Ver cancha -----------------------------//
function verMapaTabla(id) {
  console.log(id);
  $('#tabid').val(id);
  var w = 720; var h = 575;
  var left = (screen.width - w) / 2;
  var top = (screen.height - h) / 4;
  var targetWin = window.open("tab_maps.php", "Nuevo", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

}

function abrirA(posicion) {
  document.getElementById("datosA").style.display = 'block';

  if (posicion == "portero") {
    $nombre = document.getElementById("nombreP_A").value;
    $camisa = document.getElementById("camisaP_A").value;
    $pos = document.getElementById("posicionP_A").value;

    $("#nombreA").val($nombre);
    $("#camisaA").val($camisa);
    $("#posicionA").val($pos);

  } else if (posicion == "defensa_iz") {
    $nombre = document.getElementById("nombreDIZ_A").value;
    $camisa = document.getElementById("camisaDIZ_A").value;
    $pos = document.getElementById("posicionDIZ_A").value;

    $("#nombreA").val($nombre);
    $("#camisaA").val($camisa);
    $("#posicionA").val($pos);

  }else if (posicion == "defensa_der") {
    $nombre = document.getElementById("nombreDER_A").value;
    $camisa = document.getElementById("camisaDER_A").value;
    $pos = document.getElementById("posicionDER_A").value;

    $("#nombreA").val($nombre);
    $("#camisaA").val($camisa);
    $("#posicionA").val($pos);

  }else if (posicion == "media") {
    $nombre = document.getElementById("nombreM_A").value;
    $camisa = document.getElementById("camisaM_A").value;
    $pos = document.getElementById("posicionM_A").value;

    $("#nombreA").val($nombre);
    $("#camisaA").val($camisa);
    $("#posicionA").val($pos);

  }else if (posicion == "delantero") {
    $nombre = document.getElementById("nombreD_A").value;
    $camisa = document.getElementById("camisaD_A").value;
    $pos = document.getElementById("posicionD_A").value;

    $("#nombreA").val($nombre);
    $("#camisaA").val($camisa);
    $("#posicionA").val($pos);
  }

}

function abrirB(posicion) {
  document.getElementById("datosB").style.display = 'block';

  if (posicion == "portero") {
    $nombre = document.getElementById("nombreP_B").value;
    $camisa = document.getElementById("camisaP_B").value;
    $pos = document.getElementById("posicionP_B").value;

    $("#nombreB").val($nombre);
    $("#camisaB").val($camisa);
    $("#posicionB").val($pos);

  } else if (posicion == "defensa_iz") {
    $nombre = document.getElementById("nombreDIZ_B").value;
    $camisa = document.getElementById("camisaDIZ_B").value;
    $pos = document.getElementById("posicionDIZ_B").value;

    $("#nombreB").val($nombre);
    $("#camisaB").val($camisa);
    $("#posicionB").val($pos);

  }else if (posicion == "defensa_der") {
    $nombre = document.getElementById("nombreDER_B").value;
    $camisa = document.getElementById("camisaDER_B").value;
    $pos = document.getElementById("posicionDER_B").value;

    $("#nombreB").val($nombre);
    $("#camisaB").val($camisa);
    $("#posicionB").val($pos);

  }else if (posicion == "media") {
    $nombre = document.getElementById("nombreM_B").value;
    $camisa = document.getElementById("camisaM_B").value;
    $pos = document.getElementById("posicionM_B").value;

    $("#nombreB").val($nombre);
    $("#camisaB").val($camisa);
    $("#posicionB").val($pos);

  }else if (posicion == "delantero") {
    $nombre = document.getElementById("nombreD_B").value;
    $camisa = document.getElementById("camisaD_B").value;
    $pos = document.getElementById("posicionD_B").value;

    $("#nombreB").val($nombre);
    $("#camisaB").val($camisa);
    $("#posicionB").val($pos);
  }
}

function cerrarA() {
  document.getElementById("datosA").style.display = 'none';
}

function cerrarB() {
  document.getElementById("datosB").style.display = 'none';
}

//---------------- MODAL DE MOSTRAR PARTIDOS -------------------//
function mostrarFormacion() {
  $('#modalFormacion').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var EquipoA = button.data('equipoa')
    var EquipoB = button.data('equipob')

    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        document.getElementById("tablaformacion").innerHTML = xmlhttp.responseText;
        cargarpaginacion();
      }
    }

    xmlhttp.open("GET", "../views/tablas/tab_tablaformacion.php?equipoA=" + EquipoA + "&equipoB=" + EquipoB, true);
    xmlhttp.send();

  });
};
  //---------------- MODAL DE MOSTRAR PARTIDOS -------------------//