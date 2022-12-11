<?php
require_once "connection.php";

$token = $_GET["token"];

$query = "SELECT token FROM evaluations WHERE token=:given_token AND user_id is NULL";
$query_execution = $conn->prepare($query);
$query_execution->execute([
    "given_token" => $token
]);
$results = $query_execution->fetchAll();
if (sizeof($results) != 0) {
    header("Location: form.php?token=".$token);
    die();
}
header("Location: index.php?error=1");
die();
