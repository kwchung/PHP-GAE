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
        <div class="p-2">
            <h1>
                <b>CKW</b>
                <small class="text-muted">Chat</small>
            </h1>
        </div>
        <div class="p-2">
            <div class="card" style="width: 25rem;">
                <div class="card-header text-center text-white bg-primary">
                    Register a new membership
                </div>
                <div class="card-body text-right">
                    <form id="form_register" method="post" novalidate>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                            <i class="material-icons form-control-feedback">email</i>
                            <div class="invalid-feedback">
                                It's not an email.
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required>
                            <i class="material-icons form-control-feedback">lock</i>
                            <div class="invalid-feedback">
                                Please enter a password.
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password2" placeholder="Retype Password" oninput="check(this)" required>
                            <i class="material-icons form-control-feedback">lock</i>
                            <div class="invalid-feedback">
                                Please confirm a password.
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Full name" required>
                            <i class="material-icons form-control-feedback">person</i>
                            <div class="invalid-feedback">
                                Please enter your name.
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.assign('login.php')">Go Login</button>
                            <button type="submit" name="btn_register" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
<?php
require('UserService.php');
if(isset($_POST['btn_register'])){
    $userService = new UserService();
    if($userService->register($_POST['username'], $_POST['email'], $_POST['password1']) == false){
?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            The email <strong><?=$_POST['email']?></strong> is already taken.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
    else{
?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Register Success! Go <a class="alert-link" href="login.php">Log in</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
        <script>
            (function () {
                'use strict';

                window.addEventListener('load', function () {
                    var form = document.getElementById('form_register');
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                }, false);
            })();

            function check(input) {
                if (input.value != document.getElementById('password1').value) {
                    input.setCustomValidity('Password Must be Matching.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
        </script>
</body>

</html>