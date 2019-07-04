<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html class="h-100">
    <head>
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <script src="js/jobs.js"></script>
    </head>

    <body class="h-100">

        <div class="content-wrapper">
            <header>
                <nav class="navbar bg-primary">
                    <a class="btn btn-lg btn-outline-warning" href="index.php">Acasa</a>
                </nav>
            </header>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h1>Adauga job</h1>
                        <form method="post" action="register.php">
                            <div class="form-group">
                                <label>Categorie</label>
                                <select class="form-control" name="type">
                                    <option selected>Alege o categorie</option>
                                    <?php include 'server.php';
                                    $array = getTypes();?>
                                    <?php foreach($array as $key => $elem): ?>
                                    <option>
                                        <?php echo $elem['name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Descriere</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Data expirare</label>
                                <input type="date" class="form-control" name="expdate">
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