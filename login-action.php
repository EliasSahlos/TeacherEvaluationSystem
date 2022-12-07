<?php
session_start();
require_once "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
var_dump($username);
var_dump($password);

$query = "SELECT * FROM users WHERE username=:given_username";
$query_execution = $conn->prepare($query);
$query_execution->execute([
    "given_username" => $username
]);
$results = $query_execution->fetchAll();
//var_dump($results[0]["id"]); ;
//    $count = $query_execution -> fetchColumn();

if (sizeof($results) != 0) {
    $password_db = $results[0]["password"];
//    if (!password_verify($password, $password_db))

    if($password == $password_db){
        header("Location: login.php?error=1");
        die();
    }
    $_SESSION["LOGGED_IN"] = true;
    $_SESSION["id"] = $results[0]["id"];
    header("Location: index.php");
    die();
}
header("Location: login.php?error=1");
die();