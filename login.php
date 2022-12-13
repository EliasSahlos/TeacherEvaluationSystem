<?php
$hashed_password = password_hash("12345", PASSWORD_DEFAULT);
//var_dump($hashed_password);
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
<section class="vh-100 background-radial-gradient">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }
    </style>
    <div class="container py-5 h-100">
        <form action="check_login.php" method="post">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Σύνδεση Λογαριασμού</h3>
                            <?php
                            if ($_GET["error"] == 1) {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Λάθος Στοιχεία Σύνδεσης</strong><br> Παρακαλούμε εισάγετε τα στοιχεία σας ξανα
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Username</label>
                                <input type="text" id="typeEmailX-2" name="username"
                                       class="form-control form-control-lg"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>
                                <input type="password" id="typePasswordX-2" name="password"
                                       class="form-control form-control-lg"/>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Σύνδεση</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</body>
</html>
