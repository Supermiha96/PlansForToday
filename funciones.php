<?php


function theHeader()
{

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
                Usuario
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Preferencias</a>
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
  </header>
<?php
}



function theFooter()
{
?>
  <footer class="w-100 mt-6">
    <div class="container border-top">
      <div class="row">
        <div class="col-12 col-md-4">
          <h3>Nosotros</h3>
          <p>Te damos los planes, solo te queda ejecutarlos.</p>
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
 * @param type $password_confirm
 * @param type $nombre
 * @param type $fNacimiento
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
 * Busca un usuario determinado por login en la base de datos y devuelve un objeto array asociativo con los datos del usuario
 * @param type $login
 * @param type $conexion
 * @param type $mensaje
 * @return type
 */
function buscarUsuarioEnBd($email, $conexion, &$mensaje)
{

  $objUsuario = null;
  try {

    $query = $conexion->prepare("SELECT `usu_id`,`usu_nom`,`usu_pass`,`usu_email` FROM `usuario` WHERE `usu_email` =  ?");
    $query->bindParam(1, $email);
    $query->execute();

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $objUsuario = $row;
    }

    $query->closeCursor();
  } catch (PDOException $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
    die();
  } catch (Exception $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
    die();
  }
  return $objUsuario;
}

/**
 * Función para rescatar la lista de las categorias desde la base de datos
 */

function obtenerCategorias($conexion)
{
  $query = $conexion->prepare('SELECT * FROM categoria');
  $query->execute();
  $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
  return $categorias;
}

function obtenerPosts($conexion)
{
  $postId = $_GET['planId'];
  $query = $conexion->prepare('SELECT * FROM post WHERE post_id =  ?');
  $query->bindParam(1, $postId);
  $query->execute();
  $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}


function obtenerPlanesDestacados($conexion)
{
  // Obtener el número total de planes
  $queryTotalPlanes = "SELECT COUNT(*) as total FROM post";
  $stmtTotalPlanes = $conexion->prepare($queryTotalPlanes);
  $stmtTotalPlanes->execute();
  $resultTotalPlanes = $stmtTotalPlanes->fetch(PDO::FETCH_ASSOC);
  $totalPlanes = $resultTotalPlanes['total'];

  $destacados = array();

  // Verificar si hay menos de 3 planes disponibles
  if ($totalPlanes <= 3) {
    // Obtener todos los planes
    $queryPlanes = "SELECT p.post_id,p.post_tit,p.post_desc,c.ciu_nom FROM post p JOIN ciudad c ON p.ciu_cod = c.ciu_id";
    $stmtPlanes = $conexion->prepare($queryPlanes);
    $stmtPlanes->execute();
    $destacados = $stmtPlanes->fetchAll(PDO::FETCH_ASSOC);
  } else {
    // Generar números aleatorios únicos para los planes destacados
    while (count($destacados) < 3) {
      $numero = rand(1, $totalPlanes);
      $queryPlan = "SELECT p.post_id,p.post_tit,p.post_desc,c.ciu_nom FROM post p JOIN ciudad c ON p.ciu_cod = c.ciu_id WHERE c.post_id = :post_id";
      $stmtPlan = $conexion->prepare($queryPlan);
      $stmtPlan->bindParam(':post_id', $numero, PDO::PARAM_INT);
      $stmtPlan->execute();
      $resultPlan = $stmtPlan->fetch(PDO::FETCH_ASSOC);
      if ($resultPlan) {
        $destacados[] = $resultPlan;
      }
    }
  }

  return $destacados;
}


function obtenerComentarios($conexion, $postId)
{
  $query = "SELECT * FROM post JOIN comentario ON comentario.post_cod = post.post_id JOIN usuario ON comentario.usu_cod = usuario.usu_id WHERE post_cod = :postId";
  $stmt = $conexion->prepare($query);
  $stmt->bindParam(':postId', $postId);
  $stmt->execute();

  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $comments;
}

function agregarComentario($conexion, $postId, $usuarioId, $titulo, $cuerpo, $puntuacion)
{
  $resultado = false;
  try {
    $query = "INSERT INTO comentario (com_tit, com_cuer, com_punt, com_fec, usu_cod, post_cod) VALUES (:titulo, :cuerpo, :puntuacion, CURDATE(), :usuarioId, :postId)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':cuerpo', $cuerpo);
    $stmt->bindParam(':puntuacion', $puntuacion);
    $stmt->bindParam(':usuarioId', $usuarioId);
    $stmt->bindParam(':postId', $postId);

    $stmt->execute();

    $rowcount = $stmt->rowCount();
    if ($rowcount == 1) {
      // Se insertó correctamente
      $resultado = true;
    } else {
      // No se ha insertado
      $resultado = false;
    }
  } catch (PDOException $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
    // Manejo de error de PDO
  } catch (Exception $e) {
    $resultado = false;
    $mensaje = $e->getMessage();
    // Manejo de otro tipo de error
  }
  return $resultado;
}
function eliminarComentario($conexion, $comentarioId)
{
  $query = "DELETE FROM comentario WHERE com_id = :comentarioId";
  $stmt = $conexion->prepare($query);
  $stmt->bindParam(':comentarioId', $comentarioId);
  $stmt->execute();
}

function calcularPuntuacionMedia($comments)
{
  $totalPuntuacion = 0;
  $cantidadComentarios = count($comments);

  foreach ($comments as $comment) {
    // Verificar si la clave 'puntuacion' está definida en el comentario
    if (isset($comment['com_punt'])) {
      // Convertir la puntuacion a un entero antes de sumarla
      $puntuacion = intval($comment['com_punt']);
      $totalPuntuacion += $puntuacion;
    }
  }

  // Calcular la puntuacion media solo si hay comentarios
  $puntuacionMedia = $cantidadComentarios > 0 ? $totalPuntuacion / $cantidadComentarios : 0;

  // Redondear la puntuacion media a 2 decimales
  $puntuacionMedia = round($puntuacionMedia, 2);

  return $puntuacionMedia;
}
