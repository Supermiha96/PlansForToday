<?php
require_once "funciones.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php //if ($title) { echo $title . ' - ';} //
            ?>Plans For Today</title>
    <link rel="icon" href="./img/logos/8.svg" sizes="any" type="image/svg+xml">
    <!-- CSS only -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">



</head>

<body>
    <?php
    theHeader();
    ?>



    <section id="search-section">
        <div class="container">
            <div class="row justify-content-center pb-md-5">

                <div class="row justify-content-center">
                    <div class="col-md-10 mt-5 text-center">
                        <h1 class="section-title mb-5">¡Descubre los mejores planes para hoy!</h1>
                        <p class="section-description">¿Quieres hacer algo divertido y diferente hoy? ¡Tenemos justo lo que necesitas! Explora nuestra selección de planes para hoy y descubre experiencias únicas que nunca olvidarás. Desde aventuras al aire libre hasta eventos culturales y gastronómicos, tenemos algo para todos los gustos y presupuestos. ¡No pierdas más tiempo y comienza a disfrutar de tu día con nosotros!</p>
                    </div>
                    <div class="col-lg-10 col-md-12 mt-5 mb-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control w-75" placeholder="Explora nuestros planes para ti">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="plans-for-today">
        <div class="container">
            <h2 class="mb-4 mt-4">Sitio de interés destacados</h2>
            <div class="row">
                <div class="col-md-4 mb-md-5">
                    <div class="card">
                        <img src="./img/planesDestacados/plan1.jpg" height="300px" width="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Campo de concentración de Sachsenhausen</h5>
                            <p class="card-text">Descripción del plan 1.</p>
                            <a href="#" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-md-5">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" height="300px" width="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Plan 2</h5>
                            <p class="card-text">Descripción del plan 2.</p>
                            <a href="#" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-md-5">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" height="300px" width="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Plan 3</h5>
                            <p class="card-text">Descripción del plan 3.</p>
                            <a href="#" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php
theFooter();
?>



</html>