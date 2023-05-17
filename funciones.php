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
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>

        <ul class="navbar-nav me-3">
          <li class="nav-item">
            <a class="nav-link" href="./login.php" >Iniciar sesión</a>
          </li>
        </ul>
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
