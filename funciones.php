<?php
require_once "conexion.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar la biblioteca PHPMailer
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

/**
 * Funcion que pinta la parte header de la página web.(Navbar)
 * @param type $conexion
 */
function theHeader($conexion)
{
  if (isset($_SESSION['usuario'])) {
    $objUsuario = buscarUsuarioEnBd($_SESSION['usuario'], $conexion, $mensaje);
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $objUsuario['usu_nom'];
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $objUsuario['usu_apes'];
    $email = isset($_POST['email']) ? $_POST['email'] : $objUsuario['usu_email'];
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : $objUsuario['usu_tel'];
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : $objUsuario['usu_ciu'];
    $pais = isset($_POST['pais']) ? $_POST['pais'] : $objUsuario['usu_pais'];
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ActualizarUsuario'])) {
    actualizarUsuario($conexion, $_SESSION['usuario'], $nombre, $apellidos, $email, $telefono, $ciudad, $pais);
  }
?>


  <header class="border-bottom">

    <nav class="navbar navbar-expand-lg navbar-light bg-navbarYfooter px-3 px-sm-5 ">
      <a class="navbar-brand" href="./index.php">
        <img src="./img/logos/PlansForToday.svg" alt="PLANS FOR TODAY" width="100">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fa-solid fa-bars" style="color: #f2f1ec;"></i></span>
      </button>

      <div class="collapse navbar-collapse text-white text-center" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Acerca de</a>
          </li>
        </ul>

        <?php if (isset($_SESSION['usuario'])) { // Verificar si existe la sesión 'usuario' 
        ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#actualizarDatosUsuarioModal">Preferencias</a>
                <a class="dropdown-item" onclick="logout()" href="./logout.php">Salir</a>
              </div>
            </li>
          </ul>
        <?php } else { // Si no existe la sesión 'usuario' 
        ?>
          <ul class="navbar-nav me-3">
            <li class="nav-item">
              <a class="nav-link" href="./login.php">Iniciar sesión</a>
            </li>
          </ul>
        <?php } ?>
      </div>
    </nav>

    <div class="modal fade" id="actualizarDatosUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="agregarPostModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="agregarPostModalLabel">Prefencias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="agregarPostForm" method="POST" action="">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($objUsuario['usu_nom']) ? $objUsuario['usu_nom'] : ''; ?>" required></input>
                <div class="invalid-feedback">Por favor, ingresa un nombre.</div>
              </div>
              <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" id="apellidos" name="apellidos" value="<?php echo isset($objUsuario['usu_apes']) ? $objUsuario['usu_apes'] : ''; ?>"></input>
                <div class="invalid-feedback">Por favor, ingresa apellidos.</div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" value="<?php echo isset($objUsuario['usu_email']) ? $objUsuario['usu_email'] : '';  ?>" required></input>
                <div class="invalid-feedback">Por favor, ingresa el email.</div>
              </div>
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input class="form-control" id="telefono" name="telefono" value="<?php echo isset($objUsuario['usu_tel']) ? $objUsuario['usu_tel'] : '';  ?>"></input>
                <div class="invalid-feedback">Por favor, ingresa el telefono.</div>
              </div>

              <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input class="form-control" id="ciudad" name="ciudad" value="<?php echo isset($objUsuario['usu_ciu']) ? $objUsuario['usu_ciu'] : '';  ?>"></input>
                <div class="invalid-feedback">Por favor, ingresa el ciudad.</div>
              </div>
              <div class="form-group">
                <label for="pais">Pais</label>
                <input class="form-control" id="pais" name="pais" value="<?php echo isset($objUsuario['usu_pais']) ? $objUsuario['usu_pais'] : '';  ?>" required></input>
                <div class="invalid-feedback">Por favor, ingresa el pais.</div>
              </div>
              <button type="submit" name="ActualizarUsuario" class="btn btn-primary">Actualizar datos</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php
}

/**
 * Pinta la parte footer
 */

