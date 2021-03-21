<?php
session_start();
try {
    if (file_exists("error.log")) {
        ini_set('error_log', 'error.log');
    } else {
        throw new Exception("Error logs file not found, creating one");
    }
} catch (Exception $e) {
    $file = fopen("error.log", "w");
    ini_set('error_log', 'error.log');
    error_log($e->getMessage() . " in " . $e->getFile());
}
date_default_timezone_set("Africa/Cairo");

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'covid');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}