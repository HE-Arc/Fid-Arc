
function toggleCompanyFormPage(startId, endId, checkField, sendForm = false){
  let startDiv = document.getElementById('companyRegisterPart' + startId);
  let endDiv = document.getElementById('companyRegisterPart' + endId);
  let errorMessage;

  if(checkField){
    let isFieldOk = true;


    for(let i = 0; i < startDiv.children.length; i++){
      let input = startDiv.children[i]

      if(input.nodeName == 'INPUT' || input.nodeName == 'TEXTAREA'){
        errorMessage = input.checkValidity()
        if(!errorMessage){
          isFieldOk = false;
          errorMessage = input.validationMessage;
          break;
        }
      }
    }
    if(isFieldOk){
      startDiv.style.display = 'none'
      endDiv.style.display = 'block'
      if(sendForm){
        document.querySelector('#createCompanyAccount form').submit();
      }
    } else {
      alert(errorMessage)
    }

  } else {
    startDiv.style.display = 'none'
    endDiv.style.display = 'block'
  }
}


let map; //Google maps object
let marker = null; //marker display on the map

/** Init the Google Maps */
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.991740, lng: 6.928846},
    zoom: 10,
    streetViewControl: false,
    fullscreenControl: false,
  });

  // Add listener on map clic
  google.maps.event.addListener(map, "click", function (event) {
      var latitude = event.latLng.lat();
      var longitude = event.latLng.lng();

      //store de latitude and longitude in hidden input
      document.getElementsByName('latitude')[0].value = latitude;
      document.getElementsByName('longitude')[0].value = longitude;

      // If the marker is defined, delete it on the map
      if(marker !== null){
        marker.setMap(null)
      }
      placeMarker(event.latLng);
  });
}

/**
 * Display a marker on the map
 * @param  {Object} location Google Maps object with location
 */
function placeMarker(location) {
    marker = new google.maps.Marker({
        position: location,
        map: map
    });
}
