var cx=13.648910804689628;
var cy=-88.7606887527344;

var x= window.opener.document.getElementById('coorx').value
var y=window.opener.document.getElementById('coory').value

var xe= window.opener.document.getElementById('coorx_edit').value
var ye=window.opener.document.getElementById('coory_edit').value

var accion_edit = window.opener.document.getElementById('accion_edit').value
var accion_add = window.opener.document.getElementById('accion_add').value


function iniciarMap(){
  if(xe!="" && ye!="" && accion_edit === "Modificar" ){
    var coord =new google.maps.LatLng(xe,ye);
    document.getElementById("accion").value = accion_edit
    accion_add = "";
    accion_edit = "";
    document.getElementById("coordsLa").value =xe
    document.getElementById("coordsLo").value =ye

  }else{
    if(x!="" && y!="" && accion_add === "Guardar"){
      document.getElementById("accion").value = accion_add;
      accion_add = "";
      accion_edit = "";
      var coord =new google.maps.LatLng(x,y);
      document.getElementById("coordsLa").value =x
      document.getElementById("coordsLo").value =y

    }else{
      var coord =new google.maps.LatLng(cx,cy);
      document.getElementById("accion").value = "Guardar";
      document.getElementById("coordsLa").value =cx
      document.getElementById("coordsLo").value =cy
    }
  }
   var map = new google.maps.Map(document.getElementById('map'),{
     zoom: 8,
     center:coord
   });

   var marker =new google.maps.Marker({
     position: coord,
     map: map,
     draggable: true,
     animation: google.maps.Animation.DROP
   });

   marker.addListener('click',toggleBounce);

   marker.addListener('dragend', function (event) {

     document.getElementById("coordsLa").value = this.getPosition().lat();
     document.getElementById("coordsLo").value = this.getPosition().lng();
   });
}

function toggleBounce(){
  if (marker.getAnimation()!==null) {
    marker.setAnimation(null);
  }else{
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
