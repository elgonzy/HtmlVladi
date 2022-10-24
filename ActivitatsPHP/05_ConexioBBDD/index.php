<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConexioBBDD</title>
</head>
<body>
    <header>
        <h1>Conexio BBDD</h1>
        <article>
            <section>
                <img src="files/images/adri.jpg" style="width:20%" alt="">
                <?php echo("<h1>Usuari:".$_SESSION['username']."</h1>"); ?>
                <a href="tancarsessio.php">Tancar sessio</a>
            </section>
        </article>
    </header>
</body>
</html>