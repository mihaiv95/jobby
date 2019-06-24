<?php
include 'utils.php';

$q = $_GET['q'];
if ($q != ""){
    $r = getMoreInfo($q);
    echo "<p>". $r . "</p>";
}
