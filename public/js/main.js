// Dom is loaded
(function() {
  document.getElementById("btnNextStep1").addEventListener("click", function(e){
    e.target.parentElement.style.display = 'none'
  });



})();

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.991740, lng: 6.928846},
    zoom: 10
  });
}