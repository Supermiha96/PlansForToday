<?php
include_once 'conexion.php';
include_once 'funciones.php';
session_start();
if (isset($_POST['eliminarComentario'])) {

    $comentarioId = $_POST['comentarioId'];
    eliminarComentario($conexion, $comentarioId, $mensaje);
}
