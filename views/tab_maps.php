<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../views/js/tabla.js" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
    <!--Diseño css Sistema FutSal las Brumas-->
    <link href="../build/css/diseño.css" rel="stylesheet">
    <title>GoogleMaps</title>
    <script type="text/javascript">
      function selecciona(){

        var accion = document.getElementById("accion").value

        if(accion=="Guardar"){
          window.opener.document.getElementById('coorx').value = document.getElementById("coordsLa").value;
          window.opener.document.getElementById('coory').value = document.getElementById("coordsLo").value;
        }else{
          window.opener.document.getElementById('coorx_edit').value = document.getElementById("coordsLa").value;
          window.opener.document.getElementById('coory_edit').value = document.getElementById("coordsLo").value;
        }

        window.close();
      };

    </script>
  </head>
  <body>

    <div class="x_content">
      <div class="row">

      </div>
    </div>

    <div id="map"></div>
    <input  type="hidden" id="coordsLa"/>
    <input  type="hidden" id="coordsLo"/>
    <input  type="hidden" id="accion"/>
    <div class="modal-footer">
      <button type="button" class="btn btn btn-round  btn-cancelar" onclick="javascript:window.close()">
        <li class="fa fa-close cancelar"></li> Cancelar
      </button>
    </div>

    <script src="tab_script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR1KiaN6K3nqoRBKAB4yYGzq_1oVRVzPQ&callback=iniciarMap"></script>

  </body>
</html>
