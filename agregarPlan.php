<?php
require_once 'conexion.php';
require_once 'funciones.php';
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $contenido = $_POST['contenido'];
    $precio = $_POST['precio'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $categoria = $_POST['categoria'];
    $objUsuario = buscarUsuarioEnBd($_SESSION['usuario'], $conexion, $mensaje);
    $usuarioId = $objUsuario['usu_id'];
    $imagenes = $_FILES['imagenes'];

    $ciudadObj = buscarCiudadPorId($conexion, $ciudad, $mensaje);
    $ciudadNombre = $ciudadObj['ciu_nom'];

    // Insertar el nuevo plan en la base de datos
    $query = $conexion->prepare("INSERT INTO post (post_tit, post_desc, post_cont, post_pre, post_addr, usu_cod, cat_cod, ciu_cod) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$titulo, $descripcion, $contenido, $precio, $direccion, $usuarioId, $categoria, $ciudad]);
    $id_plan = $conexion->lastInsertId();
    
    foreach ($imagenes['tmp_name'] as $index => $tmp_name) {
        $imagen = $imagenes['name'][$index];
        $imagen_tmp = $imagenes['tmp_name'][$index];
        $imagen_url = '';

        if (!empty($imagen)) {
            // Obtener la extensión de la imagen
            $extension = pathinfo($imagen, PATHINFO_EXTENSION);

            // Generar un nombre único para la imagen
            $nombre_imagen = uniqid() . '.' . $extension;

            // Ruta de destino para guardar la imagen
            $ruta_destino = './img/planes/' . $nombre_imagen;

            // Mover la imagen a la ubicación deseada en el servidor
            if (move_uploaded_file($imagen_tmp, $ruta_destino)) {
                // Guardar la URL de la imagen en la base de datos
                $imagen_url = './img/planes/' . $nombre_imagen;

                // Registrar la URL de la imagen en la tabla de imágenes
                // (usando la función correspondiente en tu código)
                registrarImagen($conexion, $imagen_url, $id_plan, $usuarioId);
            }
        }
    }
    $redirectUrl = "listadoPlanes.php?city=$ciudadNombre&category=$categoria";
    header("Location: $redirectUrl");
    exit();
}
