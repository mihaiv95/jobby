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
        <header>
            <nav class="navbar bg-primary">
<!--                <form class="form-inline ml-auto">-->
<!--                    <input class="form-control" type="search" placeholder="Cauta" aria-label="Search">-->
<!--                    <button class="btn text-light btn-outline-warning" type="submit">Cauta</button>-->
<!--                </form>-->
                <a class="btn btn-lg btn-outline-warning" href="login.php">Inapoi la Login</a>

            </nav>
        </header>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Inregistrare</h1>
                <form method="post" action="register.php">
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
                    <?php include 'errors.php';?>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid footer">
        <div class="row text-light page-footer font-small blue bg-primary align-items-center justify-content-between">

            <!-- Copyright -->
            <div class="col-lg-3 col-md-4 col-sm-6 footer-copyright text-left px-3 mx-0">© 2018 Copyright:
                <a class="footer-link" href="">Jobby SRL</a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
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
    </div>
    </body>
</html>