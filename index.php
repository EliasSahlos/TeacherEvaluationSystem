<?php
    session_start();
    if(!$_SESSION['LOGGED_IN']){
        header("Location: login.php");
    }
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
    <form action="check_token.php" method="get">
        <input type="text" name="token"/>
        <button type="submit">CLICK ME</button>
    </form>
</body>
</html>
