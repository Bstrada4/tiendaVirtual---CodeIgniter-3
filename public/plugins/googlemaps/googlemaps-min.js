
var number1 = parseFloat($('#map').attr("data-value1"));
var latid1 = parseFloat($('#map').attr("data-latid1")) || 0;
var long1 = parseFloat($('#map').attr("data-long1")) || 0;

var number2 = parseFloat($('#map').attr("data-value2"));
var latid2 = parseFloat($('#map').attr("data-latid2")) || 0;
var long2 = parseFloat($('#map').attr("data-long2")) || 0;

var number3 = parseFloat($('#map').attr("data-value3"));
var latid3 = parseFloat($('#map').attr("data-latid3")) || 0;
var long3 = parseFloat($('#map').attr("data-long3")) || 0;

var number4 = parseFloat($('#map').attr("data-value4"));
var latid4 = parseFloat($('#map').attr("data-latid4")) || 0;
var long4 = parseFloat($('#map').attr("data-long4")) || 0;

var number5 = parseFloat($('#map').attr("data-value5"));
var latid5 = parseFloat($('#map').attr("data-latid5")) || 0;
var long5 = parseFloat($('#map').attr("data-long5")) || 0;

var number6 = parseFloat($('#map').attr("data-value6"));
var latid6 = parseFloat($('#map').attr("data-latid6")) || 0;
var long6 = parseFloat($('#map').attr("data-long6")) || 0;

let arr0 = [];

if(long1 != 0 && latid1 != 0 ){
  var arr1 = [ [number1, -long1, -latid1] ];
}else{
  var arr1 = [];
}

if(long2 != 0 && latid2 != 0 ){
  var arr2 = [ [number2, -long2, -latid2] ];
}else{
  var arr2 = [];
}

if(long3 != 0 && latid3 != 0 ){
  var arr3 = [ [number3, -long3, -latid3] ];
}else{
  var arr3 = [];
}

if(long4 != 0 && latid4 != 0 ){
  var arr4 = [ [number4, -long4, -latid4] ];
}else{
  var arr4 = [];
}

if(long5 != 0 && latid5 != 0 ){
  var arr5 = [ [number5, -long5, -latid5] ];
}else{
  var arr5 = [];
}

if(long6 != 0 && latid6 != 0 ){
  var arr6 = [ [number6, -long6, -latid6] ];
}else{
  var arr6 = [];
}

let arr_end = arr0.concat(arr1,arr2,arr3,arr4,arr5,arr6);

var markers =   arr_end;

function initialize() {
    
  var center = {lat: long1, lng: latid1},
      map = new google.maps.Map(document.getElementById('map'), {
        disableDefaultUI: true,
        center: center,
        zoom: 11,
        disableDefaultUI:true,
        zoomControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_LEFT
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        rotateControl: true,
        fullscreenControl: true,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
  });

  var Markers = [];
  
  var iconNormal = base_url + 'public/img/iconos/map-icon-1.png',
      iconSelected = base_url + 'public/img/iconos/map-icon-2.png',
      bounds = new google.maps.LatLngBounds();
  function setMarkers(map) {
    for (var i = 0; i < markers.length; i++) {
      var marker = markers[i],
          myLatLng = new google.maps.LatLng(marker[1], marker[2]),
          eachMarker = new google.maps.Marker({
            record_id: i,
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP,
            icon: iconNormal,
            title: String(marker[0])
      });
      //var selectedMarker;
      bounds.extend(myLatLng);
      Markers.push(eachMarker);

     /*google.maps.event.addListener(eachMarker,'click', function() {
        changeIcon(this);
      });

      function changeIcon(e){
        if (selectedMarker) {
          selectedMarker.setIcon(iconNormal);
        }
        e.setIcon(iconSelected);
        selectedMarker = e;
      }*/
      
      // choose from list
      $('.list_direcciones li').on('click', function(){
        
        $("li.activo").removeClass('activo');
        $(this).addClass('activo');
        
        mapItem = $(this).index();
        changeMarker(mapItem);                             
        var thisLat = markers[mapItem] [1],
            thisLon = markers[mapItem] [2];
        map.panTo({lat: thisLat, lng: thisLon});
      });

      function changeMarker(record_id){
        for (i in Markers){
          Markers[i].setIcon(iconNormal);
          Markers[record_id].setIcon(iconSelected);
        }
      }
    }
  }
  map.fitBounds(bounds);
  setMarkers(map);

}
google.maps.event.addDomListener(window, 'load', initialize);