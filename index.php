<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="640934542046-jefu4vm841tfp30qkba8vv1v57f7vn4f.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<?php
  include('templates/head.php');
?>
    <div class="row">
      <div class="col-12">
        <div class="jumbotron">
          <h1 class="display-3">
            <h1>Welcome!</h1>
          </h1>
          <p class="lead">This Is a Side Project for Google Cloud Platform.</p>
        </div>
      </div>
      <div class="col-4" v-for="route in routes">
        <h3>{{ route.key }}</h3>
        <table class="table">
          <thead>
            <tr>
              <td>Name</td>
              <td>Date</td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="path in route.paths">
              <td>{{ path.key }}</td>
              <td>{{ path.date }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php
  include('templates/foot.php');
?>