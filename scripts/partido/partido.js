
TablaJornada();


$("#addTitular").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/partido_controller.php?accion=titular",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalTitulares').modal('hide');

        }
    });

    event.preventDefault();
});



$("#addFin").submit(function (event) {
    var parametros = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "../controller/partido_controller.php?accion=finalizar",
        data: parametros,
        success: function (datos) {
            $("#resultados").html(datos);
            $("#message").html(datos);
            $('#modalFinalizar').modal('hide');


        }
    });

    event.preventDefault();
});


$('#modalFinalizar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidof')
    $('#idpartidofalta').val(partido)

    var jugador = button.data('jugadorf')
    $('#idjugadorfalta').val(jugador)


})


$('#modalBorrar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    var partido = button.data('partidod')
    $('#idpartidoborrar').val(partido)

    var jugador = button.data('jugadord')
    $('#idjugadorborrar').val(jugador)

    TablaGoles(jugador,partido);


})


function rederigir (id){
  console.log(id);
  $(location).attr('href',"../views/vis_datospartido.php?idpartido="+id);

}



function calcular(obj, opc){
    if(opc==1)
        obj.checked = (document.getElementById("chk_todos").checked==true)?true:false;
    var val = (obj.checked == true)? obj.id.split("_")[1] : 0;
    obj.value = val;
    //document.getElementById("text_"+ obj.id.split("_")[1]).value = val;

}

function calcularTodos(){
    for(var i = 0 ; i < document.getElementsByName("checka").length; i++)
        calcular(document.getElementsByName("checka")[i], 1);


}


function TablaJornada() {
    if (window.XMLHttpRequest) {
        xmlhttp9 = new XMLHttpRequest();
    } else {
        xmlhttp9 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp9.onreadystatechange = function () {
        if (xmlhttp9.readyState == 4 && xmlhttp9.status == 200) {

            document.getElementById("jornadadatos").innerHTML = xmlhttp9.responseText;

        }
    }
    xmlhttp9.open("GET", "../views/tab_jornadadatos.php", true);
    xmlhttp9.send();
}
