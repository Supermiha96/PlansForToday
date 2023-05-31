<?php
require_once "funciones.php";
require_once 'conexion.php';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">



</head>

<body>
    <?php
    session_start(); // Iniciar la sesión
    theHeader($conexion);
    echo $mensaje;
    ?>



    <section id="search-section">
        <div class="container">
            <div class="row justify-content-center pb-md-5 col-12 w-100">
                <div class="row justify-content-center">
                    <div class="col-md-10 mt-5 text-center">
                        <h1 class="section-title mb-5">¡Descubre los mejores planes para hoy!</h1>
                        <p class="section-description">¿Quieres hacer algo divertido y diferente hoy? ¡Tenemos justo lo que necesitas! Explora nuestra selección de planes para hoy y descubre experiencias únicas que nunca olvidarás. Desde aventuras al aire libre hasta eventos culturales y gastronómicos, tenemos algo para todos los gustos y presupuestos. ¡No pierdas más tiempo y comienza a disfrutar de tu día con nosotros!</p>
                    </div>
                    <div class="col-12 mt-5 mb-md-5 w-100">
                        <div class="container justify-content-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group ">
                                        <input id="searchInput" type="text" class="form-control input-text" placeholder="Busca aquí la ciudad, para explorar sus planes...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success btn-lg" id="searchButton" type="button"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div id="autocompleteResults"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        const searchInput = document.getElementById('searchInput');
        const autocompleteResults = document.getElementById('autocompleteResults');

        searchInput.addEventListener('input', function() {
            const cityName = searchInput.value.trim();

            if (cityName !== '') {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'buscarCiudades.php?city=' + encodeURIComponent(cityName), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const cities = JSON.parse(xhr.responseText);
                        showAutocompleteResults(cities);
                    }
                };
                xhr.send();
            } else {
                autocompleteResults.innerHTML = '';
            }
        });

        function showAutocompleteResults(cities) {
            autocompleteResults.innerHTML = '';

            cities.forEach(function(city) {
                const resultItem = document.createElement('div');
                resultItem.textContent = city;
                resultItem.classList.add('result-item');
                autocompleteResults.appendChild(resultItem);

                resultItem.addEventListener('click', function() {
                    searchInput.value = city;
                    autocompleteResults.innerHTML = '';
                });
            });
        }
        const searchButton = document.getElementById('searchButton');

        searchButton.addEventListener('click', function() {
            const cityName = searchInput.value.trim();

            if (cityName !== '') {
                window.location.href = 'listadoPlanes.php?city=' + encodeURIComponent(cityName);
            }
        });
    </script>
    <section id="plans-for-today">
        <div class="container">
            <h2 class="mb-4 pt-4 text-white">Sitios de interés destacados</h2>
            <div class="row">
                <?php
                $destacados = obtenerPlanesDestacados($conexion);
                
                foreach ($destacados as $plan) {
                    $imagenes = obtenerImagenes($conexion, $plan['post_id'],$mensaje);

                    if (!empty($imagenes)) {
                        // Obtener una imagen aleatoria de la lista
                        $imagenAleatoria = $imagenes[array_rand($imagenes)];
                        $imagenUrl = $imagenAleatoria['img_url'];
                    } else {
                        // Si no hay imágenes, mostrar una imagen por defecto
                        $imagenUrl = './img/ejemplo/imagenEjemplo.jpg';
                    }
                    echo '<div class="col-lg-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="'.$imagenUrl.'" height="300" class="card-img-top" alt="'.$imagenUrl.'">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $plan['post_tit'] . '</h5>';
                    echo '<p class="card-text">' . $plan['post_desc'] . '</p>';
                    echo '<a href="./plan.php?city=' . $plan['ciu_nom'] . '&planId=' . $plan['post_id'] . '" class="btn btn-outline-primary btn-sm">Ver Plan</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

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