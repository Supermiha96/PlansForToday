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

    <main class="text-black fondo">
        <section id="plan-details" class="container">
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="plan-images">
                        <!-- Imágenes del plan -->
                        <img src="./img/ejemplo/imagenEjemplo.jpg" alt="Imagen 1" class="img-fluid">
                        <img src="./img/ejemplo/imagenEjemplo.jpg" alt="Imagen 2" class="img-fluid">
                        <img src="./img/ejemplo/imagenEjemplo.jpg" alt="Imagen 3" class="img-fluid">
                        <!-- Agrega más imágenes según necesites -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="plan-info">
                        <h2>Nombre del Plan</h2>
                        <p>Descripción del plan</p>

                        <h3>Detalles</h3>
                        <ul class="list-unstyled">
                            <li><strong>Fecha:</strong> 01 de enero de 2023</li>
                            <li><strong>Duración:</strong> 3 horas</li>
                            <li><strong>Precio:</strong> $100</li>
                            <li><strong>Lugar:</strong> Ciudad</li>
                            <!-- Agrega más detalles según necesites -->
                        </ul>


                    </div>
                </div>
            </div>
        </section>

        <section id="comments-section" class="container">
            <h3>Comentarios</h3>

            <div class="comment">
                <div class="comment-author">
                    <img src="avatar1.jpg" alt="Avatar 1" class="avatar">
                    <span class="author-name">Nombre de Usuario</span>
                </div>
                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla commodo aliquet rutrum. Sed lobortis leo a lectus tempor scelerisque.</p>
                    <span class="comment-date">Fecha del Comentario</span>
                </div>
            </div>

            <div class="comment">
                <div class="comment-author">
                    <img src="avatar2.jpg" alt="Avatar 2" class="avatar">
                    <span class="author-name">Otro Usuario</span>
                </div>
                <div class="comment-content">
                    <p>Vestibulum interdum lectus a faucibus scelerisque. Aliquam dignissim cursus erat non semper.</p>
                    <span class="comment-date">Fecha del Comentario</span>
                </div>
            </div>

            <!-- Agrega más comentarios según necesites -->

            <div class="add-comment">
                <h4>Añadir Comentario</h4>
                <form>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comentario:</label>
                        <textarea class="form-control" id="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                </form>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php
theFooter();
?>



</html>