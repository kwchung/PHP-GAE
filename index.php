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