<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> update js toggle and check function
/**
 * Toggle company form page and check if all inputs are not empty before to change page
 * @param  {Integer}  startId          id of start page, this page will be hidden
 * @param  {Integer}  endId            id of end page, this page will be displayed
 * @param  {Boolean}  checkField       true, if the field must be not empty, false for no verification
 * @param  {Boolean} [sendForm=false] true to send form, false otherwise
 */
<<<<<<< HEAD
function toggleCompanyFormPage(startId, endId, checkField, sendForm = false){
  let startDiv = document.getElementById('companyRegisterPart' + startId);
  let endDiv = document.getElementById('companyRegisterPart' + endId);

  if(checkField){
    let isFieldOk = true;

    //browse all childrens of the subpage
    for(let i = 0; i < startDiv.children.length; i++){
      let input = startDiv.children[i]

      //if the children are inputs or textarea
      if(input.nodeName == 'INPUT' || input.nodeName == 'TEXTAREA'){
        //check if the field is null or not
        if(input.value == "" || input.value == null){
          isFieldOk = false;
        }
      }
    }

    //if no fields are empty, display the hide the start page and display the end page
    //otherwise send a message to the user
    if(isFieldOk){
      startDiv.style.display = 'none'
      endDiv.style.display = 'block'
      if(sendForm){
        document.querySelector('#createCompanyAccount form').submit();
      }
    } else {
      Swal.fire({type: 'error',
        title: 'Error...',
        text: 'Please input all fileds!'})
    }
  } else {//if the page change does not require verification, such as a rollback for example
    startDiv.style.display = 'none'
    endDiv.style.display = 'block'
  }
}

let map; //Google maps object
let marker = null; //marker display on the map

/** Init the Google Maps */
function initMap() {
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition((pos)=> {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: pos.coords.latitude, lng: pos.coords.longitude},
        zoom: 10,
        streetViewControl: false,
        fullscreenControl: false,
      });

    //If there was an error in the form reloads the marker on the map
    let htmlLatitude = document.getElementsByName('latitude')[0].value;
    let htmlLongitude = document.getElementsByName('longitude')[0].value;
    if(htmlLatitude !== "" && htmlLongitude !== ""){
      placeMarker({lat: parseFloat(htmlLatitude), lng: parseFloat(htmlLongitude)});
    }

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
    });
  } else {
  alert("Please active geolocation !");
  }
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
=======
// Dom is loaded
(function() {
  document.getElementById("btnNextStep1").addEventListener("click", function(e){
    e.target.parentElement.style.display = 'none'
  });
=======
>>>>>>> add company register form with page toggler

=======
>>>>>>> update js toggle and check function
function toggleCompanyFormPage(startId, endId, checkField, sendForm = false){
  let startDiv = document.getElementById('companyRegisterPart' + startId);
  let endDiv = document.getElementById('companyRegisterPart' + endId);

  if(checkField){
    let isFieldOk = true;

    //browse all childrens of the subpage
    for(let i = 0; i < startDiv.children.length; i++){
      let input = startDiv.children[i]

      //if the children are inputs or textarea
      if(input.nodeName == 'INPUT' || input.nodeName == 'TEXTAREA'){
        //check if the field is null or not
        if(input.value == "" || input.value == null){
          isFieldOk = false;
        }
      }
    }

    //if no fields are empty, display the hide the start page and display the end page
    //otherwise send a message to the user
    if(isFieldOk){
      startDiv.style.display = 'none'
      endDiv.style.display = 'block'
      if(sendForm){
        document.querySelector('#createCompanyAccount form').submit();
      }
    } else {
      Swal.fire({type: 'error',
        title: 'Error...',
        text: 'Please input all fileds!'})
    }
  } else {//if the page change does not require verification, such as a rollback for example
    startDiv.style.display = 'none'
    endDiv.style.display = 'block'
  }
}

<<<<<<< HEAD

<<<<<<< HEAD
})();
<<<<<<< HEAD
>>>>>>> add begin of companies register form
=======
=======
=======
>>>>>>> update js toggle and check function
let map; //Google maps object
let marker = null; //marker display on the map
>>>>>>> add company register form with page toggler

/** Init the Google Maps */
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.991740, lng: 6.928846},
    zoom: 10,
    streetViewControl: false,
    fullscreenControl: false,
  });
<<<<<<< HEAD
}
>>>>>>> add google map on form
=======

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
>>>>>>> add company register form with page toggler
