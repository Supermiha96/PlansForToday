<?php


function theHeader()
{
?>

  <header class="border-bottom">

    <nav class="navbar navbar-expand-lg navbar-light bg-navbarYfooter">
      <a class="navbar-brand" href="#">
        <img src="./img/logos/5.svg" alt="PLANS FOR TODAY" width="200">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span ><i class="fa-solid fa-bars" style="color: #f2f1ec;"></i></span>
      </button>

      <div class="collapse navbar-collapse text-white" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio</a>
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
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">Iniciar sesión</a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- Modal de inicio de sesión -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>
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
