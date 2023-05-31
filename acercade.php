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
    <link rel="stylesheet" href="./css/listadoPlanes.css">



</head>

<body>
    <?php
    session_start(); // Iniciar la sesión
    theHeader($conexion);
    echo $mensaje;
    ?>

    <main>
        <div class="container text-white mx-auto">
            <div class="row">
                <div class="col-md-12 pt-5 text-center">
                    <h1>Acerca de Plans For Today</h1>
                    <p>PlansForToday es una plataforma en línea que te ayuda a organizar tus actividades diarias y planificar tu tiempo de manera eficiente.</p>
                    <p>Con PlansForToday, puedes crear y administrar listas de tareas, establecer recordatorios, colaborar con otros usuarios y mucho más.</p>
                    <p>Nuestro objetivo es simplificar tu vida y permitirte aprovechar al máximo cada día.</p>
                    <h2>Características principales:</h2>
                    <ul class="list-unstyled ">
                        <li>Crea y gestiona listas de tareas para organizar tu día.</li>
                        <li>Establece recordatorios para no olvidar eventos importantes.</li>
                        <li>Colabora con otros usuarios en proyectos y actividades.</li>
                        <li>Personaliza tu perfil y configura tus preferencias.</li>
                        <li>Obtén estadísticas y seguimiento de tu progreso.</li>
                    </ul>
                    <h2 class="colorAzul">Beneficios de usar PlansForToday:</h2>
                    <ul class="colorAzul list-unstyled">
                        <li>Aumenta tu productividad al tener una visión clara de tus tareas.</li>
                        <li>Mejora tu organización y planificación diaria.</li>
                        <li>Reduce el estrés al tener un sistema confiable para gestionar tu tiempo.</li>
                        <li>Aprovecha al máximo cada día, logrando tus objetivos de manera efectiva.</li>
                    </ul>
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