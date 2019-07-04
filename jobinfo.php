<?php
include 'utils.php';

$q = $_GET['q'];
if ($q != ""){
    $r = getMoreInfo($q);
    echo "  <div class='list-group'>
                <div class=\"list-group-item text-center\">
                    <p>Boss: ". $r['bossName'] . "</p>
                    <img src=\"". $r['bossImg'] ."\" class='img-fluid'>
                </div>
                <div class='list-group-item'>
                   " . $r['jobDesc'] . "
                </div>
           
            </div>";
}
