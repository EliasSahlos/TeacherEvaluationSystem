<?php
session_start();
require_once "connection.php";
$user_id = $_SESSION["id"];

$query = "SELECT teachers.first_name,teachers.last_name,AVG(answers.answer_value) as MO
          FROM evaluations
          JOIN teachers ON teacher_id = teachers.id 
          JOIN answers ON answers.evaluation_id = evaluations.id
          WHERE user_id=:given_user_id";
$query_execution = $conn->prepare($query);
$query_execution->execute([
    "given_user_id" => $user_id
]);
$results = $query_execution->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php
        foreach ($results as $result){
            echo "<tr>";
            echo "<td>".$result["first_name"]." ". $result["last_name"]." ". $result["MO"] ."</td>";
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>
