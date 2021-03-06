<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CKW Chat</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #d2d6de;">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="p-2 mt-5">
            <h1 class="logo" onclick="window.location.assign('index.php')">
                <b>CKW</b>
                <small class="text-muted">Chat</small>
            </h1>
        </div>
        <div class="p-2">
            <div class="card" style="width: 25rem;">
                <div class="card-header text-center text-white bg-success">
                    Sign in to start your session
                </div>
                <div class="card-body text-right">
                    <form id="form_login" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                            <i class="material-icons form-control-feedback">email</i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <i class="material-icons form-control-feedback">lock</i>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary" onclick="window.location.assign('register.php')">Go Register</button>
                            <button type="submit" name="btn_login" class="btn btn-success">Log In</button>
                            <div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
<?php
session_start();
require('UserService.php');
if(isset($_SESSION['islogin'])) {
    if($_SESSION['islogin'] == true) {
        header('Location: main.php');
    }
}
if(isset($_POST['btn_login'])){
    $userService = new UserService();
    $login_result = $userService->login($_POST['email'], $_POST['password']);
    if($login_result === true){
        $_SESSION["islogin"] = true;
        $_SESSION["userKey"] = $_POST["email"];
        header('Location: main.php');
    }
    else{
?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <?=$login_result?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>

</html>