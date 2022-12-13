<?php
session_start();
require_once "connection.php";
$user_id = $_SESSION["id"];

$query = "SELECT users.first_name AS uFname, 
                users.last_name AS uLname, 
                teachers.first_name AS tFname, 
                teachers.last_name AS tLname,
                AVG(answers.answer_value) as MO
          FROM users,evaluations,answers, teachers
          WHERE users.id = evaluations.user_id AND evaluations.teacher_id = teachers.id AND evaluations.id = answers.evaluation_id
          GROUP BY evaluations.id";
$query_execution = $conn->prepare($query);
$query_execution->execute();
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
<br>
<div class="container-xxl">
    <h1>Αποτελέσματα Αξιολογήσεων</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center">Ονοματεπώνυμο</th>
            <th class="text-center">Ονοματεπώνυμο Καθηγητή</th>
            <th class="text-center">Μέσος Όρος Αξιολόγησης</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td class='text-center'>" . $result["uFname"] . " " . $result["uLname"] . "</td>";
            echo "<td class='text-center'>" . $result["tFname"] . " " . $result["tLname"] . "</td>";
            echo "<td class='text-center'>". number_format($result["MO"], 2) ."</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