function theFooter()
{
?>
  <footer class="w-100 mt-6">
    <div class="container border-top">
      <div class="row">
        <div class="col-12 col-md-4">
          <h3>Nosotros</h3>
          <p>¡Busca tu plan perfecto y disfuta!</p>
        </div>
        <div class="col-12 col-md-4 mb-md-3">
          <h3>Contacto</h3>
          <ul class="list-unstyled">
            <li><i class="fa fa-phone"></i> (+34) 666777888</li>
            <li><i class="fa fa-envelope"></i> contacto@plansfortoday.com</li>
            <li><i class="fa fa-map-marker"></i> Calle Ancha 2, Écija,Sevilla</li>
          </ul>
        </div>
        <div class="col-12 col-md-4">
          <h3>Síguenos</h3>
          <div>
            <ul class="social list-unstyled px-5">
              <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="text-center">© 2023 Plans For Today. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>


  </footer>
<?php
}



/**
 * Funcion que devuelve la fecha hora actual en formato dd/mm/AAAA HH24:mi:ss
 * @return type
 */
function getNow()
{
  return date("d/m/Y H:i:s");
}

/**
 * Variable global para mensajes
 */
$mensaje = "";

/**
 * Establecemos la zona horaria para todo lo relacionado con las fechas
 */
date_default_timezone_set('Europe/Madrid');

/**
 * Construye un parrafo de error a partir de un mensaje pasado como parametro para mostrar en la p&aacute;gina
 * @param type $msg
 * @return type
 */
function lanzarError($msg)
{
  return "
  <div class=\" alerta alert alert-danger alert-dismissible fade show \" role=\"alert\">
  <strong>~$msg</strong>
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
}

/**
 * Construye un parrafo de exito a partir de un mensaje pasado como parametro
 * @param type $msg
 * @return type
 */
function lanzarExito($msg)
{
  return "
  <div class=\" alerta alert alert-success alert-dismissible fade show \" role=\"alert\">
  <strong>~$msg</strong>
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
}

/**
 * Valida el usuario/password pasados como parametros contra la base de datos
 * @param type $email
 * @param String $password
 * @param type $conexion
 * @return boolean
 */
function validarLoginUsuario($email, $password, $conexion, &$mensaje)
{
  $resultado = false;

  try {
    $query = $conexion->prepare('SELECT `usu_email`,`usu_pass` FROM `usuario` WHERE `usu_email` = ?');
    $query->bindParam(1, $email);
    $query->execute();
    $count = $query->rowCount();
    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {

      if ($row['usu_email'] == $email && password_verify($password, $row['usu_pass'])) {

        $resultado = true;
      } else {
        throw new Exception("Usuario o password incorrecto.");
      }
    } else {
      throw new Exception("No se encuentra el usuario");
    }
    $query->closeCursor();
  } catch (PDOException $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
  } catch (Exception $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
  }
  return $resultado;
}



/**
 * Comprueba si los datos son correctos para dar de alta un nuevo usuario
 * @param String $password
 * @param type $password_confirm
 * @param type $mensaje
 */
function validarNuevoUsuario($password, $password_confirm, $email, &$mensaje)
{

  if (strlen($password) > 0) { // Validamos la longitud del password
    if ($password == $password_confirm) { // Validamos que las contraseñas coincidan
      if (strlen($email) > 0) {
        return true;
      } else {
        $mensaje = "Error: Debe introducir un nombre v&aacute;lido";
      }
    } else {
      $mensaje = "Error: Las contraseñas no coinciden";
    }
  } else {
    $mensaje = "Error: Debe introducir una contraseña v&aacute;lida";
  }
  return false;
}

/**
 * Inserta un usuario con todos sus datos pasados como parametros en la base de datos
 * @param String $password
 * @param type $nombre
 * @param type $email
 * @param type $conexion
 * @param type $mensaje
 * @return boolean
 */
function insertarUsuario($nombre, $password, $email, $conexion, &$mensaje)
{

  $resultado = false;
  try {

    $password_crypt = password_hash($password, PASSWORD_DEFAULT);

    $query = $conexion->prepare('INSERT INTO `usuario` (`usu_nom`, `usu_email`, `usu_pass`, `usu_rol`) VALUES (?, ?, ?, 0 )');
    $query->bindParam(1, $nombre);
    $query->bindParam(2, $email);
    $query->bindParam(3, $password_crypt);
    //$query->bindParam(4, 0);

    $rowcount = $query->execute();
    if ($rowcount == 1) {
      // Esperamos solo la insercion de 1 registro
      $resultado = true;
    } else {
      // No se ha insertado
      $resultado = false;
    }
  } catch (PDOException $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
  } catch (Exception $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
  }
  return $resultado;
}

