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
</head>
<?php
include('../templates/head.php');
?>
      <form method="get">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Please entry your name...">
        </div>
        <div class="form-group">
          <label for="hobbies">Hobbies</label>
          <select name="hobbies" id="hobbies" class="form-control">
            <option value="swim">swim</option>
            <option value="run">run</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <?php
      if(isset($_GET["name"])){
        $get_name = $_GET["name"];
        $get_hobbies = $_GET["hobbies"];
        if ( $get_name != "" && $get_hobbies != "" ){
          echo "This is Get! <br>";
          echo "My name is " . $get_name ."<br>";
          echo "My hobby is " . $get_hobbies;
        }
      }
    ?>

        <form method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Please entry your name...">
          </div>
          <div class="form-group">
            <label for="hobbies">Hobbies</label>
            <select name="hobbies" id="hobbies" class="form-control">
              <option value="swim">swim</option>
              <option value="run">run</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
      if(isset($_GET["name"])){
        $post_name = $_POST["name"];
        $post_hobbies = $_POST["hobbies"];
        if ( $post_name != "" && $post_hobbies != "" ){
            echo "This is Post! <br>";
            echo "My name is " . $post_name ."<br>";
            echo "My hobby is " . $post_hobbies;
        }
      }
    ?>

<?php
include('../templates/foot.php');
?>