<html>
<html>
<head>
<title>
Geolocation Test
</title>
</head>
<body>

<div id="demo"></div>
<div id="start"></div>
<div id="end"></div>

<script>
var holtCoords = {latitude: 42.653761, longitude: -84.490014};
var reoCoords = {latitude: 42.7213319, longitude: -84.554087};
var westCoords = {latitude: 42.725918, longitude: -84.663025};
var msuCoords = {latitude: 42.701848, longitude: -84.4843606};
var x = document.getElementById("demo");
var startDiv = document.getElementById("start");
var endDiv = document.getElementById("end");
function getLocation() {
    startDiv.innerHTML = new Date();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function toRad(degrees) {
    return degrees * (Math.PI / 180);
}

function distanceBetween(myCoords, venueCoords) {
    var lat1 = myCoords.latitude;
    var lon1 = myCoords.longitude;
    var lat2 = venueCoords.latitude;
    var lon2 = venueCoords.longitude;

    var R = 6371 * 0.621371; // miles
    var dLat = toRad(lat2-lat1);
    var dLon = toRad(lon2-lon1);
    var lat1 = toRad(lat1);
    var lat2 = toRad(lat2);

    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c;
    return d + "miles";
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude +
    "<br><br>Distance to Holt: " + distanceBetween(position.coords, holtCoords) +
    "<br>Distance to REO: " + distanceBetween(position.coords, reoCoords) +
    "<br>Distance to The Westside: " + distanceBetween(position.coords, westCoords) +
    "<br>Distance to MSU: " + distanceBetween(position.coords, msuCoords) +
    "<br><br>";

    endDiv.innerHTML = new Date();
}

getLocation();
</script>
</body>
</html>
