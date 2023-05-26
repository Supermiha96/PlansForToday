<?php
require_once "funciones.php";
require_once "conexion.php"
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
    <link rel="stylesheet" href="./css/listadoPlanes.css">



</head>

<body>
    <?php
    session_start(); // Iniciar la sesión
    theHeader();

    ?>

    <main class="container-fluid mx-auto px-5 py-5">
        <div class="row">
            <aside class="col-md-4 pe-3">
                <h4 class="mt-4">Categorías</h4>
                <ul class="categoria md-text-center">
                    <?php
                    $categorias = obtenerCategorias($conexion);
                    foreach ($categorias as $categoria) {
                        $nombre = $categoria['cat_nom'];
                        $id = $categoria['cat_id'];
                        echo '<li><a class="oferta" href="#" onclick="filtrarPorCategoria(' . $id . ')">' . $nombre . '</a></li>';
                    }
                    ?>
                </ul>
            </aside>
            <div class="col-md-8 mx-auto">
                <div id="resultados" class="row g-4">
                    <?php
                    // Obtener el valor de la ciudad seleccionada
                    $ciudad = $_GET['city'];

                    // Obtener el valor de la categoría seleccionada si está definida
                    $categoriaId = isset($_GET['category']) ? $_GET['category'] : null;

                    // Preparar la consulta SQL
                    if ($categoriaId) {
                        $query = $conexion->prepare("SELECT * FROM ciudad c JOIN post p ON c.ciu_id = p.ciu_cod JOIN categoria ca ON p.cat_cod = ca.cat_id WHERE c.ciu_nom = ? AND ca.cat_id = ?");
                        $query->execute([$ciudad, $categoriaId]);
                    } else {
                        $query = $conexion->prepare("SELECT * FROM ciudad c JOIN post p ON c.ciu_id = p.ciu_cod WHERE c.ciu_nom = ?");
                        $query->execute([$ciudad]);
                    }

                    // Generar el contenido de los resultados
                    if ($query->rowCount() > 0) {
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            $titulo = $row['post_tit'];
                            $descripcion = $row['post_desc'];
                            $precio = $row['post_pre'];
                            $planId = $row['post_id'];

                            $comments = obtenerComentarios($conexion, $planId);
                            // Calcular la puntuación media
                            $averageRating = calcularPuntuacionMedia($comments);

                            // Generar el código HTML del post utilizando los datos obtenidos
                            echo '
                    <div class="col-12 my-3">
                        <div class="row bg-white desplazamiento ms-4">
                            <div class="col-4 py-xl-2 d-flex align-items-center justify-content-center">
                                <img class="img-fluid max-heigth" src="./img/ejemplo/imagenEjemplo.jpg" alt="">
                            </div>
                            <div class="col-8 pt-3 pt-xl-5">
                                <h3>' . $titulo . '</h3>
                                <h6>' . $descripcion . '</h6>
                                <p>Puntuación media: ' . $averageRating . '/10</p>
                                <p> ' . $precio . ' <i class="fas fa-euro-sign"></i></p>
                                <a href="./plan.php?city=' . $ciudad . '&planId=' . $planId . '"><button class="btn btn-outline-success mb-2">Ver el plan completo</button></a>
                            </div>
                        </div>
                    </div>';
                        }
                    } else {
                    ?>
                        <div class="col-12 my-3">
                            <div class="row bg-white  ms-4">
                                <div class="col-12 py-xl-2 d-flex align-items-center justify-content-center">
                                    <h3>No se han encontrado planes, se el primero en publicar uno</h3>
                                </div>
                            </div>
                        </div>


                    <?php
                    }


                    // Verificar si el usuario ha iniciado sesión
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <div class="col-12 pt-5 my-3">
                            <div class="row   ms-4">
                                <div class="col-12 py-xl-2 d-flex align-items-center justify-content-center">
                                    <a href="agregarPost.php" class="btn btn-outline-success btn-lg">Añadir un nuevo post</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div> <?php
                    }
                    ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function filtrarPorCategoria(categoriaId) {
                // Obtener el valor de la ciudad seleccionada
                const ciudad = '<?php echo $ciudad; ?>';

                // Realizar la petición AJAX para obtener los resultados filtrados por categoría
                $.ajax({
                    url: 'listadoPlanes.php',
                    type: 'GET',
                    data: {
                        city: ciudad,
                        category: categoriaId
                    },
                    success: function(response) {
                        // Crear un elemento temporal para contener la respuesta
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = response;

                        // Buscar el div con id "resultados" en el contenido de respuesta
                        const resultadosHTML = tempDiv.querySelector('#resultados').innerHTML;

                        // Actualizar el contenido de los resultados en el div "resultados"
                        $('#resultados').html(resultadosHTML);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        lanzarError("Error:No se ha podido actualizar el listado de planes.");
                    }
                });
            }
        </script>


    </main>
    <?php
    theFooter();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>




</html>