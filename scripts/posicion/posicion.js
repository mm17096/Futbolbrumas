ActualizarJugador();
function ActualizarJugador(){
    if(window.XMLHttpRequest){
        xmlhttp= new XMLHttpRequest();
    }else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState== 4 && xmlhttp.status ==200){
         document.getElementById("tablaposicion").innerHTML= xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../view/tablaposicion.php", true);
    xmlhttp.send();

}