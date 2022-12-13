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
<br>
<div class="container-xxl">
    <h1>Αξιολόγηση Καθηγητή</h1>

    <hr>
    <h6><?= $results[0]["first_name"] ?> <?= $results[0]["last_name"] ?></h6>
    <div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Οδηγίες</strong> Επιλέξτε για κάθε καθηγητή μια απο τις διαθέσιμες επιλογές : 1)Καθόλου &nbsp 2)Λίγο &nbsp 3)Μέτρια &nbsp
        4)Αρκετά &nbsp 5)Πολύ
    </div>
    <form action="evaluation_data_save.php?token=<?= $token ?>" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <td>
                    <b>1)</b> Ο καθηγητής καταφέρνει να διεγείρει το ενδιαφέρον των φοιτητών ως προς το μάθημα που
                    διδάσκει;
                </td>
                <td class="text-center">
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
                    <b>2)</b> Είναι ο καθηγητής προσιτός στους φοιτητές εκτός διδακτικών ωρών; </br>
                </td>
                <td class="text-center">
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
                    <b>3)</b> Κατέχει ο καθηγητής την ικανότητα της μεταδοτικότητας; </br>
                </td>
                <td class="text-center">
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
                    <b>4)</b> Ενθαρρύνει τους φοιτητές να διατυπώνουν απορίες και ερωτήσεις και να για να αναπτύξουν την
                    κρίση
                    τους;
                </td>
                <td class="text-center">
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
            <tr>
                <td>
                    <b>5)</b> Ο καθηγητής βαθμολογεί δίκαια; </br>
                </td>
                <td class="text-center">
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
            <tr>
                <td>
                    <b>6)</b> Ο καθηγητής ωθεί τους φοιτητές να συμμετάσχουν στο μάθημα; </br>
                </td>
                <td class="text-center">
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
            <tr>
                <td>
                    <b>7)</b> Ο καθηγητής οργανώνει καλά την ύλη του μαθήματος; </br>
                </td>
                <td class="text-center">
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
            <tr>
                <td>
                    <b>8)</b> Ο καθηγητής ήταν συνεπής στις υποχρεώσεις του/της;
                </td>
                <td class="text-center">
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
                    <b>9)</b> Αναλύει και παρουσιάζει τις έννοιες με τρόπο απλό και ενδιαφέροντα χρησιμοποιώντας
                    παραδείγματα;
                </td>
                <td class="text-center">
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
                </td>
            </tr>
            <tr>
                <td>
                    <b>10)</b> Το επίπεδο των γνώσεών του καθηγητή σας ικανοποίησε;
                </td>
                <td class="text-center">
                    1:
                    <input type="radio" name="q10" value="1"/>
                    2:
                    <input type="radio" name="q10" value="2"/>
                    3:
                    <input type="radio" name="q10" value="3"/>
                    4:
                    <input type="radio" name="q10" value="4"/>
                    5:
                    <input type="radio" name="q10" value="5"/>
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
