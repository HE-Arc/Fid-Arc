

/**
 * Toggle company form page and check if all inputs are not empty before to change page
 * @param  {Integer}  startId          id of start page, this page will be hidden
 * @param  {Integer}  endId            id of end page, this page will be displayed
 * @param  {Boolean}  checkField       true, if the field must be not empty, false for no verification
 * @param  {Boolean} [sendForm=false] true to send form, false otherwise
 */
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

function useMap(latitude, longitude){
  let mapCompanyRegisterElem = document.getElementById('mapCompanyRegister');
  let mapPartnersElem = document.getElementById('mapPartners');

  if(mapPartnersElem){
    mapPartners = new google.maps.Map(mapPartnersElem, {
      center: {lat: latitude, lng: longitude},
      zoom: 10,
      streetViewControl: false,
      fullscreenControl: false,
    });

    fetch('api/companies')
      .then(
        function(response) {
          if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status);
            return;
          }

          response.json().then(function(data) {
            for(i in data.data){
              let markerPartner = new google.maps.Marker({
                  position: new google.maps.LatLng(data.data[i].latitude, data.data[i].longitude),
                  title: data.data[i].company_name,
                  animation: google.maps.Animation.DROP,
                  map:mapPartners
                });

                let infoWindow = new google.maps.InfoWindow({
                    content: '<h2>' + data.data[i].company_name + '</h2>' +'<p><strong>Company description : </strong>'+data.data[i].company_description+'</p>'
                  });

                google.maps.event.addListener(markerPartner , 'click', function () {
                  infoWindow.open(mapPartners, markerPartner );
                });
            }
          });
        }
      )
      .catch(function(err) {
        console.log('Fetch Error :-S', err);
      });
  }

  if(mapCompanyRegisterElem){
    mapCompanyRegister = new google.maps.Map(mapCompanyRegisterElem, {
      center: {lat: latitude, lng: longitude},
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
  google.maps.event.addListener(mapCompanyRegister, "click", function (event) {
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
}

let marker = null; //marker display on the map

/** Init the Google Maps */
function initMap() {
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition((pos)=> {
      useMap(pos.coords.latitude, pos.coords.longitude);
    }, (error) => {
      useMap(46.992244, 6.924915);
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
        map: mapCompanyRegister
    });
}
