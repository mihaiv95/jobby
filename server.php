<?php
require 'dbconn.php';
include 'utils.php';
$db = openCon();
$errors = array();
// Registration
if (isset($_POST['reg_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $passw_1 = $_POST['passw-1'];
    $passw_2 = $_POST['passw-2'];

    if (empty($username)) {
        array_push($errors, "Nume utilizator necesar!!");
    }
    if (empty($email)) {
        array_push($errors, "Email necesar!!");
    }
    if (empty($first_name)) {
        array_push($errors, "Prenume necesar!!");
    }
    if (empty($last_name)) {
        array_push($errors, "Nume necesar!!");
    }
    if (empty($passw_1)) {
        array_push($errors, "Parola necesara!!");
    }
    if ($passw_1 != $passw_2) {
        array_push($errors, "Parolele nu sunt identice!!");
    }
    
    $user_check_query = $db->prepare("SELECT * FROM user WHERE nickname=? OR email=? LIMIT 1;");
    $user_check_query->execute(array($username,$email));
    $result = $user_check_query->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0){
        $row = $result[0];
        if (count($row)>0) {
            if ($row['nickname'] == $username) {
                array_push($errors, "Utilizatorul cu acest nume este deja in baza de date.");
            }
            if ($row['email'] == $email) {
                array_push($errors, "Adresa de email exista deja in baza de date.");
            }
        }
    }   
    if (count($errors) == 0){
        $query = $db->prepare("CALL AddUser(?, ?, ?, ?, ?);");
        $err_flag = false;

        if (!$query->execute(array($username, $passw_2, $email, $first_name, $last_name))){
            array_push($errors, "Eroare la introducerea utilizatorului!!");
        }else{
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['counter'] = 0;
            header('location: index.php');
        }

    }

}
// Login
if (isset($_POST['login_user'])){
    $username = $_POST['username'];
    $passw = $_POST['password'];
    if (empty($username)){
        array_push($errors, "Nume utilizator necesar!!");
    }
    if (empty($passw)){
        array_push($errors, "Parola necesara!!");
    }

    if (count($errors) == 0) {
        $query = $db->prepare("SELECT * FROM user WHERE nickname=? AND passw=?;");
        $query->execute(array($username,$passw));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['counter'] = 0;
            $_SESSION['success'] = "Sunteti conectat!";
            $_SESSION['image'] = wp_normalize_path($results[0]['image_ref']);
            header('Location: index.php');
        }else{
            array_push($errors, "Parola sau nume utilizator invalid!!");
        }
    }

}

//add job
if (isset($_POST['add_job'])){
    $desc = $_POST['description'];
    $type = $_POST['type'];
    $expdate = $_POST['expdate'];
    if ($type == 'Alege o categorie') {
        array_push($errors, "Alege o categorie !!!");
    }
    if (empty($desc)){
        array_push($errors, 'Adauga o descriere !!!');
    }
    if (empty($expdate)){
        array_push($errors, 'Adauga data expirarii !!!');
    }
    if (count($errors) == 0){
        if (addJob($db, $_SESSION['username'], $type, $desc, $expdate)){
            echo "GGGGG";
        }else{
            array_push($errors, "Eroare la adaugare !!!");
        }

    }
}
