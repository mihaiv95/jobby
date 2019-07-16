<?php
session_start();
$_SESSION['counter'] -= 2;
header('location: index.php');