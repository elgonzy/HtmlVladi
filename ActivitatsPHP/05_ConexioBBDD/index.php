<html>

<img src="./files/images/adri.jpg" alt="" srcset="">


<?php

session_start();
echo("<h1>Usuari:".$_SESSION['userName']."</h1>");
?>

<a href="./tancarsessio.php">Tanca la sessio</a>

</html>