function initOpenStreetMap(container_id, latitude_default, longitude_default, zoom_default, markers, bounds){
    // CHECK PARAMETERS
    if (markers == null){ markers = '[]'; }
    if (bounds == null){ bounds = '[]'; }

    try {
        var markers = JSON.parse(markers);
    } catch(e) {
        //console.log('DEBUG OpenStreetMap: Invalid JSON for markers');
    }

    try {
        var bounds = JSON.parse(bounds);
    } catch(e) {
        //console.log('DEBUG OpenStreetMap: Invalid JSON for bounds');
    }

    // VARS

    /*var orangeMarker = L.icon({
        iconUrl: 'openstreetmap/img/markerOrange.png',

        iconSize:     [48, 48], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [3, -76] // point from which the popup should open relative to the iconAnchor
    });*/
    
    
    var openstreetmap = new L.Map(container_id);

    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var osmAttrib = 'Map data © OpenStreetMap contributors';
    var osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });

    // MAP SETTERS
    openstreetmap.setView(new L.LatLng(latitude_default, longitude_default), zoom_default);

    if(markers.length > 0){
        for(var i = 0; i < markers.length; i++) {

            var marker = L.marker([markers[i].lat, markers[i].long]).addTo(openstreetmap);
            //var marker = L.marker([markers[i].lat, markers[i].long], {icon: orangeMarker}).addTo(openstreetmap);
            if(markers[i].text != ''){
                marker.bindPopup(markers[i].text);
            }

        }
    }else{
        //console.log('DEBUG OpenStreetMap: No markers');
    }

    if(bounds.length > 1){

        var arrayBounds = [];
        for(var i = 0; i < bounds.length; i++) {
            arrayBounds.push([bounds[i].lat, bounds[i].long]);
        }

        var osmBounds = new L.LatLngBounds(arrayBounds);
        openstreetmap.fitBounds(osmBounds);

    }else{
        //console.log('DEBUG OpenStreetMap: No markers');
    }


    // MAP RENDER
    openstreetmap.addLayer(osm);
}