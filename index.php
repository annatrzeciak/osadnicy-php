<?php
session_start();
if(isset($_SESSION['log']) && ($_SESSION['log']==true)){
    header('Location: play.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Osadnicy - gra przeglądarkowa</title>
    <meta name="Author" content="" />
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    Tylko martwi ujrzeli koniec wojny - Platon
    <br/>
    <br/>
    <form action="logIn.php" method="post">
        Login: <br/>
        <input type="text" name='login'> <br/>
        Hasło: <br/>
        <input type="password" name="password"><br/>
        <br/>
        <input type="submit" value="Zaloguj się">
    </form>
    <?php
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
        }
    ?>

</body>

</html>
