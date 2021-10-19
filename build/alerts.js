var $toastlast;


$('#dat_guardado').click(function () {
    var shortCutFunction = "success";// tipo de alerta
    var title= 'Registro Almacenado';//titulo
    var msg =  'El registo se ha Almacenado con éxito';// mensaje
    boton();
    var $toast = toastr[shortCutFunction](msg, title);// evento para mandar a llamar la alerta
    $toastlast = $toast;

    if(typeof $toast === 'undefined'){
        return;
    }
});

$('#dat_modificado').click(function () {
    var shortCutFunction = "info";// tipo de alerta
    var title= 'Registro Modificado';//titulo
    var msg =  'El registo se ha modicado con éxito';// mensaje
    boton();
    var $toast = toastr[shortCutFunction](msg, title);// evento para mandar a llamar la alerta
    $toastlast = $toast;

    if(typeof $toast === 'undefined'){
        return;
    }
});


$('#dat_abvertencia').click(function () {
    var shortCutFunction = "warning";// tipo de alerta
    var title= 'Campos Incompletos';//titulo
    var msg =  'Por favor complete los campos obligatorios';// mensaje


    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "rtl": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": 300,
      "hideDuration": 1000,
      "timeOut": 5000,
      "extendedTimeOut": 1000,
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };

    var $toast = toastr[shortCutFunction](msg, title);// evento para mandar a llamar la alerta
    $toastlast = $toast;

    if(typeof $toast === 'undefined'){
        return;
    }
});


$('#dat_eliminado').click(function () {
    var shortCutFunction = "error";// tipo de alerta
    var title= 'Registro Eliminado';//titulo
    var msg =  'El registo se ha eliminado con éxito';// mensaje
    boton();
    var $toast = toastr[shortCutFunction](msg, title);// evento para mandar a llamar la alerta
    $toastlast = $toast;

    if(typeof $toast === 'undefined'){
        return;
    }
});


function boton(){
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
}
