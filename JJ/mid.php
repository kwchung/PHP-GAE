<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="640934542046-jefu4vm841tfp30qkba8vv1v57f7vn4f.apps.googleusercontent.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<?php
    include('../templates/head.php');
?>

    <div class="row">
        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="email" class="form-control" id="to" placeholder="Enter To">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter date">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" readonly>
                </div>
                <button type="button" class="btn btn-primary">加入行事曆</button>
                <button type="submit" class="btn btn-success">送信</button>
            </form>
        </div>
        <div class="col-8">
            <div id="map"></div>
        </div>
    </div>
    <script>
        var map;
        var marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: { lat: 37.769, lng: -122.446 }
            });


            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    document.getElementById('location').value = '[ ' + pos.lat.toFixed(5) + ', ' + pos.lng.toFixed(5) + ' ]';

                    // Adds a marker at the center of the map.
                    addMarker(map, pos);
                    map.setCenter(pos);
                });
            } else {
                console.log('Browser doesn\'t support Geolocation');
            }

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function (event) {
                addMarker(map, event.latLng);
                document.getElementById('location').value = '[ ' + event.latLng.lat().toFixed(5) + ', ' + event.latLng.lng().toFixed(5) + ' ]';
            });
        }

        // Adds a marker to the map and push to the array.
        function addMarker(map, location) {
            if (marker == null) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            } else {
                marker.setPosition(location);
            }
            marker.setMap(map);
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.'
            );
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5anv3gT1jeiBQTmmFsFP8CoKOkaL2AA&callback=initMap">
    </script>

    <?php
    include('../templates/foot.php');
?>