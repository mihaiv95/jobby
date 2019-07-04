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
                    <form class="form-inline ml-auto">
                        <input class="form-control" type="search" placeholder="Cauta" aria-label="Search">
                        <button class="btn text-light btn-outline-warning" type="submit">Cauta</button>
                    </form>
                </nav>
            </header>
            <div class="container-fluid">

                <div class="row justify-content-around align-items-center py-5">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="list-group text-center">
                            <div class="list-group-item">
                                <?php echo "Conectat ca: " . $_SESSION['username'] . "</p><p><img class=\"img-fluid\" src=" . $_SESSION['image'] . "></p>";

                                ?>
                            </div>
                            <a href="addjob.php" class="list-group-item list-group-item-action">Adauga anunt</a>
                            <a href="#" class="list-group-item list-group-item-action">Profilul meu</a>
                            <a href="#" class="list-group-item list-group-item-action">Inbox</a>
                            <a href="#" class="list-group-item list-group-item-action">Help</a>
                            <a href="index.php?logout='1'" class="list-group-item list-group-item-action font-weight-bold text-danger">Logout</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <?php
                                    include 'utils.php';
                                    printJobs(getJobs());
                                ?>
                                <button type="button" class="btn btn-primary btn-lg">
                                    Prev
                                </button>
                                <button type="button" class="btn btn-primary btn-lg">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="info">

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