/**
 * Busca un usuario determinado por email en la base de datos y devuelve un objeto array asociativo con los datos del usuario
 * @param type $email
 * @param type $conexion
 * @param type $mensaje
 * @return type $objUsuario
 */
function buscarUsuarioEnBd($email, $conexion, &$mensaje)
{

  $objUsuario = null;
  try {

    $query = $conexion->prepare("SELECT * FROM `usuario` WHERE `usu_email` =  ?");
    $query->bindParam(1, $email);
    $query->execute();

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $objUsuario = $row;
    }

    $query->closeCursor();
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    die();
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
    die();
  }
  return $objUsuario;
}
/**
 * Busca un usuario determinado por id en la base de datos y devuelve un objeto array asociativo con los datos del usuario
 * @param type $usuId
 * @param type $conexion
 * @param type $mensaje
 * @return type $objUsuario
 */
function buscarUsuarioEnBdPorId($usuId, $conexion, &$mensaje)
{

  $objUsuario = null;
  try {

    $query = $conexion->prepare("SELECT * FROM `usuario` WHERE `usu_id` =  ?");
    $query->bindParam(1, $usuId);
    $query->execute();

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $objUsuario = $row;
    }

    $query->closeCursor();
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    die();
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
    die();
  }
  return $objUsuario;
}

/**
 * Busca una ciudad determinada por id en la base de datos y devuelve un objeto array asociativo con los datos de la ciudad
 * @param type $email
 * @param type $conexion
 * @param type $mensaje
 * @return type $objCiudad
 */
function buscarCiudadPorId($conexion, $ciuId, &$mensaje)
{
  $objCiudad = null;
  try {

    $query = $conexion->prepare("SELECT * FROM `ciudad` WHERE `ciu_id` =  ?");
    $query->bindParam(1, $ciuId);
    $query->execute();

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $objCiudad = $row;
    }

    $query->closeCursor();
  } catch (PDOException $e) {

    $mensaje = $e->getMessage();
    die();
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
    die();
  }
  return $objCiudad;
}

/**
 * Actualiza el usuario en la base de datos 
 * @param type $conexion
 * @param type $usuarioEmailSession
 * @param type $nombre
 * @param type $apellidos
 * @param type $email
 * @param type $telefono
 * @param type $ciudad
 * @param type $pais
 */

