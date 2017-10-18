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
</head>

<body style="padding-top: 4.5rem; font-family:Microsoft JhengHei;">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">GCP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" v-for="route in routes">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#!" id="navbarRoute" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ route.key }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarRoute">
              <a class="dropdown-item" :href="path.path" v-for="path in route.paths">{{ path.key }}</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  <div class="container">