<?php


function theHeader($title = null)
{
?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php if ($title) {
              echo $title . ' - ';
            } ?>Plans For Today</title>
    <link rel="icon" href="./img/logos/8.svg" sizes="any" type="image/svg+xml">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">


  </head>

  <header class="border-bottom">

    <nav class="navbar navbar-expand-lg p-3">
      <div class="container-fluid">
        <a  id="logoNavbar" href="./index.php" class="d-flex align-items-center mb-1 mb-lg-0 text-decoration-none w-25">
          <img class="d-flex justify-content-around h-100" src="./img/logos/6.svg" alt="logoPlansForToday">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Pricing</a>
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-user"></i>
              </a>
              <ul class="dropdown-menu me-3" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <body>



  <?php
}



function theFooter()
{
  ?>
    </div>
    </div>
    <?php // REEMPLAZAR TEXTO EN MAYUSCULAS (TU_NOMBRE)
    define("TU_NOMBRE", "Juan Carlos");
    ?>
    <footer>Copyright © <?php date("Y") ?><span><?= TU_NOMBRE ?> <a href='index.php'>Blog Botánico</a></span></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>

  </html>
<?php
}
