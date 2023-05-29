<?php
require_once 'funciones.php';
require_once 'conexion.php';
session_start();

$city = $_GET['city'];
$planId = $_GET['planId'];

// Obtener los posts usando una consulta preparada
$ObjPlan = obtenerPlan($conexion, $planId);

// Recorrer los resultados y mostrar los posts
foreach ($ObjPlan as $row) {
    $post_id = $row['post_id'];
    $post_tit = $row['post_tit'];
    $post_desc = $row['post_desc'];
    $post_cont = $row['post_cont'];
    $post_pre = $row['post_pre'];
    $post_addr = $row['post_addr'];
}

$postCiudad = $_GET['city'];

if (isset($_POST['añadirComentario'])) {
    $objUsuario = buscarUsuarioEnBd($_SESSION['usuario'], $conexion, $mensaje);
    $resutado = false;

    $titulo = $_POST['titulo'];
    $puntuacion = $_POST['puntuacion'];
    $contenido = $_POST['contenido'];
    $usuarioId = $objUsuario['usu_id'];

    // Agregar comentario usando una consulta preparada
    agregarComentario($conexion, $planId, $usuarioId, $titulo, $contenido, $puntuacion);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if ($post_tit) {
                echo $post_tit . ' - ';
            } //
            ?>Plans For Today</title>
    <link rel="icon" href="./img/logos/8.svg" sizes="any" type="image/svg+xml">
    <!-- CSS only -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&family=Raleway:wght@500&family=Source+Serif+Pro:ital,wght@1,700&family=Vollkorn&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/plan.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Script only -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <?php

    theHeader($conexion);
    echo $mensaje;
    ?>

    <main class="text-black fondo">
        <section id="plan-details" class="container text-justify">
            <div class="row">
                <div class="col-md-12 my-5">
                    <h1><?php echo $post_tit; ?></h1>

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            // Obtener las URL de las imágenes desde la base de datos
                            $imagenes = obtenerImagenes($conexion, $post_id); // Supongamos que tienes una función obtenerImagenes() que devuelve un array con las URL de las imágenes

                            // Generar los elementos div con las imágenes dinámicamente
                            foreach ($imagenes as $imagen) {
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $imagen['img_url'] . '" alt="Imagen">';
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var swiper = new Swiper(".swiper-container", {
                                slidesPerView: 2, // Mostrar 2 diapositivas en pantallas más grandes
                                spaceBetween: 5,
                                pagination: {
                                    el: ".swiper-pagination",
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                                breakpoints: {
                                    2560: {
                                        slidesPerView: 3
                                    },
                                    1440: {
                                        slidesPerView: 3
                                    },
                                    1024: {
                                        slidesPerView: 2
                                    },
                                    768: {
                                        slidesPerView: 1, // Mostrar 1 diapositiva en pantallas más pequeñas
                                    },
                                    576: {
                                        slidesPerView: 1, // Mostrar 1 diapositiva en pantallas aún más pequeñas
                                    },
                                    425: {
                                        slidesPerView: 1, // Mostrar 1 diapositiva en pantallas aún más pequeñas
                                    },
                                    375: {
                                        slidesPerView: 1, // Mostrar 1 diapositiva en pantallas aún más pequeñas
                                    },
                                },
                            });
                        });
                    </script>




                </div>

                <div class="col-md-12">
                    <div class="plan-info">

                        <h3 class="descripcion"><?php echo $post_desc; ?></h3>
                        <p class="contenido my-5"><?php echo $post_cont; ?></p>

                        <h3>Detalles</h3>
                        <ul class="list-unstyled">

                            <li><strong>Precio:</strong> <?php echo ($post_pre != '') ? $post_pre  . ' <i class="fas fa-euro-sign"></i> ' : 'Es gratuito'; ?></li>
                            <li><strong>Dirección:</strong> <?php echo $post_addr; ?></li>
                            <!-- Agrega más detalles según necesites -->
                        </ul>
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
                <?php

                ?>
            </div>
            <script>
                var direccion = '<?php echo trim($post_addr); ?>';
                var ciudad = '<?php echo $postCiudad; ?>';

                // Crea un mapa y establece la ubicación inicial
                var map = L.map('map').setView([0, 0], 20); // La vista inicial se establece en coordenadas [0, 0] y un nivel de zoom de 12

                // Agrega el proveedor de mapas de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
                    zoom: 30,
                    maxZoom: 20
                }).addTo(map);

                // Codifica la dirección y ciudad en coordenadas geográficas
                var geocodeURL = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(direccion + ', ' + ciudad);

                fetch(geocodeURL)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            var lat = data[0].lat;
                            var lon = data[0].lon;

                            // Muestra la ubicación en el mapa
                            L.marker([lat, lon]).addTo(map).bindTooltip(direccion).openTooltip();
                            map.setView([lat, lon], 16); // Establece la vista del mapa en la ubicación encontrada
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener las coordenadas:', error);
                    });
            </script>
        </section>

        <section class="comment-box">
            <h3 class="tituloComentario">Comentarios</h3>
            <div class="container">
                <div class="row">
                    <?php
                    echo $mensaje;
                    $comments = obtenerComentarios($conexion, $_GET['planId']);
                    $averageRating = calcularPuntuacionMedia($comments);

                    foreach ($comments as $comment) {
                        echo '<div class="col-md-8">
                    <div class="media g-mb-30 media-comment">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">' . $comment['usu_nom'] . '</h5>
                                <span class="g-color-gray-dark-v4 g-font-size-12">' . $comment['com_fec'] . '</span>
                            </div>
                            <h5 class="h5 g-color-gray-dark-v1 mb-0">' . $comment['com_tit'] . '</h5>
                            <p>' . $comment['com_cuer'] . '</p>

                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item g-mr-20">
                                    <p class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        Puntuación: ' . $comment['com_punt'] . '/10
                                    </p>
                                </li>';

                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == $comment['usu_email']) {
                            echo '<li class="list-inline-item ml-auto">
                                    <form method="post" action="' . $_SERVER['PHP_SELF'] . '">
                                    <input type="hidden" name="eliminarComentario" value="1">
                                    <input type="hidden" name="comentarioId" value="' . $comment['com_id'] . '">
                                    <a href="" onclick="eliminarComentario(' . $comment['com_id'] . ')">Eliminar comentario</a>
                                </form>
                                    </li>';
                        }

                        echo '</ul>
                      </div>
                    </div>
                  </div>';
                    }
                    ?>
                </div>

                <?php





                if (isset($_SESSION['usuario'])) {
                    echo ' <div class="col-md-8" id="nuevoComentario">
                    <div class="media g-mb-30 media-comment">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <h3 class="pull-left">Introduce un comentario</h3>
                            <form id="comentarioUsuario" method="post" action="">
        
        
                                <fieldset>
                                    <div class="row">
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                        <label for="titulo">Titulo para tu comentario</label></br>
                                            <input type="text" name="titulo" placeholder="Título" required>
                                        </div>
                                        <div class="form-group col-2 col-sm-9 col-lg-10">
                                        <label for="puntuacion">Tu puntuación para este plan sobre 10</label></br>
                                            <input type="number" name="puntuacion" min="1" max="10" required>
                                        </div>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                        <label for="contenido">Contenido del comentario...</label>
                                            <textarea class="form-control" name="contenido" id="message" placeholder="Contenido del comentario..." required=""></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" name="añadirComentario" class="btn btn-normal pull-right">Añadir comentario</button>
                            </form>
                        </div>
                    </div>
                </div>';
                }



                ?>


            </div>
        </section>




    </main>


    <?php
    theFooter();
    ?>
    <script>
        // Función para eliminar el comentario
        function eliminarComentario(comentarioId) {
            // Realiza una petición AJAX para eliminar el comentario
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'eliminar_comentario.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // La eliminación del comentario fue exitosa
                        var response = xhr.responseText;

                        // Actualiza la sección de comentarios
                        actualizarComentarios();
                    } else {
                        // Hubo un error al eliminar el comentario
                        alert('Ocurrió un error al eliminar el comentario');
                    }
                }
            };

            // Envía los datos del formulario
            var params = 'eliminarComentario=1&comentarioId=' + comentarioId;
            xhr.send(params);
        }

        // Función para actualizar la sección de comentarios
        function actualizarComentarios() {
            // Realiza una petición AJAX para obtener los comentarios actualizados
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './plan.php?city=<?php echo $city; ?>&planId=<?php echo $post_id; ?>', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // La solicitud de comentarios fue exitosa
                        var response = xhr.responseText;

                        // Actualiza la sección de comentarios con los nuevos datos
                        document.getElementById('comment-box').innerHTML = response;
                    }
                }
            };
            xhr.send();
        }
    </script>
</body>




</html>