function actualizarUsuario($conexion, $usuarioEmailSession, $nombre, $apellidos, $email, $telefono, $ciudad, $pais)
{
  try {
    // Preparar la consulta SQL
    $query = "UPDATE usuario SET usu_nom = :nombre, usu_apes = :apellidos, usu_email = :email, usu_tel = :telefono, usu_ciu = :ciudad, usu_pais = :pais WHERE usu_email = :usuarioEmailSession";
    $stmt = $conexion->prepare($query);

    // Asignar los valores de los parámetros
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
    $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
    $stmt->bindParam(':usuarioEmailSession', $usuarioEmailSession, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se actualizó al menos una fila
    if ($stmt->rowCount() > 0) {
      lanzarExito("Usuario actualizado con exito.");
    } else {
      lanzarError("No se ha podido realizar la actualizazación del usuario.");
    }
  } catch (PDOException $e) {
    lanzarError("Error al actualizar el usuario: " . $e->getMessage());
  }
}
/**
 * Función para rescatar la lista de las categorias desde la base de datos
 * @param type $conexion
 * @param type $mensaje
 * @return type $categorias
 */

function obtenerCategorias($conexion, &$mensaje)
{
  try {
    $query = $conexion->prepare('SELECT * FROM categoria');
    $query->execute();
    $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categorias;
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    exit;
  }
}

/**
 * Función para rescatar la lista de las ciudades desde la base de datos
 * @param type $conexion
 * @param type $mensaje
 * @return type $ciudades
 */
function obtenerCiudades($conexion, &$mensaje)
{
  try {
    $query = $conexion->prepare("SELECT * FROM ciudad");
    $query->execute();
    $ciudades = $query->fetchAll(PDO::FETCH_ASSOC);
    return $ciudades;
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    exit;
  }
}


/**
 * Función para rescatar la lista de las planes por id desde la base de datos
 * @param type $conexion
 * @param type $mensaje
 * @param type $planId
 * @return type $resultados
 */
function obtenerPlan($conexion, $planId, &$mensaje)
{
  try {
    $query = $conexion->prepare('SELECT * FROM post WHERE post_id =  ?');
    $query->bindParam(1, $planId);
    $query->execute();
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    exit;
  }
}

/**
 * Función para rescatar los planes pero los hace de manera aleatoria para los planes destacados,devuelve un array.
 * @param type $conexion
 * @return type $destacados 
 */

function obtenerPlanesDestacados($conexion)
{
  // Obtener todos los IDs de los posts
  $queryIDs = "SELECT post_id FROM post";
  $stmtIDs = $conexion->prepare($queryIDs);
  $stmtIDs->execute();
  $resultIDs = $stmtIDs->fetchAll(PDO::FETCH_ASSOC);

  $ids = array_column($resultIDs, 'post_id');

  $destacados = array();

  // Verificar si hay menos de 3 posts disponibles
  if (count($ids) <= 3) {
    // Obtener todos los planes
    $queryPlanes = "SELECT p.post_id, p.post_tit, p.post_desc, c.ciu_nom FROM post p JOIN ciudad c ON p.ciu_cod = c.ciu_id";
    $stmtPlanes = $conexion->prepare($queryPlanes);
    $stmtPlanes->execute();
    $destacados = $stmtPlanes->fetchAll(PDO::FETCH_ASSOC);
  } else {
    // Generar números aleatorios únicos para los planes destacados
    $randomIndices = array_rand($ids, 3);
    foreach ($randomIndices as $index) {
      $postId = $ids[$index];
      $queryPlan = "SELECT p.post_id, p.post_tit, p.post_desc, c.ciu_nom FROM post p JOIN ciudad c ON p.ciu_cod = c.ciu_id WHERE p.post_id = :post_id";
      $stmtPlan = $conexion->prepare($queryPlan);
      $stmtPlan->bindParam(':post_id', $postId, PDO::PARAM_INT);
      $stmtPlan->execute();
      $resultPlan = $stmtPlan->fetch(PDO::FETCH_ASSOC);
      if ($resultPlan) {
        $destacados[] = $resultPlan;
      }
    }
  }

  return $destacados;
}
/** 
 * Función para eliminar un post
 * @param type $conexion
 * @param type $postId
 * @param type $mensaje
 * @return boolean
 */
function eliminarPost($conexion, $postId, &$mensaje)
{
  try {

    if ($conexion && $postId) {

      $query = "DELETE FROM post WHERE post_id = :post_id";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
      $stmt->execute();
      return true;
    } else {
      // Datos inválidos proporcionados
      $mensaje = throw new Exception("Datos inválidos");
    }
  } catch (Exception $e) {
    // Manejo de errores
    $mensaje = "Error: " . $e->getMessage();
    return false;
  }
}


/**
 * Obtener comentarios desde la base de datos por id
 * @param type $conexion
 * @param type $postId
 * @param type $mensaje
 * @return type $comentarios
 */

function obtenerComentarios($conexion, $postId, &$mensaje)
{
  try {
    $query = "SELECT * FROM post JOIN comentario ON comentario.post_cod = post.post_id JOIN usuario ON comentario.usu_cod = usuario.usu_id WHERE post_cod = :postId";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();

    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comentarios;
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
    exit;
  }
}

/**
 * Función para añadir comentarios en la base de datos
 * @param type $conexion
 * @param type $postId
 * @param type $usuarioId
 * @param type $titulo
 * @param type $cuerpo
 * @param type $puntuacion
 * @param type $conexion
 */
function agregarComentario($conexion, $postId, $usuarioId, $titulo, $cuerpo, $puntuacion, &$mensaje)
{
  try {
    $query = "INSERT INTO `comentario`  (`com_id`, `com_tit`, `com_cuer`, `com_punt`, `com_fec`, `usu_cod`, `post_cod`) VALUES (NULL,:titulo, :cuerpo, :puntuacion, CURDATE(), :usuarioId, :postId)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':cuerpo', $cuerpo);
    $stmt->bindParam(':puntuacion', $puntuacion);
    $stmt->bindParam(':usuarioId', $usuarioId);
    $stmt->bindParam(':postId', $postId);

    $stmt->execute();

    $rowCount = $stmt->rowCount();
    if ($rowCount == 1) {
      lanzarExito("Se ha agregado el comentario exitosamente");
    } else {
      lanzarError("No se pudo agregar el comentario");
    }
  } catch (PDOException $e) {
    $mensaje = $e->getMessage();
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
  }
}

/**
 * Función para eliminar un comentario desde la base de datos
 * @param type $conexion
 * @param type $comentarioId
 * @param type $mensaje
 */
function eliminarComentario($conexion, $comentarioId, &$mensaje)
{
  try {
    $query = "DELETE FROM comentario WHERE com_id = :comentarioId";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':comentarioId', $comentarioId);
    $stmt->execute();
    return true;
  } catch (Exception $e) {
    // Manejo de errores
    $mensaje = "Error: " . $e->getMessage();
    return false;
  }
}

