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
                    <form id="form_register" novalidate>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" name="username" placeholder="Full name" required>
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                Please provide your full name.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                Please provide an email.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                Please provide a password.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password2" placeholder="Retype Password" required>
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                Please provide a password.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
    </script>
</body>

</html>