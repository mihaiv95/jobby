<?php
session_start();
include 'utils.php';
$pag = $_GET['pag'];
if ($pag != "") {
    if ($pag == 'prev') {
        if (count(getJobs(3, $_SESSION['counter'] - 3)) == 0) {
            echo " disabled";
        }
    } else {
        if (count(getJobs(3, $_SESSION['counter'] + 3)) == 0) {
            echo " disabled";
        }
    }
}