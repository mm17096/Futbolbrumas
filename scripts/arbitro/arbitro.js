ActualizarArbitro();
var $v_dui=false;
var $v_nombre=false;
var $v_apellido=false;
var $v_telefono=false;
var $v_sexo=false;
var $v_fecha=false;
var $v_direccion=false;

var $v_duiedit=false;
var $v_nombreedit=false;
var $v_apellidoedit=false;
var $v_telefonoedit=false;
var $v_sexoedit=false;
var $v_fechaedit=false;
var $v_direccionedit=false;



//Guardar Arbitro
$("#addArbitro").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/arbitro_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#dui").val("");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#direccion").val("");
            $("#telefono").val("");
            $("#fecha").val("");
            $("#genderM").prop("checked", false);
            $("#genderF").prop("checked", false);
            $('#addmodal').modal('hide');
            ActualizarArbitro();
          }
      });

      event.preventDefault();
  });

  //modalGuardar
  $('#addmodal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
  })


//Modal editar arbitro
  $('#editArbitroModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var dui = button.data('dui');
      $('#dui_edit').val(dui)

      var nombre = button.data('nombre')
      $('#nombre_edit').val(nombre)

      var apellido = button.data('apellido')
      $('#apellido_edit').val(apellido)

      var telefono= button.data('telefono')
      $('#telefono_edit').val(telefono)

      var sexo= button.data('sexo')
      if (sexo=="M") {
        $("#genderM_edit").prop("checked", true);
        $("#genderF_edit").prop("checked", false);
      }else{
        if (sexo=="F") {
          $("#genderM_edit").prop("checked", false);
          $("#genderF_edit").prop("checked", true);
        }else {
          $("#genderM_edit").prop("checked", false);
          $("#genderF_edit").prop("checked", false);
        }

      }


      var fecha = button.data('fecha')
      $('#fecha_edit').val(fecha)

      var direccion = button.data('direccion')
      $('#direccion_edit').val(direccion)



  })

  //Modificar arbitro
  $("#editArbitro").submit(function (event) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/arbitro_controller.php?action=actualizar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#editArbitroModal').modal('hide');
              ActualizarArbitro();
          }
      });

      event.preventDefault();
  });


  //Abrir Modal baja
  $('#dar_baja').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('duib');
      $('#delete_id').val(id);
  })


  $("#baja").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url:  "../controller/arbitro_controller.php?action=baja",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#dar_baja').modal('hide');
              ActualizarArbitro();
          }
      });
      event.preventDefault();
  });


  //Abrir Modal alta
  $('#dar_alta').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('duia');
      $('#delete_ida').val(id);
  })


  $("#alta").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url:  "../controller/arbitro_controller.php?action=alta",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#dar_alta').modal('hide');
              ActualizarArbitro();
          }
      });
      event.preventDefault();
  });

function ActualizarArbitro() {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("arbitrotabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tab_arbitro.php", true);
    xmlhttp.send();
}







function cargarpaginacion() {
    $('#example1').DataTable();
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
}


function Letras(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
};

function formatoDui(obj,ev){
  var codigo;
  if(window.event) codigo=window.event.keyCode;
  else if(ev) codigo=ev.which;
  if(codigo==8){return true;}
  if((obj.value.length+1)==9){
    if(codigo==45){
      return true;
    }else{
      obj.value=obj.value+"-";
      return((codigo>=48&&codigo<=57)&&(obj.value.length+1)!=9);
    }
  }
  else{
    return((codigo>=48&&codigo<=57)&&(obj.value.length+1)!=9);
  }
}

//Formato de Telefono
function formatoTel(obj,ev){
  var codigo;
  if(window.event) codigo=window.event.keyCode;
  else if(ev) codigo=ev.which;
  if(codigo==8){return true;}
  if((obj.value.length+1)==5){
    if(codigo==45){
      return true;
    }else{
      obj.value=obj.value+"-";
      return((codigo>=48&&codigo<=57)&&((obj.value.length+1)!=5));
    }
  }
  else{
    return((codigo>=48&&codigo<=57)&&((obj.value.length+1)!=5));
  }
}

