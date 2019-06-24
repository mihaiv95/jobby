<?php
include 'server.php';
function getJobs()
{
    $db = openCon();

    $query = $db->prepare("SELECT * FROM job;");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getJobType($id){
    $db = openCon();

    $query = $db->prepare("SELECT * FROM job_type WHERE job_type = :id;");
    $query->execute([':id' => $id]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function printJobs($jobs){
//    foreach($jobs as $ind => $job){
//        foreach($job as $key => $val)
//        echo "<p>Key: " . $key . ", Val: " . $val . "</p>";
    $jobs = getJobs();
//    <a href="#" class="list-group-item list-group-item-action">Help</a>
    $ind = $_SESSION['counter'];
    $colors = [0 => 'bg-success', 1=>'bg-primary', 2=>'bg-danger'];
    do{
        $job = $jobs[$ind];
        $id = $job['job'];
        $jType = getJobType($job['job'])[0];
        $jName = $jType['name'];
        $difficulty = $jType['difficulty'];
        echo "<a href=\"\" value='$id' onclick=\"moreInfo(this.getAttribute('value')); return false;\" class=\"list-group-item list-group-item-action text-light ".$colors[$difficulty]."\">$jName</a>";
        $ind++;
    }while($ind % 5 != 0 and $ind < count($jobs));
}

function getMoreInfo($jobId){
    $db = openCon();
    $query = $db->prepare("SELECT * FROM job WHERE job.job = $jobId;");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $bossId = $results[0]["fk_id_employer"];
    echo $bossId;
    $query = $db->prepare("SELECT * FROM user WHERE user.user = :bossid");
    $query->execute(array(':bossid' => $bossId));
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $r = $res[0]['user'];
    return $r;
}


