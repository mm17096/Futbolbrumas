ActualizarCancha();
$v_nombre=false;
$v_direccion=false;
$v_nombreedit=false;
$v_direccionedit=false;

//$("#btnadd").attr("disabled", "disabled");
//Guardar Cancha
$("#addCancha").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../controller/cancha_controller.php?action=guardar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#nombre").val("");
            $("#direccion").val("");
            $("#coorx").val("");
            $("#coory").val("");
            $('#addmodal').modal('hide');
            ActualizarCancha();
          }
      });

      event.preventDefault();
  });
//setCustomValidity
  //modalGuardar
  $('#addmodal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      $('#accion_add').val("Guardar");
      $('#accion_edit').val("");
  })


//Modal editar cancha
  $('#editCanchaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('cancha');
      $('#id_edit').val(id)

      var nombre = button.data('nombre')
      $('#nombre_edit').val(nombre)

      var direccion = button.data('direccion')
      $('#direccion_edit').val(direccion)

      var long= button.data('long')
      $('#coorx_edit').val(long)

      var lat = button.data('lat')
      $('#coory_edit').val(lat)

      $('#accion_edit').val("Modificar")

      $('#accion_add').val("");

  })

  //Modificar cancha
  $("#editCancha").submit(function (event) {
      console.log("Entra");
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../controller/cancha_controller.php?action=actualizar",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#editCanchaModal').modal('hide');
              ActualizarCancha();
          }
      });

      event.preventDefault();
  });


  //Abrir Modal baja
  $('#dar_baja').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('idc');
      $('#delete_id').val(id);
  })


  $("#baja").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url:  "../controller/cancha_controller.php?action=baja",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#dar_baja').modal('hide');
              ActualizarCancha();
          }
      });
      event.preventDefault();
  });


  //Abrir Modal alta
  $('#dar_alta').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('idca');
      $('#delete_ida').val(id);
  })


  $("#alta").submit(function (event) {

      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url:  "../controller/cancha_controller.php?action=alta",
          data: parametros,
          success: function (datos) {
              $("#resultados").html(datos);
              $('#dar_alta').modal('hide');
              ActualizarCancha();
          }
      });
      event.preventDefault();
  });

function ActualizarCancha() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("canchatabla").innerHTML = xmlhttp.responseText;
            cargarpaginacion();
        }
    }
    xmlhttp.open("GET", "../views/tab_cancha.php", true);
    xmlhttp.send();
}

