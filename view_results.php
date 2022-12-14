<?php
session_start();
require_once "connection.php";
$user_id = $_SESSION["id"];

$query = "SELECT teachers.first_name,teachers.last_name,AVG(answers.answer_value) as MO
          FROM evaluations
          JOIN teachers ON teacher_id = teachers.id 
          JOIN answers ON answers.evaluation_id = evaluations.id
          WHERE user_id=:given_user_id
          GROUP BY evaluations.id";
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
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<br>
<div class="container-xxl">
    <h1>Αποτελέσματα Αξιολογήσεων</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center">Ονοματεπώνυμο</th>
            <th class="text-center">Μέσος Όρος Αξιολόγησης</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td class='text-center'>" . $result["first_name"] . " " . $result["last_name"] . "</td>";
            echo "<td class='text-center'>". number_format($result["MO"], 2) ."</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
