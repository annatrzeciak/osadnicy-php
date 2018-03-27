<?php session_start();
if(!isset($_SESSION['log'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Osadnicy - gra przeglądarkowa</title>
	<meta name="Author" content=""/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

echo "<p>Witaj ".$_SESSION['user']."! <a href='logOut.php'>Wyloguj się</a></p>";
echo "<p><strong>Drewno</strong>: ".$_SESSION['drewno']." | <strong>Kamień</strong>: ".$_SESSION['kamien']." | <strong>Zboże</strong>: ".$_SESSION['zboze']."</p>";
echo "<p><strong>Email</strong>: ".$_SESSION['email']."</p>";
echo "<p><strong>Dni premium</strong>: ".$_SESSION['dnipremium']."</p>";

?>
</body>
</html>
