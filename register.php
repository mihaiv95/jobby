<?php include 'server.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Inregistrate jobby</title>
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Inregistrare</h1>
    <form method="post" action="register.php">
    <?php include 'errors.php';?>
    <div>
        <label>Nume utilizator</label>
        <input type="text" name="username">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>Nume</label>
        <input type="text" name="last-name">
    </div>
    <div>
        <label>Prenume</label>
        <input type="text" name="first-name">
    </div>
    <div>
        <label>Parola</label>
        <input type="password" name="passw-1">
    </div>
    <div>
        <label>Confirma parola</label>
        <input type="password" name="passw-2">
    </div>
    <div>
        <button type="submit" class="btn btn-primary" name="reg_user">Inregistreaza-te!</button>
    </div>
    
</body>
</html>