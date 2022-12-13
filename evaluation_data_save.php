<?php
session_start();
require_once "connection.php";
$token = $_GET["token"];
$user_id = $_SESSION["id"];

$question1 = $_POST["q1"];
$question2 = $_POST["q2"];
$question3 = $_POST["q3"];
$question4 = $_POST["q4"];
$question5 = $_POST["q5"];
$question6 = $_POST["q6"];
$question7 = $_POST["q7"];
$question8 = $_POST["q8"];
$question9 = $_POST["q9"];
$question10 = $_POST["q10"];

$query = "SELECT id FROM evaluations WHERE token=:given_token";
$query_execution = $conn->prepare($query);
$query_execution->execute([
    "given_token" => $token
]);
$results = $query_execution->fetchAll();

$query2 = "INSERT INTO answers VALUES (null,:evaluation_id,:question_slug,:answer_value)";
$query2_execution = $conn->prepare($query2);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q1",
    "answer_value" => $question1
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q2",
    "answer_value" => $question2
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q3",
    "answer_value" => $question3
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q4",
    "answer_value" => $question4
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q5",
    "answer_value" => $question5
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q6",
    "answer_value" => $question6
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q7",
    "answer_value" => $question7
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q8",
    "answer_value" => $question8
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q9",
    "answer_value" => $question9
]);
$query2_execution->execute([
    "evaluation_id" => $results[0]["id"],
    "question_slug" => "q10",
    "answer_value" => $question10
]);
$query3 = "UPDATE evaluations SET done_submit=1,user_id=:given_user_id WHERE token=:given_token";
$query3_execution = $conn->prepare($query3);
$query3_execution->execute([
    "given_token" => $token,
    "given_user_id" => intval($user_id)
]);

header("Location: after-evaluation.php");