function guarda(){
console.log("hola");
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

function verMapa(){
  var w = 720; var h =575;
  var left = (screen.width - w) / 2;
  var top = (screen.height - h) / 4;
  var targetWin = window.open("maps.php","Nuevo",'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

}

function verMapaTabla(id){
  console.log(id);
  $('#tabid').val(id);
  var w = 720; var h =575;
  var left = (screen.width - w) / 2;
  var top = (screen.height - h) / 4;
  var targetWin = window.open("tab_maps.php","Nuevo",'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

}


// Validacion nombre
function validarNombre() {
  $nombre= document.getElementById("nombre").value;


  if($nombre != ""){
    if($nombre.length+1>4){
      console.log($nombre.length);
      $v_nombre=true;
      verificarboton();
    }else{
      console.log(nombre.length);
      $v_nombre=false;
      setTimeout(function () {
        document.getElementById('nombre').classList.add("color_campos_incompletos");
        $(".mensajenombref").fadeIn(1500);
      }, 100);

      setTimeout(function () {
        document.getElementById('nombre').classList.remove("color_campos_incompletos");
        $(".mensajenombref").fadeOut(1500);
      }, 3000);

      verificarboton()
    }

  }else{
    setTimeout(function () {
      document.getElementById('nombre').classList.add("color_campos_incompletos");
      $(".mensajenombre").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('nombre').classList.remove("color_campos_incompletos");
      $(".mensajenombre").fadeOut(1500);
    }, 3000);

    $v_nombre=false;
    verificarboton();
  }

};



// Validar Dirección
function validarDirec() {
  $direccion = document.getElementById("direccion").value;

  if($direccion != ""){
    if($direccion.length+1>15){
      console.log($direccion.length);
      //validarNombre();
      $v_direccion=true;
      verificarboton();
    }else{
      console.log($direccion.length);
        $v_direccion=false;
        setTimeout(function () {
          document.getElementById('direccion').classList.add("color_campos_ocupados");
          $(".mensajedirecf").fadeIn(1500);
        }, 100);
  
        setTimeout(function () {
          document.getElementById('direccion').classList.remove("color_campos_ocupados");
          $(".mensajedirecf").fadeOut(1500);
        }, 3000);

        verificarboton();
        //validarNombre();
    }

  }else{
    setTimeout(function () {
      document.getElementById('direccion').classList.add("color_campos_incompletos");
      $(".mensajedirec").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('direccion').classList.remove("color_campos_incompletos");
      $(".mensajedirec").fadeOut(1500);
    }, 3000);
    $v_direccion=false;
    verificarboton();
    //validarNombre();
  }
};


function verificarboton() {
  if ($v_nombre == true &&  $v_direccion == true) {
    $("#btnadd").removeAttr("disabled");
    //document.addCancha.submit()
  } else {
    $("#btnadd").attr("disabled", "disabled");
  }
};


// VALIDACIONES MODIFICAR

// Validacion nombre
function validarNombreEdit() {
  $("#btnedit").removeAttr("disabled");
  $nombre= document.getElementById("nombre_edit").value;

  if($nombre != ""){
    if($nombre.length+1>4){
      console.log($nombre.length);
      $v_nombre=true;
      verificarbotonEdit();
    }else{
      console.log(nombre.length);
      $v_nombre=false;
      setTimeout(function () {
        document.getElementById('nombre_edit').classList.add("color_campos_incompletos");
        $(".mensajenombreeditf").fadeIn(1500);
      }, 100);

      setTimeout(function () {
        document.getElementById('nombre_edit').classList.remove("color_campos_incompletos");
        $(".mensajenombreeditf").fadeOut(1500);
      }, 3000);

      verificarbotonEdit();
    }

  }else{
    setTimeout(function () {
      document.getElementById('nombre_edit').classList.add("color_campos_incompletos");
      $(".mensajenombreedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('nombre_edit').classList.remove("color_campos_incompletos");
      $(".mensajenombreedit").fadeOut(1500);
    }, 3000);

    $v_nombre=false;
    verificarbotonEdit();
  }

};



// Validar Dirección
function validarDirecEdit() {
  $direccion = document.getElementById("direccion_edit").value;

  if($direccion != ""){
    if($direccion.length+1>15){
      console.log($direccion.length);
      //validarNombre();
      $v_direccion=true;
      verificarbotonEdit();
    }else{
      console.log($direccion.length);
        $v_direccion=false;
        setTimeout(function () {
          document.getElementById('direccion_edit').classList.add("color_campos_ocupados");
          $(".mensajedirecfedit").fadeIn(1500);
        }, 100);
  
        setTimeout(function () {
          document.getElementById('direccion_edit').classList.remove("color_campos_ocupados");
          $(".mensajedirecfedit").fadeOut(1500);
        }, 3000);

        verificarbotonEdit();
        //validarNombre();
    }

  }else{
    setTimeout(function () {
      document.getElementById('direccion_edit').classList.add("color_campos_incompletos");
      $(".mensajedirecedit").fadeIn(1500);
    }, 100);

    setTimeout(function () {
      document.getElementById('direccion_edit').classList.remove("color_campos_incompletos");
      $(".mensajedirecedit").fadeOut(1500);
    }, 3000);
    $v_direccion=false;
    verificarbotonEdit();
    //validarNombre();
  }

};


function verificarbotonEdit() {
  if ($v_nombreedit == true &&  $v_direccionedit == true) {
    $("#btnedit").removeAttr("disabled");
    //document.addCancha.submit()
  } else {
    $("#btnedit").attr("disabled", "disabled");
  }
};

function Activar(x) {

    $("#btnedit").removeAttr("disabled");
    //document.addCancha.submit()
};
