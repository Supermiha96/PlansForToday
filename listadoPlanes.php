<?php
require_once "funciones.php";
require_once "conexion.php";

$ciudad = $_GET['city'] ?? '';
$categoriaId = $_GET['categoria'] ?? '';

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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    session_start(); // Iniciar la sesión
    theHeader($conexion);
    echo $mensaje;
    ?>

    <main class="container-fluid mx-auto px-5 py-5">
        <div class="row">
            <aside class="col-md-4 pe-3">
                <h4 class="mt-4">Categorías</h4>
                <ul class="categoria md-text-center">
                    <?php
                    $categorias = obtenerCategorias($conexion, $mensaje);
                    foreach ($categorias as $categoria) {
                        $nombre = $categoria['cat_nom'];
                        $id = $categoria['cat_id'];
                        echo '<li><a class="oferta" href="listadoPlanes.php?city=' . $ciudad . '&category=' . $id . '">' . $nombre . '</a></li>';
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
                            $objUsuario = buscarUsuarioEnBdPorId($row['usu_cod'], $conexion, $mensaje);
                            $comments = obtenerComentarios($conexion, $planId, $mensaje);
                            // Calcular la puntuación media
                            $averageRating = calcularPuntuacionMedia($comments);

                            // Generar el código HTML del post utilizando los datos obtenidos
                            echo '
                            <div class="col-12 my-3 ">
                                <div class="row bg-white desplazamiento ms-5">
                                <div class="col-12 col-lg-4 py-3 d-flex align-items-center justify-content-center">';
                            // Obtener todas las imágenes asociadas al plan
                            $imagenes = obtenerImagenes($conexion, $planId,$mensaje);

                            if (!empty($imagenes)) {
                                // Obtener una imagen aleatoria de la lista
                                $imagenAleatoria = $imagenes[array_rand($imagenes)];
                                $imagenUrl = $imagenAleatoria['img_url'];
                            } else {
                                // Si no hay imágenes, mostrar una imagen por defecto
                                $imagenUrl = './img/ejemplo/imagenEjemplo.jpg';
                            }

                            echo '
                                        <img class="img-fluid max-height" src="' . $imagenUrl . ' ?>" alt="' . $imagenUrl . '">
                                    </div>
                                    <div class="col-12 col-md-8 pt-3 pt-xl-5">
                                        <h3>' . $titulo . '</h3>
                                        <h6>' . $descripcion . '</h6>
                                        <p>Puntuación media: ' . $averageRating . '/10</p>';
                            if ($precio == 0) {
                                echo '<p>¡Gratuito!</p>';
                            } else {
                                echo '<p> ' . $precio . ' <i class="fas fa-euro-sign"></i></p>';
                            }
                            echo '<a href="./plan.php?city=' . $ciudad . '&planId=' . $planId . '"><button class="btn btn-outline-success mb-2">Ver el plan completo</button></a>';
                            if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == $objUsuario['usu_email']) {
                                echo  '<a href="./eliminar_plan.php?post_id=' . $planId . '&city=' . $ciudad . '&category=' . $categoriaId . '"><button class="btn btn-outline-danger mb-2">Eliminar</button></a>';
                            }
                            echo '
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
                        <div id="nuevoPlan" class="col-12 pt-5 my-3">
                            <div class="row ms-4">
                                <div class="col-12 py-xl-2 d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#agregarPostModal">Añadir un nuevo plan</button>
                                </div>
                            </div>
                        </div>
                </div> <?php
                    }
                        ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="agregarPostModal" tabindex="-1" role="dialog" aria-labelledby="agregarPostModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="agregarPostModalLabel">Agregar Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="agregarPostForm" method="POST" action="agregarPlan.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                    <div class="invalid-feedback">Por favor, ingresa un título.</div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                    <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                                </div>
                                <div class="form-group">
                                    <label for="contenido">Contenido</label>
                                    <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
                                    <div class="invalid-feedback">Por favor, ingresa el contenido.</div>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" required>
                                    <div class="invalid-feedback">Por favor, ingresa el precio.</div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                                    <div class="invalid-feedback">Por favor, ingresa una dirección.</div>
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <select class="form-control" id="ciudad" name="ciudad" required>
                                        <?php
                                        $ciudades = obtenerCiudades($conexion, $mensaje);
                                        foreach ($ciudades as $ciudad) {
                                            $nombre = $ciudad['ciu_nom'];
                                            $id = $ciudad['ciu_id'];
                                            echo "<option value='$id'>$nombre</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <?php
                                        $categorias = obtenerCategorias($conexion, $mensaje);
                                        foreach ($categorias as $categoria) {
                                            $nombre = $categoria['cat_nom'];
                                            $id = $categoria['cat_id'];
                                            echo "<option value='$id'>$nombre</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="imagenes">Imágenes</label>
                                    <input type="file" class="form-control-file" id="imagenes" name="imagenes[]" multiple>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </main>
    <?php
    theFooter();
    ?>
</body>




</html>