// -------------- Inicio de Sesion ------------------- //
function iniciarsesion() {
    var_dum();
    var parametros = $("#datasesion").serialize();
    
    $.ajax({
        type: "POST",
        url: "../controller/usuario_controller.php?action=iniciar",
        data: parametros,
        success: function (datos) {
            //$("#resultados").html(datos);
            $("#user").val("");
            $("#password").val("");
        }
    });
};