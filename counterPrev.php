<?php
session_start();
$_SESSION['counter'] -= 3;
header('location: index.php');