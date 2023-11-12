<?php


$userId = "";
$userType = "";
if (isset($_COOKIE['auth']) && isset($_COOKIE['userId']) && isset($_COOKIE['userType'])) {
    $userId = $_COOKIE['userId'];
    $userType = $_COOKIE['userType'];
} elseif (isset($_SESSION['auth']) && isset($_SESSION['userId']) && isset($_SESSION['userType'])) {
    $userId = $_SESSION['userId'];
    $userType = $_SESSION['userType'];
} else {
    header('location: ../Auth/login.php');
}


if ($userType != "recruiter") {
    header('location: ../BrowseJobs/brwseAllJObs.php');
}

if (!isset($_GET['id'])) {
    header('location: myJobs.php');
}


$message = "";
if (isset($_REQUEST['id'])) {
    require_once("../../model/reportModel.php");
    $jobId = $_REQUEST['id'];
    $reporterId = $userId;
    $message = reportJob($jobId, $reporterId);
} else {
    $message = 'Invalid Job Id';
}
