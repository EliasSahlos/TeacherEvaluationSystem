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
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<form action="user_data_save.php?token=<?=$token?>" method="post">
    <h1>Ερωτηματολόγιο</h1>
    <h6><?=$results[0]["first_name"]?> <?=$results[0]["last_name"]?></h6>
    <h><u>Από το 1 μέχρι το 5 επιλέξτε για τον κάθε καθηγητή
            1->Καθόλου 2->Λίγο 3->Δεν ξέρω δεν απαντώ 4->Αρκετά 5->Πολύ
        </u></h>
    </br>
    </br>

    <p>
        1) Ο καθηγητής καταφέρνει να διεγείρει το ενδιαφέρον των φοιτητών ως προς το μάθημα που διδάσκει; </br>
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
    </p>
    </br>
    <p>
        2) Είναι ο καθηγητής προσιτός στους φοιτητές εκτός διδακτικών ωρών; </br>
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
    </p>
    </br>
    <p>
        3) Κατέχει ο καθηγητής την ικανότητα της μεταδοτικότητας; </br>
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
    </p>
    </br>
    <p>
        4) Ενθαρρύνει τους φοιτητές να διατυπώνουν απορίες και ερωτήσεις και να για να αναπτύξουν την κρίση τους;
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
    </p>
    </br>
    <p>
        5) Ο καθηγητής βαθμολογεί δίκαια; </br>
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
    </p>
    </br>
    <p>
        6) Ο καθηγητής ωθεί τους φοιτητές να συμμετάσχουν στο μάθημα; </br>
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
    </p>
    </br>

    <p>
        7) Ο καθηγητής οργανώνει καλά την ύλη του μαθήματος; </br>
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
    </p>
    </br>
    <p>
        8) Ο καθηγητής ήταν συνεπής στις υποχρεώσεις του/της; </br>
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
    </p>
    </br>
    <p>
        9) Αναλύει και παρουσιάζει τις έννοιες με τρόπο απλό και ενδιαφέροντα χρησιμοποιώντας παραδείγματα; </br>
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
    </p>
    </br>

    <p>
        10) Το επίπεδο των γνώσεών του καθηγητή σας ικανοποίησε; </br>

        <input type="radio" name="q10" value="1"/>
        2:
        <input type="radio" name="q10" value="2"/>
        3:
        <input type="radio" name="q10" value="3"/>
        4:
        <input type="radio" name="q10" value="4"/>
        5:
        <input type="radio" name="q10" value="5"/>
    </p>
    </br>
        <input type="submit" value="Αποστολή Αξιολόγησης">
</form>
</br>
</div>
</body>
