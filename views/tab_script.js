
var id= window.opener.document.getElementById('tabid').value
var x= window.opener.document.getElementById('tablong'+id).value
var y=window.opener.document.getElementById('tablat'+id).value



function iniciarMap(){
  if(x!="" && y!=""){
    
      var coord =new google.maps.LatLng(x,y);
      document.getElementById("coordsLa").value =x
      document.getElementById("coordsLo").value =y
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
