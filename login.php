<?php include 'server.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6 col-sm-8">
                <h1 class="display-1">Login</h1>

                <form method="post" class="form-group" action="login.php">
                    <label for="username" class="mr-sm-2">Nume utilizator:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="username" name="username">
                    <label for="pwd" class="mr-sm-2">Parola:</label>
                    <input type="password" class="form-control mb-2 mr-sm-2" id="pwd" name="password">
                    <button type="submit" class="btn btn-primary mb-2" name="login_user">Login</button>
                </form>

                </p>
                    Nu aveti cont ? <a href="register.php">Inregistreaza-te!</a>
                </p>
                <?php include 'errors.php';?>

            </div>

        </div>

        <footer class="page-footer font-small blue fixed-bottom bg-primary">
            <div class="row text-light">

                <!-- Copyright -->
                <div class="col-lg-3 col-md-4 col-sm-6 footer-copyright text-left py-3">© 2018 Copyright:
                    <a class="footer-link" href="https://mdbootstrap.com/education/bootstrap/"> Jobby SRL</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pr-0 ml-auto pr-5 py-3">
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

        </footer>
    </div>

    <!-- Footer -->
</body>
</html>