<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- fontsawesome -->
    <script src="https://kit.fontawesome.com/bb694e241f.js" crossorigin="anonymous"></script>
    <title>examen</title>
</head>

<body class="container-fluid">
    <div class="row justify-content-center">
        <img src="/images/logo.jpg" class="col-2 img-fluid" alt="">
    </div>
    <header class="row bg-success bg-gradient p-3">

        <ul class="nav nav-pills">

            <li class="nav-item col-1 ">
                <a class="nav-link text-danger fw-bold " aria-current="page" href="index.html">inici</a>
            </li>

            <li class="nav-item col-2 ">
                <a class="nav-link text-light  p-2 fw-bold " href="#anOtherSection">Un altre seccio </a>
            </li>
            <li class="nav-item col-1 ">
                <a class="nav-link text-light p-2 fw-bold " href="#contact">Contacte<i class="fa-solid fa-address-card"></i></a>
            </li>
            <li class="nav-item col-1 ">
                <a class="nav-link text-light fw-bold " href="#">login <i class="fas fa-sign-in-alt"></i></a>
            </li>
            <li class="nav-item col-1 ">
                <a class="nav-link text-light p-2 fw-bold " href="#">menu item </a>
            </li>
        </ul>
    </header>
    <article>
    <section class=" bg-success bg-gradient m-3 mt-4 border border-1 border-info rounded-3">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration m-4  p-5">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><i class="fas fa-address-card"> Formulari de registre</i></h3>
                <p> El nom és:
                  <?php
                  print "$_REQUEST[firstName]";
                  ?>
                </p>
                <p> El Cognom és:
                  <?php
                  print "$_REQUEST[lastName]";
                  ?>
                </p>
                <p> La descripcio és:
                  <?php
                  print "$_REQUEST[description]";
                  ?>
                </p>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
    
</body>