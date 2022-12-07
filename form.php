<?php
require_once "connection.php";
$token = $_GET["token"];

$query = "SELECT first_name,last_name FROM teachers,evaluations WHERE teachers.id = evaluations.teacher_id AND evaluations.token=:given_token";
$query_execution = $conn->prepare($query);
$query_execution->execute([
    "given_token" => $token
]);
$results = $query_execution->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Teacher Evaluation System - Home</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container-xxl">
    <h1>Αξιολόγηση Καθηγητή</h1>

    <hr>
    <h6><?= $results[0]["first_name"] ?> <?= $results[0]["last_name"] ?></h6>
    <div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Οδηγίες</strong> Επιλέξτε για κάθε καθηγητή μια απο τις διαθέσιμες επιλογές : 1)Καθόλου 2)Λίγο 3)Μέτρια
        4)Αρκετά 5)Πολύ
    </div>
    <form action="user_data_save.php?token=<?= $token ?>" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <td>
                    1) Ο καθηγητής καταφέρνει να διεγείρει το ενδιαφέρον των φοιτητών ως προς το μάθημα που διδάσκει;
                </td>
                <td>
                    1:
                    <input type="radio" name="q1" value="1"/>
                    2:
                    <input type="radio" name="q1" value="2"/>
                    3:
                    <input type="radio" name="q1" value="3"/>
                    4:
                    <input type="radio" name="q1" value="4"/>
                    5:
                    <input type="radio" name="q1" value="5"/>
                </td>
            <tr>
                <td>
                    2) Είναι ο καθηγητής προσιτός στους φοιτητές εκτός διδακτικών ωρών; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q2" value="1"/>
                    2:
                    <input type="radio" name="q2" value="2"/>
                    3:
                    <input type="radio" name="q2" value="3"/>
                    4:
                    <input type="radio" name="q2" value="4"/>
                    5:
                    <input type="radio" name="q2" value="5"/>
                </td>
            </tr>
            <tr>
                <td>
                    3) Κατέχει ο καθηγητής την ικανότητα της μεταδοτικότητας; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q3" value="1"/>
                    2:
                    <input type="radio" name="q3" value="2"/>
                    3:
                    <input type="radio" name="q3" value="3"/>
                    4:
                    <input type="radio" name="q3" value="4"/>
                    5:
                    <input type="radio" name="q3" value="5"/>
                </td>
            </tr>
            <tr>
                <td>
                    4) Ενθαρρύνει τους φοιτητές να διατυπώνουν απορίες και ερωτήσεις και να για να αναπτύξουν την κρίση
                    τους;
                </td>
                <td>
                    </br>
                    1:
                    <input type="radio" name="q4" value="1"/>
                    2:
                    <input type="radio" name="q4" value="2"/>
                    3:
                    <input type="radio" name="q4" value="3"/>
                    4:
                    <input type="radio" name="q4" value="4"/>
                    5:
                    <input type="radio" name="q4" value="5"/>
                </td>
            </tr>
            </br>
            <tr>
                <td>
                    5) Ο καθηγητής βαθμολογεί δίκαια; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q5" value="1"/>
                    2:
                    <input type="radio" name="q5" value="2"/>
                    3:
                    <input type="radio" name="q5" value="3"/>
                    4:
                    <input type="radio" name="q5" value="4"/>
                    5:
                    <input type="radio" name="q5" value="5"/>
                </td>
            </tr>
            </br>
            <tr>
                <td>
                    6) Ο καθηγητής ωθεί τους φοιτητές να συμμετάσχουν στο μάθημα; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q6" value="1"/>
                    2:
                    <input type="radio" name="q6" value="2"/>
                    3:
                    <input type="radio" name="q6" value="3"/>
                    4:
                    <input type="radio" name="q6" value="4"/>
                    5:
                    <input type="radio" name="q6" value="5"/>
                </td>
            </tr>
            </br>
            <tr>
                <td>
                    7) Ο καθηγητής οργανώνει καλά την ύλη του μαθήματος; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q7" value="1"/>
                    2:
                    <input type="radio" name="q7" value="2"/>
                    3:
                    <input type="radio" name="q7" value="3"/>
                    4:
                    <input type="radio" name="q7" value="4"/>
                    5:
                    <input type="radio" name="q7" value="5"/>
                </td>
            </tr>
            </br>
            <tr>
                <td>
                    8) Ο καθηγητής ήταν συνεπής στις υποχρεώσεις του/της; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q8" value="1"/>
                    2:
                    <input type="radio" name="q8" value="2"/>
                    3:
                    <input type="radio" name="q8" value="3"/>
                    4:
                    <input type="radio" name="q8" value="4"/>
                    5:
                    <input type="radio" name="q8" value="5"/>
                    </br>
                </td>
            </tr>
            <tr>
                <td>
                    9) Αναλύει και παρουσιάζει τις έννοιες με τρόπο απλό και ενδιαφέροντα χρησιμοποιώντας
                    παραδείγματα; </br>
                </td>
                <td>
                    1:
                    <input type="radio" name="q9" value="1"/>
                    2:
                    <input type="radio" name="q9" value="2"/>
                    3:
                    <input type="radio" name="q9" value="3"/>
                    4:
                    <input type="radio" name="q9" value="4"/>
                    5:
                    <input type="radio" name="q9" value="5"/>
                    </br>
                </td>
            </tr>
            <tr>
                <td>
                    10) Το επίπεδο των γνώσεών του καθηγητή σας ικανοποίησε; </br>
                </td>
                <td>
                    <input type="radio" name="q10" value="1"/>
                    2:
                    <input type="radio" name="q10" value="2"/>
                    3:
                    <input type="radio" name="q10" value="3"/>
                    4:
                    <input type="radio" name="q10" value="4"/>
                    5:
                    <input type="radio" name="q10" value="5"/>
                    </br>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary" value="Αποστολή Αξιολόγησης">Υποβολή Αξιολόγησης</button>
        </div>
    </form>
    </br>
</div>
</body>
