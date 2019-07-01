<?php include 'server.php';?>
<!DOCTYPE html>
<html class="h-100">
    <head>
        <title>Inregistrate jobby</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="h-100">
    <div class="content-wrapper">
        <div class="row align-items-center justify-content-center content-wrapper">
            <div class="col-6">
                <h1>Inregistrare</h1>
                <form method="post" action="register.php">
                    <?php include 'errors.php';?>
                    <div class="form-group">
                        <label>Nume utilizator</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Nume</label>
                        <input type="text" class="form-control" name="last-name">
                    </div>
                    <div class="form-group">
                        <label>Prenume</label>
                        <input type="text" class="form-control" name="first-name">
                    </div>
                    <div class="form-group">
                        <label>Parola</label>
                        <input type="password" class="form-control" name="passw-1">
                    </div>
                    <div class="form-group">
                        <label>Confirma parola</label>
                        <input type="password" class="form-control" name="passw-2">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="reg_user">Inregistreaza-te!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">
<!--        <footer class="">-->
            <div class="row text-light justify-content-around page-footer font-small blue bg-primary">

                <!-- Copyright -->
                <div class="col-lg-3 col-md-4 col-sm-6 footer-copyright text-left pl-5 py-3">© 2018 Copyright:
                    <a class="footer-link" href="">Jobby SRL</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 ml-auto pr-5 py-3">
                    <ul class="my-list">
                        <li>
                            Contact: 555-012-4675
                        </li>
                        <li>
                            Email:
                            <a class="footer-link" href="">dummy_mail@dummy.com</a>
                        </li>
                        <li>
                            <a class="footer-link" href="">Facebook</a>
                        </li>
                    </ul>
                </div>
                <!-- Copyright -->
            </div>

<!--        </footer>-->
    </div>
    </body>
</html>