<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- iconos -->
  <script src="https://kit.fontawesome.com/bb694e241f.js" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link href="css/estils.css" rel="stylesheet" type="text/css">
  <title>Títol de la pàgina</title>
</head>

<body >
  <article >
    <section class="gradient-custom">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration m-4  p-5" >
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
                  <p> La data de neixement és:
                    <?php
                    print "$_REQUEST[birthdayDate]";
                    ?>
                  </p>
                  <p> El genere es:
                    <?php
                    print "$_REQUEST[genere]";
                    ?>
                  </p>
                  <p> El email és:
                    <?php
                    print "$_REQUEST[email]";
                    ?>
                  </p>
                  <p> El curs és :
                    <?php
                    print "$_REQUEST[curs]";
                    ?>
                  </p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </article>

</body>

</html>
