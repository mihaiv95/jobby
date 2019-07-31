<?php
require_once 'dbconn.php';
function getJobs($limit, $offset)
{
    $db = openCon();
    if ($limit == null && $offset == null){
        $query = $db->prepare("SELECT * FROM job;");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }else{
        $query = $db->prepare("SELECT * FROM job LIMIT :limit OFFSET :offset ;");
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}

function getJobType($id){
    $db = openCon();
    $query = $db->prepare("SELECT * FROM job_type WHERE job_type = :id;");
    $query->execute([':id' => $id]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getTypes(){
    $db = openCon();
    $query = $db->prepare("SELECT name FROM job_type;");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getTypeId($db, $type){
    $query = $db->prepare("SELECT job_type FROM job_type WHERE name = :type;");
    $query->execute([':type' => $type]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results[0];
}


function getUserByName($db, $username){
    $query = $db->prepare("SELECT * FROM user WHERE nickname=?");
    $query->execute(array($username));
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results[0];
}

function addJob($db, $username, $type, $desc, $expdate){
    $boss = getUserByName($db,$username);
    $type_id = getTypeId($db, $type);
    $query = $db->prepare("INSERT INTO job (fk_id_employer,fk_type,exp_date,description) VALUES (?,?,?,?)");
    if (!$query->execute(array($boss['user'],$type_id['job_type'],$expdate,$desc))){
        return false;
    }
    return true;

}


function printJobs(){
//    foreach($jobs as $ind => $job){
//        foreach($job as $key => $val)
//        echo "<p>Key: " . $key . ", Val: " . $val . "</p>";
//    <a href="#" class="list-group-item list-group-item-action">Help</a>
    $colors = [1 => 'bg-success', 2=>'bg-primary', 3=>'bg-danger'];
    $jobs = getJobs(3, $_SESSION['counter']);
    foreach ($jobs as $job) {
        $id = $job['job'];
        $jType = getJobType($job['job'])[0];
        $jName = $jType['name'];
        $difficulty = $jType['difficulty'];
        echo "<a href=\"\" value='$id' onclick=\"moreInfo(this.getAttribute('value')); return false;\" class=\"list-group-item list-group-item-action text-light " . $colors[$difficulty] . "\">$jName</a>";
    }
}

function getMoreInfo($jobId){
    $db = openCon();
    $query = $db->prepare("SELECT * FROM job WHERE job.job = $jobId;");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $bossId = $results[0]["fk_id_employer"];
    $query = $db->prepare("SELECT * FROM user WHERE user.user = :bossid");
    $query->execute(array(':bossid' => $bossId));
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $query = $db->prepare("SELECT * FROM user_profile WHERE user_profile = :userId");
    $query->execute(array(':userId' => $res[0]['fk_profile']));
    $res2 = $query->fetchAll(PDO::FETCH_ASSOC);
    $r = array("bossName" => $res2[0]['last_name'] ." ". $res2[0]['first_name'],"bossImg" => wp_normalize_path($res[0]['image_ref']), "jobDesc" => $results[0]['description'], "accAge");
    return $r;
}

function wp_normalize_path( $path ) {
    $path = str_replace( '/', '\\', $path );
    return $path;
}