//------  VALIDACIONES AGREGAR------//
//------  Validacion dui------//
function validarDui() {
  $dui = document.getElementById("dui").value;

if ($dui!= "") {
  setTimeout(function () {
    $(".mensajedui").fadeOut(400);
  }, 30);
  if ($dui.length == 10) {
    $v_dui=true;
    setTimeout(function () {
      $(".mensajeduif").fadeOut(400);
    }, 30);
    verificarboton();
  } else {
    $v_dui=false;
    setTimeout(function () {
      $(".mensajeduif").fadeIn(1500);
    }, 100);
    verificarboton();
  }
}else{
  $v_dui=false;
  verificarboton();
  setTimeout(function () {
    $(".mensajeduif").fadeOut(400);
  }, 30);
  setTimeout(function () {
    $(".mensajedui").fadeIn(1500);
  }, 100);


}

};

//------  Validacion del Nombre ------//
function validarNombre() {
  $nombre= document.getElementById("nombre").value;

  if ($nombre!="") {

    setTimeout(function () {
      $(".mensajenombre").fadeOut(400);
    }, 30);
    if ($nombre.length+1>4) {
      console.log($nombre.length);
      $v_nombre=true;
      setTimeout(function () {
        $(".mensajenombref").fadeOut(1500);
      }, 100);
      verificarboton();
    }else{
      console.log(nombre.length);
        $v_nombre=false;
        setTimeout(function () {
          $(".mensajenombref").fadeIn(1500);
        }, 100);
        verificarboton();
  }
  } else {

      setTimeout(function () {
        $(".mensajenombre").fadeIn(2000);
      }, 100);
      $v_nombre=false;
      verificarboton();
  }
};

//------  Validacion del Apellido ------//
function validarApellido() {
  $apellido= document.getElementById("apellido").value;

  if ($apellido!="") {

    setTimeout(function () {
      $(".mensajeapellido").fadeOut(400);
    }, 30);
    if ($apellido.length+1>4) {
      $v_apellido=true;
      setTimeout(function () {
        $(".mensajeapellidof").fadeOut(1500);
      }, 100);
      verificarboton();
    }else{

        $v_apellido=false;
        setTimeout(function () {
          $(".mensajeapellidof").fadeIn(1500);
        }, 100);
        verificarboton()
  }
  } else {
      $v_apellido=false;
      setTimeout(function () {
        $(".mensajeapellido").fadeIn(2000);
      }, 100);

      verificarboton();
  }
};

function validarTel() {
  $tel = document.getElementById("telefono").value;

if ($tel != "") {
  setTimeout(function () {
    $(".mensajetel ").fadeOut(400);
  }, 30);
  if ($tel.length == 9) {
    $v_telefono=true;
    setTimeout(function () {
      $(".mensajetelf").fadeOut(400);
    }, 30);
    verificarboton();
  } else {
    $v_telefono=false;
    setTimeout(function () {
      $(".mensajetelf").fadeIn(1500);
    }, 100);
    verificarboton();
  }
}else{
  $v_telefono=false;
  setTimeout(function () {
    $(".mensajetelf").fadeOut(400);
  }, 30);
  setTimeout(function () {
    $(".mensajetel").fadeIn(1500);
  }, 100);
  verificarboton();
}

};

// Validacion de Radio genero
function validarGenero() {
  $sexoM=false;
  $sexoF=false;
  console.log("Entra");
  $sexoM = document.getElementById("genderM").checked;
  $sexoF = document.getElementById("genderF").checked;

  if ($sexoM == true || $sexoF == true) {
    $v_sexo=true;
    setTimeout(function () {
      $(".mensajegen").fadeOut(1500);
    }, 3500);
    verificarboton();
  } else {
    setTimeout(function () {
      $(".mensajegen").fadeIn(1500);
    }, 100);


    verificarboton();
  }
};

// Validar fecha
function validarfecha() {
  $today = new Date();
  $fecha = document.getElementById("fecha").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];
  $year = $year0 + $year1 + $year2 + $year3;
  $edad = $today.getFullYear() - $year;

  if ($edad >= 18) {
    $v_fecha=true;
    setTimeout(function () {
      $(".mensajefecha").fadeOut(1500);
    }, 500);

    verificarboton();
  } else {
    document.getElementById("fecha").value = "";
    setTimeout(function () {
      $(".mensajefecha").fadeIn(1500);
    }, 100);
  verificarboton();
  }
};

