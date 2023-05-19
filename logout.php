<?php
require_once "funciones.php";
require_once 'conexion.php';
?>
<?php
session_start();
// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio de sesión

header("refresh:0;url=index.php");
exit();
