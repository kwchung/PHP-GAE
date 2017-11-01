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
                <button type="button" class="btn btn-primary" onclick="addToCalendar()">加入行事曆</button>
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

        function addToCalendar() {
            // Client ID and API key from the Developer Console
            var CLIENT_ID = '640934542046-jefu4vm841tfp30qkba8vv1v57f7vn4f.apps.googleusercontent.com';

            // Array of API discovery doc URLs for APIs used by the quickstart
            var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

            // Authorization scopes required by the API; multiple scopes can be
            // included, separated by spaces.
            var SCOPES = "https://www.googleapis.com/auth/calendar";

            var event = {
                'summary': 'Google I/O 2015',
                'location': '800 Howard St., San Francisco, CA 94103',
                'description': 'A chance to hear more about Google\'s developer products.',
                'start': {
                    'dateTime': '2015-05-28T09:00:00-07:00',
                    'timeZone': 'America/Los_Angeles'
                },
                'end': {
                    'dateTime': '2015-05-28T17:00:00-07:00',
                    'timeZone': 'America/Los_Angeles'
                },
                'recurrence': [
                    'RRULE:FREQ=DAILY;COUNT=2'
                ],
                'attendees': [
                    { 'email': 'lpage@example.com' },
                    { 'email': 'sbrin@example.com' }
                ],
                'reminders': {
                    'useDefault': false,
                    'overrides': [
                        { 'method': 'email', 'minutes': 24 * 60 },
                        { 'method': 'popup', 'minutes': 10 }
                    ]
                }
            };

            var request = gapi.client.calendar.events.insert({
                'calendarId': 'primary',
                'resource': event
            });

            request.execute(function (event) {
                appendPre('Event created: ' + event.htmlLink);
            });
        }

        /**
         *  On load, called to load the auth2 library and API client library.
         */
        function handleClientLoad() {
            gapi.load('client:auth2', initClient);
        }

        /**
         *  Initializes the API client library and sets up sign-in state
         *  listeners.
         */
        function initClient() {
            gapi.client.init({
                discoveryDocs: DISCOVERY_DOCS,
                clientId: CLIENT_ID,
                scope: SCOPES
            }).then(function () {
                // Listen for sign-in state changes.
                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

                // Handle the initial sign-in state.
                updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
                authorizeButton.onclick = handleAuthClick;
                signoutButton.onclick = handleSignoutClick;
            });
        }

        /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
        function updateSigninStatus(isSignedIn) {
            if (isSignedIn) {
                authorizeButton.style.display = 'none';
                signoutButton.style.display = 'block';
                listUpcomingEvents();
            } else {
                authorizeButton.style.display = 'block';
                signoutButton.style.display = 'none';
            }
        }

        /**
         *  Sign in the user upon button click.
         */
        function handleAuthClick(event) {
            gapi.auth2.getAuthInstance().signIn();
        }

        /**
         *  Sign out the user upon button click.
         */
        function handleSignoutClick(event) {
            gapi.auth2.getAuthInstance().signOut();
        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5anv3gT1jeiBQTmmFsFP8CoKOkaL2AA&callback=initMap"></script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

    <?php
    include('../templates/foot.php');
?>