/**
 * Función para calcular la puntuación media de los comentarios
 * @param array $comentarios
 * @return type $puntuacionMedia
 */
function calcularPuntuacionMedia($comentarios)
{
  $totalPuntuacion = 0;
  $cantidadComentarios = count($comentarios);

  foreach ($comentarios as $comentario) {
    // Verificar si la clave 'puntuacion' está definida en el comentario
    if (isset($comentario['com_punt'])) {
      // Convertir la puntuacion a un entero antes de sumarla
      $puntuacion = intval($comentario['com_punt']);
      $totalPuntuacion += $puntuacion;
    }
  }

  // Calcular la puntuacion media solo si hay comentarios
  $puntuacionMedia = $cantidadComentarios > 0 ? $totalPuntuacion / $cantidadComentarios : 0;

  // Redondear la puntuacion media a 2 decimales
  $puntuacionMedia = round($puntuacionMedia, 2);

  return $puntuacionMedia;
}

/**
 * Función para agregar a la base de datos una imagen.
 * @param type $conexion
 * @param type $imagen_url
 * @param type $idPlan
 * @param type $usuarioId
 * @param type $mensaje
 */

function registrarImagen($conexion, $imagen_url, $idPlan, $usuarioId, &$mensaje)
{
  try {
    // Preparar la consulta SQL
    $sql = "INSERT INTO `imagenes` (`img_id`, `img_url`, `id_post`, `id_usu`) VALUES (NULL, :img_url, :id_post, :id_usu)";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bindParam(':img_url', $imagen_url);
    $stmt->bindParam(':id_post', $idPlan);
    $stmt->bindParam(':id_usu', $usuarioId);

    // Ejecutar la consulta
    $stmt->execute();
  } catch (PDOException $e) {
    // Error al ejecutar la consulta
    $mensaje = "Error: " . $e->getMessage();
  }
}


/**
 * Función para rescatar imagen por id
 * @param type $conexion
 * @param type $planId
 * @param type $mensaje
 * @return array $resultados
 */
function obtenerImagenes($conexion, $planId, &$mensaje)
{
  try {
    // Preparar la consulta SQL
    $query = $conexion->prepare('SELECT img_url FROM imagenes WHERE id_post = ?');
    $query->bindParam(1, $planId);

    // Ejecutar la consulta
    $query->execute();

    // Obtener los resultados como un array asociativo
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

    return $resultados;
  } catch (PDOException $e) {
    // Manejo de error de PDO
    $mensaje = $e->getMessage();
  } catch (Exception $e) {
    // Manejo de otro tipo de error
    $mensaje = $e->getMessage();
  }
}
/**
 * función para enviar correo con la contraseña del usuario
 * @param type $email
 * @param type $contraseña
 * @param type $mensaje
 * @return boolean
 */
function enviarCorreoRecuperarContraseña($email, $contraseña, &$mensaje)
{
  try {
    // Crear una instancia de la clase PHPMailer
    $mail = new PHPMailer();
    // Autentificación vía SMTP
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    // Login
    $mail->Host = "smtp.ionos.es";
    $mail->Port = "587";
    $mail->Username = "mihail.pistol@plansfortoday.me";
    $mail->Password = "Aytos-Temporal22";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Correo de recuperación de la contraseña';
    $mail->Body = 'Tu contraseña es: ' . $contraseña;
    $mail->addAddress($email, 'Nombre Destinatario');
    $mail->send();
    return true;
  } catch (Exception $e) {
    $mensaje = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    return false;
  }
}