function validarDirec() {
  $direccion = document.getElementById("direccion").value;

  if ($direccion!="") {
    setTimeout(function () {
      $(".mensajedirec").fadeOut(400);
    }, 30);
    validarfecha();
    if ($direccion.length+1>15) {
      validarDui();
      validarNombre();
      validarApellido();
      validarTel();
      validarGenero();
      validarfecha();
      $v_direccion=true;
      verificarboton();
      setTimeout(function () {
        $(".mensajedirecf").fadeOut(1500);
      }, 100);
    }else{
      console.log($direccion.length);
        $v_direccion=false;
        setTimeout(function () {
          $(".mensajedirecf").fadeIn(1500);
        }, 100);
        validarDui();
        validarNombre();
        validarApellido();
        validarTel();
        validarGenero();
        validarfecha();
  }
  } else {
      setTimeout(function () {
        $(".mensajedirec").fadeIn(2000);
      }, 100);
      $v_direccion=false;
      validarDui();
      validarNombre();
      validarApellido();
      validarTel();
      validarGenero();
      validarfecha();
  }
};

// Habilitar Boton
function verificarboton() {
  if ($v_dui == true  && $v_fecha == true &&
  $v_telefono == true && $v_nombre == true && $v_apellido == true && $v_direccion == true) {
    $("#btng").removeAttr("disabled");
  } else {
    $("#btng").attr("disabled", "disabled");
  }
};



//------  VALIDACIONES EDITAR------//
//------  Validacion dui------//
function validarDuiEdit() {
  $dui = document.getElementById("dui_edit").value;

if ($dui!= "") {
  setTimeout(function () {
    $(".mensajeduiedit").fadeOut(400);
  }, 30);
  if ($dui.length == 10) {
    $v_duiedit=true;
    setTimeout(function () {
      $(".mensajeduieditf").fadeOut(400);
    }, 30);
    verificarbotonEdit();
  } else {
    $v_duiedit=false;
    setTimeout(function () {
      $(".mensajeduieditf").fadeIn(1500);
    }, 100);
    verificarbotonEdit();
  }
}else{
  $v_duiedit=false;
  verificarbotonEdit();
  setTimeout(function () {
    $(".mensajeduieditf").fadeOut(400);
  }, 30);
  setTimeout(function () {
    $(".mensajeduiedit").fadeIn(1500);
  }, 100);


}

};

//------  Validacion del Nombre ------//
function validarNombreEdit() {
  $nombre= document.getElementById("nombre_edit").value;

  if ($nombre!="") {
    setTimeout(function () {
      $(".mensajenombreedit").fadeOut(400);
    }, 30);
    if ($nombre.length+1>4) {
      console.log($nombre.length);
      $v_nombreedit=true;
      setTimeout(function () {
        $(".mensajenombreeditf").fadeOut(1500);
      }, 100);
      verificarbotonEdit();
    }else{
      console.log(nombre.length);
        $v_nombreedit=false;
        setTimeout(function () {
          $(".mensajenombreeditf").fadeIn(1500);
        }, 100);
        verificarbotonEdit();
  }
  } else {

      setTimeout(function () {
        $(".mensajenombreedit").fadeIn(2000);
      }, 100);
      $v_nombreedit=false;
      verificarbotonEdit();
  }
};

//------  Validacion del Apellido ------//
function validarapellidoEdit() {
  $apellido= document.getElementById("apellido_edit").value;

  if ($apellido!="") {

    setTimeout(function () {
      $(".mensajeapellidoedit").fadeOut(400);
    }, 30);
    if ($apellido.length+1>4) {
      $v_apellidoedit=true;
      setTimeout(function () {
        $(".mensajeapellidoeditf").fadeOut(1500);
      }, 100);
      verificarbotonEdit();
    }else{

        $v_apellidoedit=false;
        setTimeout(function () {
          $(".mensajeapellidoeditf").fadeIn(1500);
        }, 100);
        verificarbotonEdit()
  }
  } else {
      $v_apellidoedit=false;
      setTimeout(function () {
        $(".mensajeapellidoedit").fadeIn(2000);
      }, 100);

      verificarbotonEdit();
  }
};

