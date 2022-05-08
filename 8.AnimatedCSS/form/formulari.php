<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/e21dcd580c.js" crossorigin="anonymous"></script>
</head>

<body class="container-fluid bg-black">
  <div class="container ms-6 col-3 mx-auto text-left bg-dark text-white p-3 mt-4">
    <p>Datos del formulario</p>
    <p>Nombre: <?php print $_REQUEST["name"];?></p>
    <p>Apellidos: <?php print $_REQUEST["surname"];?></p>
    <p>Email: <?php print $_REQUEST["email"];?></p>
    <p>Contraseña: <?php print $_REQUEST["password"];?></p>
  </div>
  <div class="container ms-6 col-3 mx-auto text-left bg-dark text-white p-3 mt-4">
    <button type="button" onclick="window.location.href='../index.html'" class="btn btn-secondary">
      Regresar
    </button>
  <div>
</body>
<footer class="mt-auto row bg-black navbar fixed-bottom">
  <div class="row text-center">
    <p class="text-white">Ojete Calor 2022</p>
  </div>
</footer>

</html>