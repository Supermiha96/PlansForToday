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
    <link rel="stylesheet" href="./css/listadoPlanes.css">



</head>

<body>
    <?php
    theHeader();
    ?>
<main class="container-fluid mx-auto px-5 py-5">
        <div class="row ">

            <aside class="col-md-4  pe-3">
                <h4 class="mt-4">Categorías</h4>
                <ul class="categoria md-text-center">
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Electrónica</a> </li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Gaming</a> </li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Supermercado</a></li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Moda y accesorios</a> </li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Salud y belleza</a></li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Jardín y bricolaje</a></li>
                    <li><a class="oferta" href="#" target="_blank" rel="noopener noreferrer">Coches y motos</a></li>
                </ul>
            </aside>
            <div class=" col-md-8 mx-auto">
                <div class="row g-4">
                    <div class="col-12 my-3">
                        <div class="row bg-white desplazamiento ms-4">
                            <div class="col-4 py-xl-2 d-flex align-items-center justify-content-center"><img
                                    class="img-fluid max-heigth"
                                    src="https://static.chollometro.com/threads/raw/DdVcw/984165_1/re/1024x1024/qt/60/984165_1.jpg"
                                    alt=""></div>
                            <div class="col-8 pt-3 pt-xl-5">
                                <h4 class="">Silla Gaming Oficina Racing Sillon Gamer Racer X</h4>
                                <h5>Profesional Videojuegos PC</h5>
                                <p>77,99 €</p>
                                
                                <p><i class="fa-solid fa-truck-arrow-right"></i> Envio gratis</p>
                                <button class="btn btn-outline-success mb-2"><a href="./plan.php">Ir a la oferta</a> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="row bg-white desplazamiento ms-4">
                            <div class="col-4 py-xl-2 d-flex align-items-center justify-content-center"><img
                                    class="img-fluid max-heigth"
                                    src="https://static.chollometro.com/threads/raw/DdVcw/984165_1/re/1024x1024/qt/60/984165_1.jpg"
                                    alt=""></div>
                            <div class="col-8 pt-3 pt-xl-5">
                                <h4 class="">Silla Gaming Oficina Racing Sillon Gamer Racer X</h4>
                                <h5>Profesional Videojuegos PC</h5>
                                <p>77,99 €</p>
                                <p><i class="fa-solid fa-truck-arrow-right"></i>Envio gratis</p>
                                <button class="btn btn-outline-success mb-2">Ir a la oferta</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="row bg-white desplazamiento ms-4">
                            <div class="col-4 py-xl-2 d-flex align-items-center justify-content-center"><img
                                    class="img-fluid max-heigth"
                                    src="https://static.chollometro.com/threads/raw/DdVcw/984165_1/re/1024x1024/qt/60/984165_1.jpg"
                                    alt=""></div>
                            <div class="col-8 pt-3 pt-xl-5">
                                <h4 class="">Silla Gaming Oficina Racing Sillon Gamer Racer X</h4>
                                <h5>Profesional Videojuegos PC</h5>
                                <p>77,99 €</p>
                                <p><i class="fa-solid fa-truck-arrow-right"></i>Envio gratis</p>
                                <button class="btn btn-outline-success mb-2 showmodal" data-show-modal="myModal">Ir a la oferta</button>
                                <a href="myModal"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php
theFooter();
?>



</html>