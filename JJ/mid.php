<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        #map {
            height: 150%;
            width: 100%;
        }
    </style>
</head>
<?php
    include('../templates/head.php');
?>
<div class="row">
    <div class="col-4">
        <form id="needs-validation">
            <div class="form-group">
                <label for="to">To</label>
                <input type="email" class="form-control" id="to" placeholder="Enter To" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="start">start</label>
                <input type="datetime-local" class="form-control" id="start" placeholder="Enter start" required>
            </div>
            <div class="form-group">
                <label for="end">end</label>
                <input type="datetime-local" class="form-control" id="end" placeholder="Enter end" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="go()">加入行事曆 & 寄信</button>
        </form>
    </div>
    <div class="col-8">
        <div id="map"></div>
    </div>
</div>
<script>
    var CLIENT_ID = '640934542046-jefu4vm841tfp30qkba8vv1v57f7vn4f.apps.googleusercontent.com';
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest",
        "https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
    var SCOPES = 'profile' + ' ' +
        'https://www.googleapis.com/auth/calendar' + ' ' +
        'https://www.googleapis.com/auth/gmail.send';

    function go() {
        var form = document.getElementById('needs-validation');
        if (form.checkValidity() === false) {
            form.classList.add('was-validated');
        } else {
            addToCalendar();
            sendMail();
        }
    }

    // [Google Sign-in Start]

    var authorizeButton = document.getElementById('authorize-button');
    var signoutButton = document.getElementById('signout-button');
    var avatar = document.getElementById('avatar-img');

    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }

    function initClient() {
        gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
            clientId: CLIENT_ID,
            scope: SCOPES
        }).then(function () {
            var GoogleAuth = gapi.auth2.getAuthInstance();
            GoogleAuth.isSignedIn.listen(updateSigninStatus);
            updateSigninStatus(GoogleAuth.isSignedIn.get());
        });
    }

    function updateSigninStatus(isSignedIn) {
        var GoogleAuth = gapi.auth2.getAuthInstance();
        if (isSignedIn) {
            authorizeButton.style.display = "none";
            signoutButton.style.display = "block";
            var profile = GoogleAuth.currentUser.get().getBasicProfile();
            avatar.src = profile.getImageUrl();
            avatar.style.display = "inline-block";
        } else {
            authorizeButton.style.display = "block";
            signoutButton.style.display = "none";
        }
    }

    function handleAuthClick(event) {
        var GoogleAuth = gapi.auth2.getAuthInstance();
        GoogleAuth.signIn().then(function () {
            updateSigninStatus(true);
        });
    }

    function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
        avatar.style.display = "none";
        console.log("Sign Out!!!");
        updateSigninStatus(false);
    }

    // [Google Sign-in End]

    // [Google Map Start]
    // https://developers.google.com/gmail/api/v1/reference/users/messages/send

    var map;
    var marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 37.769, lng: -122.446 },
            zoom: 15
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

    // [Google Map End]

    // [Google Calendar Start]

    function addToCalendar() {
        var title = document.getElementById('title').value;
        var to = document.getElementById('to').value;
        var start = document.getElementById('start').value + ':00+08:00';
        var end = document.getElementById('end').value + ':00+08:00';
        var location = document.getElementById('location').value;
        var event = {
            'summary': title,
            'location': location,
            'start': {
                'dateTime': start,
                'timeZone': 'Asia/Taipei'
            },
            'end': {
                'dateTime': end,
                'timeZone': 'Asia/Taipei'
            },
            'recurrence': [
                'RRULE:FREQ=DAILY;COUNT=1'
            ],
            'attendees': [
                { 'email': to }
            ],
            'reminders': {
                'useDefault': false,
                'overrides': [
                    { 'method': 'popup', 'minutes': 30 }
                ]
            }
        };

        var request = gapi.client.calendar.events.insert({
            'calendarId': 'primary',
            'resource': event
        });

        request.execute(function (event) {
            console.log(event);
        });
    }
    // [Google Calendar End]

    // [Google Gmail Start]
    // https://developers.google.com/gmail/api/v1/reference/users/messages/send?hl=zh-TW

    function sendMail() {
        var title = document.getElementById('title').value;
        var to = document.getElementById('to').value;
        var start = document.getElementById('start').value + ':00+08:00';
        var end = document.getElementById('end').value + ':00+08:00';
        var location = document.getElementById('location').value;

// RFC 1342
// =?charset?encoding?encoded-text?=
// http://dchesmis.blogspot.tw/2016/06/e-mailutf8.html
        var email = '';
        var headers_obj = {
            'To': to,
            'Subject': "=?UTF-8?B?" + Base64.encodeURI(title) + "?="
        }
        var message = start + ' - ' + end + '\r\n在 ' + location;
        for (var header in headers_obj)
            email += header += ": " + headers_obj[header] + "\r\n";
        email += "\r\n" + message;
        console.log(email);

        // Using the js-base64 library for encoding:
        // https://www.npmjs.com/package/js-base64
        var base64EncodedEmail = Base64.encodeURI(email);
        var request = gapi.client.gmail.users.messages.send({
            'userId': 'me',
            'resource': {
                'raw': base64EncodedEmail
            }
        });
        request.execute(function(){
            alert("mail send!");
        });
    }

// [Google Gmail End]
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5anv3gT1jeiBQTmmFsFP8CoKOkaL2AA&callback=initMap"></script>
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
<script src="base64.js"></script>
<?php
    include('../templates/foot.php');
?>