function validarTelEdit() {
  $tel = document.getElementById("telefono_edit").value;

if ($tel != "") {
  setTimeout(function () {
    $(".mensajeteledit").fadeOut(400);
  }, 30);
  if ($tel.length == 9) {
    $v_telefonoedit=true;
    setTimeout(function () {
      $(".mensajeteleditf").fadeOut(400);
    }, 30);
    verificarbotonEdit();
  } else {
    $v_telefonoedit=false;
    setTimeout(function () {
      $(".mensajeteleditf").fadeIn(1500);
    }, 100);
    verificarbotonEdit();
  }
}else{
  $v_telefonoedit=false;
  setTimeout(function () {
    $(".mensajeteleditf").fadeOut(400);
  }, 30);
  setTimeout(function () {
    $(".mensajeteledit").fadeIn(1500);
  }, 100);
  verificarbotonEdit();
}

};

// Validacion de Radio genero
function validarGeneroEdit() {
  $sexoM=false;
  $sexoF=false;
  $sexoM = document.getElementById("genderM_edit").checked;
  $sexoF = document.getElementById("genderF_edit").checked;

  if ($sexoM == true || $sexoF == true) {
    $v_sexo=true;
    setTimeout(function () {
      $(".mensajegenedit").fadeOut(1500);
    }, 3500);
    verificarboton();
  } else {
    setTimeout(function () {
      $(".mensajegenedit").fadeIn(1500);
    }, 100);
    verificarbotonEdit();
  }
};

// Validar fecha
function validarfechaEdit() {
  $today = new Date();
  $fecha = document.getElementById("fecha_edit").value;

  $year0 = $fecha[0];
  $year1 = $fecha[1];
  $year2 = $fecha[2];
  $year3 = $fecha[3];
  $year = $year0 + $year1 + $year2 + $year3;
  $edad = $today.getFullYear() - $year;

  if ($edad >= 18) {
    $v_fechaedit=true;
    setTimeout(function () {
      $(".mensajefechaedit").fadeOut(1500);
    }, 500);

    verificarbotonEdit();
  } else {
    document.getElementById("fecha_edit").value = "";
    setTimeout(function () {
      $(".mensajefechaedit").fadeIn(1500);
    }, 100);
  verificarbotonEdit();
  }
};

function validarDirecEdit() {
  $direccion = document.getElementById("direccion_edit").value;

  if ($direccion!="") {
    setTimeout(function () {
      $(".mensajedirecedit").fadeOut(400);
    }, 30);
    if ($direccion.length+1>15) {
      validarDuiEdit();
      validarNombreEdit();
      validarapellidoEdit();
      validarTelEdit();
      validarGeneroEdit();
      validarfechaEdit();
      $v_direccionedit=true;
      verificarbotonEdit();
      setTimeout(function () {
        $(".mensajedireceditf").fadeOut(1500);
      }, 100);
    }else{
      console.log($direccionedit.length);
        $v_direccionedit=false;
        setTimeout(function () {
          $(".mensajedireceditf").fadeIn(1500);
        }, 100);
        validarDuiEdit();
        validarNombreEdit();
        validarapellidoEdit();
        validarTelEdit();
        validarGeneroEdit();
        validarfechaEdit();
        verificarbotonEdit();
  }
  } else {
      setTimeout(function () {
        $(".mensajedirecedit").fadeIn(2000);
      }, 100);
      $v_direccion=false;
      validarDuiEdit();
      validarNombreEdit();
      validarapellidoEdit();
      validarTelEdit();
      validarGeneroEdit();
      validarfechaEdit();
      verificarbotonEdit();
  }
};

// Habilitar Boton
function verificarbotonEdit() {
  if ($v_fechaedit == true) {
    $("#btnedit").removeAttr("disabled");
  } else {
    $("#btnedit").attr("disabled", "disabled");
  }
};
