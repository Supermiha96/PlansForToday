<?php 
require_once "funciones.php";
require_once "conexion.php";


if (isset($_GET['post_id'])) {
    // Obtén el ID del post a eliminar
    $post_id = $_GET['post_id'];
    $ciudad = $_GET['city'];
    $categoriaId = $_GET['category'];

    eliminarPost($conexion,$post_id,$mensaje);

    // Redirige a la página de listado de planes u otra ubicación deseada después de la eliminación
    header("Location: listadoPlanes.php?city=" . $ciudad . "&category=" . $categoriaId);
    exit();
}